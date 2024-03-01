<template>
    <!-- Грузовое место -->
    <div class="row">
        <div class="col-12">
            <div class="title-div d-flex align-items-center">
                <h4 class="orders-info m-3 me-5 ">Параметры груза</h4>
                <button @click="addRow" class="btn col-sm-12 col-md-3 p-0">Добавить грузовое место</button>
            </div>
        </div>
    </div>
    <div class="row d-flex align-items-center outline" v-for="(item, index) in items" :key="index">
        <span class="col-auto d-flex ms-md-3 pe-md-3 min-w">{{ index + 1 }}</span>
        <div class="col-sm-12 col-md-4 d-flex fs-6 me-md-3">
            <div class="form-floating">
                <input id="length" name="length" v-model="item.length" type="text" class="form-control mb-md-0"
                    placeholder="Длина, м" required>
                <label for="quantity">Длина, м</label>
            </div>
            <div class="form-floating">
                <input id="width" name="width" v-model="item.width" type="text" class="form-control mb-md-0"
                    placeholder="Ширина, м" required>
                <label for="width">Ширина, м</label>
            </div>
            <div class="form-floating">
                <input id="height" name="height" v-model="item.height" type="text" class="form-control mb-md-0"
                    placeholder="Высота, м" required>
                <label for="height">Высота, м</label>
            </div>
        </div>

        <div class="col-sm-12 col-md-2 form-floating me-md-3">
            <input id="weight" name="weight" v-model="item.weight" type="text" @input="weightFlag(item)"
                class="form-control mb-md-0" placeholder="Вес, кг" required>
            <label for="weight">Вес, кг</label>
        </div>
        <div class="col-sm-12 col-md-1 form-floating me-md-3">
            <input id="quantity" name="quantity" v-model="item.quantity" type="text" class="form-control mb-md-0"
                placeholder="Мест" required>
            <label for="quantity">Мест</label>
        </div>

        <div class="col-md-1 d-flex">
            <button @click="deleteRow(index)" class="btn px-3 py-1">x</button>
        </div>
    </div>

    <!-- Тип груза -->
    <div class="info-cargo">
        <div class="row">
            <div class="col-12">
                <div class="title-div align-items-center">
                    <h4 class="orders-info m-3">Информация о грузе</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-auto me-4">
                <input type="checkbox" v-model="liquid" name="liquid" id="liquid" class="me-2">
                <label for="liquid">Жидкий</label>
            </div>
            <div class="col-auto me-4">
                <input type="checkbox" v-model="fragile" name="fragile" id="fragile" class="me-2">
                <label for="fragile">Хрупкий</label>
            </div>
            <div class="col-auto me-4">
                <input type="checkbox" v-model="loose" name="loose" id="loose" class="me-2">
                <label for="loose">Сыпучий</label>
            </div>
            <div class="col-auto me-4">
                <input type="checkbox" v-model="dangerous" name="dangerous" id="dangerous" class="me-2">
                <label for="dangerous">Опасный</label>
            </div>

            <div class="col-sm-12 col-md-5 form-floating">
                <input id="declared_cost" name="declared_cost" v-model="declaredCost" type="text"
                    class="form-control mb-md-0" placeholder="Объявленная стоимость, ₽" required>
                <label for="declared_cost">Объявленная стоимость, ₽</label>
            </div>
        </div>
    </div>

    <!-- Дата -->
    <div class="date-cargo">
        <div class="row">
            <div class="col-12">
                <div class="title-div align-items-center">
                    <h4 class="orders-info m-3">Дата передачи груза</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-5 form-floating">
                <input id="delivery_date" type="date" name="delivery_date" v-model="deliveryDate"
                    class="form-control mb-md-0" placeholder="Дата" required>
                <label for="delivery_date">Дата</label>
            </div>
        </div>
    </div>

    <!-- Упаковка -->
    <div class="info-packaging">
        <div class="row">
            <div class="col-12">
                <div class="title-div align-items-center">
                    <h4 class="orders-info m-3">Упаковка</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-auto me-4">
                <input type="checkbox" v-model="pallet" name="pallet" id="pallet" class="me-2">
                <label for="pallet">Груз на поддоне</label>
            </div>
        </div>
        <div class="row">
            <div class="col-auto me-4">
                <input type="checkbox" v-model="protectivePackaging" name="protective_packaging" id="protective_packaging"
                    class="me-2">
                <label for="protective_packaging">Защитная транспортировочная упаковка</label>
            </div>
        </div>
        <div class="row">
            <div class="col-auto me-4">
                <input type="checkbox" v-model="carton" name="carton" id="carton" class="me-2">
                <label for="carton">Картонная коробка</label>
            </div>
        </div>
    </div>

    <!-- Стоимость -->
    <div class="row">
        <div class="col-12">
            <div class="title-div d-flex align-items-center">
                <h4 class="orders-info m-3 me-5 ">Расчет стоимости</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <table class="table m-0">
            <tbody>
                <tr>
                    <th>Автоперевозка</th>
                    <td>{{ priceVW }}</td>
                </tr>
                <tr>
                    <th>Страхование</th>
                    <td>{{ PricedeclaredCost }}</td>
                </tr>
                <tr v-if="dangerous">
                    <th>Перевозка опасного груза</th>
                    <td>500</td>
                </tr>
                <tr v-if="pallet">
                    <th>Поддон</th>
                    <td>300</td>
                </tr>
                <tr v-if="protectivePackaging">
                    <th>Защитная транспортировочная упаковка</th>
                    <td>450</td>
                </tr>
                <tr v-if="carton">
                    <th>Картонная коробка</th>
                    <td>15</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="title-div d-flex align-items-center justify-content-between">
                <h3 class="orders-info m-2 me-5 ">Стоимость заказа - {{ getTotalPrice() }}</h3>
                <button class="btn col-auto w-50" type="submit" @click="saveData">Оформить</button>
            </div>
        </div>
    </div>

    <!-- <p>Стоимость расстояния:
        {{ getPricePerKm() }} руб.
    </p>
    <p>Стоимость веса:
        {{ getPricePerKg() }} руб.
    </p>
    <p>Стоимость объема:
        {{ getpricePerM3() }} руб.
    </p> -->
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            items: [
                {
                    length: 1,
                    width: 1,
                    height: 1,
                    weight: 1,
                    quantity: 1,
                }
            ],
            deliveryDate: '',
            cityInto: '',
            cityFrom: '',
            declaredCost: 0,

            liquid: false,
            fragile: false,
            loose: false,
            dangerous: false,

            pallet: false,
            protectivePackaging: false,
            carton: false,

            PricedeclaredCost: 0,
            totalDistancePrice: 0,
            priceVW: 0,
            totalPrice: 0,
            numberPlaces: 0,
            totalWeight: 0,
            totalVolume: 0,
            deliveryLength: 0,
            tariffs: [
                // до 1000
                {
                    distanceMin: 0,
                    distanceMax: 1000,
                    pricePerKm: 0.5,
                    weights: [
                        { weightMax: 100, pricePerKg: 15 },
                        { weightMin: 100, weightMax: 500, pricePerKg: 12 },
                        { weightMin: 500, weightMax: 1000, pricePerKg: 11 },
                        { weightMin: 1000, pricePerKg: 10 },
                    ],
                    volumes: [
                        { volumeMax: 5, pricePerM3: 2420 },
                        { volumeMin: 5, volumeMax: 10, pricePerM3: 2310 },
                        { volumeMin: 15, pricePerM3: 2220 },
                    ]
                },
                // от 1000 до 5000
                {
                    distanceMin: 1000,
                    distanceMax: 5000,
                    pricePerKm: 0.6,
                    weights: [
                        { weightMax: 100, pricePerKg: 25 },
                        { weightMin: 100, weightMax: 500, pricePerKg: 22 },
                        { weightMin: 500, weightMax: 1000, pricePerKg: 20 },
                        { weightMin: 1000, pricePerKg: 19 },
                    ],
                    volumes: [
                        { volumeMax: 5, pricePerM3: 3100 },
                        { volumeMin: 5, volumeMax: 10, pricePerM3: 3095 },
                        { volumeMin: 15, pricePerM3: 3090 },

                    ]
                },
                // от 5000
                {
                    distanceMin: 5000,
                    distanceMax: 10000,
                    pricePerKm: 0.7,
                    weights: [
                        { weightMax: 100, pricePerKg: 72 },
                        { weightMin: 100, weightMax: 500, pricePerKg: 70 },
                        { weightMin: 500, weightMax: 1000, pricePerKg: 65 },
                        { weightMin: 1000, weightMax: 2000, pricePerKg: 64 },
                        { weightMin: 2000, weightMax: 3000, pricePerKg: 63 },
                        { weightMin: 3000, pricePerKg: 60 },
                    ],
                    volumes: [
                        { volumeMax: 5, pricePerM3: 20000 },
                        { volumeMin: 5, volumeMax: 10, pricePerM3: 19000 },
                        { volumeMin: 15, pricePerM3: 18000 },
                    ]
                },
            ]
        }
    },
    watch: {
        liquid: function (newVal) {
            this.protectivePackaging = newVal;
        },
        fragile: function (newVal) {
            this.protectivePackaging = newVal;
        },
    },
    mounted() {
        // Прослушка событие "обновление длины"
        window.addEventListener('length-updated', this.updateDeliveryLength);

        document.addEventListener('cityFrom', this.handleCityFrom);
        document.addEventListener('cityInto', this.handlecityInto);
    },
    beforeDestroy() {
        // Очистка прослушки
        window.removeEventListener('length-updated', this.updateDeliveryLength);
    },
    methods: {
        saveData() {
            axios.post('/save', {
                items: this.items,
                liquid: this.liquid,
                fragile: this.fragile,
                loose: this.loose,
                dangerous: this.dangerous,
                declared_cost: this.declaredCost,
                delivery_date: this.deliveryDate,
                pallet: this.pallet,
                protective_packaging: this.protectivePackaging,
                carton: this.carton,
                totalPrice: this.totalPrice,
                city_from: this.cityFrom,
                city_into: this.cityInto,
            })
                .then(response => {
                    console.log(response.data);

                    window.location.href = '/orders';
                })
                .catch(error => {
                    console.error(error);
                });
        },
        handleCityFrom(event) {
            this.cityFrom = event.detail;
        },
        handlecityInto(event) {
            this.cityInto = event.detail;
        },
        weightFlag() {
            this.pallet = this.items.some(item => parseFloat(item.weight) >= 50);
            this.carton = this.items.some(item => parseFloat(item.weight) <= 3);
        },
        updateDeliveryLength(event) {
            this.deliveryLength = (Math.round(event.detail.value / 1000));
        },
        getTotalPrice() {
            let pricePerKm = this.getPricePerKm();
            let pricePerKg = this.getPricePerKg();
            let pricePerM3 = this.getpricePerM3();

            let additionalPrice = 0;

            // Чекбоксы
            if (this.pallet) {
                additionalPrice += 300;
            }
            if (this.protectivePackaging) {
                additionalPrice += 450;
            }
            if (this.dangerous) {
                additionalPrice += 500;
            }
            if (this.carton) {
                additionalPrice += 15;
            }

            // Страхование
            if (this.declaredCost <= 10000) {
                this.PricedeclaredCost = 100
            }
            if (this.declaredCost >= 10000 && this.declaredCost <= 100000) {
                this.PricedeclaredCost = 500
            }
            if (this.declaredCost >= 100000) {
                this.PricedeclaredCost = 1000
            }

            this.totalDistancePrice = this.deliveryLength * pricePerKm;
            this.maxVolume;
            this.maxWeight;

            let totalWeightPrice = this.totalWeight * pricePerKg;
            let totalVolumePrice = this.totalVolume * pricePerM3;

            this.priceVW = this.totalDistancePrice + (totalWeightPrice > totalVolumePrice ? totalWeightPrice : totalVolumePrice);
            this.totalPrice = this.priceVW + additionalPrice + this.PricedeclaredCost;
            return this.totalPrice.toLocaleString('ru-RU', { style: 'currency', currency: 'RUB' });
        },
        getPricePerKm() {
            for (let i = 0; i < this.tariffs.length; i++) {
                if (this.deliveryLength >= this.tariffs[i].distanceMin && this.deliveryLength <= this.tariffs[i].distanceMax) {
                    return this.tariffs[i].pricePerKm;
                }
            }
            return this.tariffs[this.tariffs.length - 1].pricePerKm; // Если расстояние больше всех указанных лимитов, берется последний тариф
        },

        getPricePerKg() {
            let tariffs = this.tariffs;
            let distance = this.deliveryLength;

            for (let i = 0; i < tariffs.length; i++) {
                if (distance >= tariffs[i].distanceMin && distance <= tariffs[i].distanceMax) {
                    let weights = tariffs[i].weights;

                    for (let j = 0; j < weights.length; j++) {
                        let weightMin = weights[j].weightMin;
                        let weightMax = weights[j].weightMax;

                        if ((weightMin === undefined || weightMin <= this.totalWeight) && (weightMax === null || weightMax >= this.totalWeight)) {
                            return weights[j].pricePerKg;
                        }
                    }
                    return weights[weights.length - 1].pricePerKg;
                }
            }


        },
        getpricePerM3() {
            let tariffs = this.tariffs;
            let distance = this.deliveryLength;

            for (let i = 0; i < tariffs.length; i++) {
                if (distance >= tariffs[i].distanceMin && distance <= tariffs[i].distanceMax) {
                    let volumes = tariffs[i].volumes;

                    for (let j = 0; j < volumes.length; j++) {
                        let volumeMin = volumes[j].volumeMin;
                        let volumeMax = volumes[j].volumeMax;

                        if ((volumeMin === undefined || volumeMin <= this.totalVolume) && (volumeMax === null || volumeMax >= this.totalVolume)) {
                            return volumes[j].pricePerM3;
                        }
                    }
                    return volumes[volumes.length - 1].pricePerM3;
                }
            }

            return this.tariffs[this.tariffs.length - 1].volumes[this.tariffs[this.tariffs.length - 1].volumes.length - 1].pricePerM3;
        },
        addRow() {
            this.items.push({
                length: 1,
                width: 1,
                height: 1,
                weight: 1,
                quantity: 1
            });
        },
        deleteRow(index) {
            this.items.splice(index, 1);
        },
    },
    computed: {
        calculateDelivery() {
            if (this.totalWeight > 10) {
                return this.deliveryLength * 100;
            } else {
                return this.deliveryLength;
            }
        },
        volumes() {
            return this.items.map(item => {
                const volume = item.length * item.width * item.height;
                return {
                    ...item,
                    volume
                };
            });
        },
        maxVolume() {
            const maxVolumeItem = this.volumes.reduce((prev, current) => prev.volume > current.volume ? prev : current);
            this.totalVolume = maxVolumeItem.volume;
            return maxVolumeItem.volume;
        },
        maxWeight() {
            const maxWeight = Math.max(...this.items.map(item => item.weight));
            this.totalWeight = maxWeight;
            return maxWeight;
        },
    },
}
</script>
<style>
.outline {
    outline: 1px solid #3d3d3d;
}

.min-w {
    min-width: 30px;
}

.w-50 {
    width: 50%;
}
</style>