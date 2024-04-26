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
        <div class="d-flex justify-content-between col-md-1">
            <div class="d-flex">
                <span class="col-auto d-flex ms-md-3 pe-md-3 min-w d-sm-block d-md-none">Место </span>
                <span class="col-auto d-flex ms-md-3 pe-md-3 min-w d-sm-block d-md-none"> </span>
                <span class="col-auto d-flex ms-md-3 pe-md-3 min-w"> {{ index + 1 }}</span>
            </div>
            <div class="col-md-1 d-flex d-block d-md-none">
                <button @click="deleteRow(index)" class="btn px-3 py-1">x</button>
            </div>
        </div>
        <div class="col-sm-12 col-md-5 d-flex fs-6 me-md-3">
            <div class="form-floating">
                <input id="length" name="length" v-model="item.length" type="number" @input="() => { if(item.length > 13.5 || item.length < 0) { item.length = 13.5 }}"
                    class="form-control mb-md-0" placeholder="Длина, м" required>
                <label for="quantity">Длина, м</label>
            </div>
            <div class="form-floating">
                <input id="width" name="width" v-model="item.width" type="number" @input="() => { if(item.width > 2.42 || item.width < 0) { item.width = 2.42 }}"
                    class="form-control mb-md-0" placeholder="Ширина, м" required>
                <label for="width">Ширина, м</label>
            </div>
            <div class="form-floating">
                <input id="height" name="height" v-model="item.height" type="number" @input="() => { if(item.height > 2.45 || item.height < 0) { item.height = 2.45 }}"
                    class="form-control mb-md-0" placeholder="Высота, м" required>
                <label for="height">Высота, м</label>
            </div>
        </div>

        <div class="col-sm-12 col-md-2 form-floating me-md-3">
            <input id="weight" name="weight" v-model="item.weight" type="number" min="1" max="20" oninput="validity.valid||(value='');"
                @input="weightFlag(item)" class="form-control mb-md-0" placeholder="Вес, кг" required>
            <label for="weight">Вес, кг</label>
        </div>
        <div class="col-sm-11 col-md-1 form-floating me-md-3">
            <input id="quantity" name="quantity" v-model="item.quantity" type="text" pattern="[0-9 .]*" maxlength="3"
                class="form-control mb-md-0" placeholder="Мест" required>
            <label for="quantity">Мест</label>
        </div>

        <div class="col-md-1 d-flex d-none d-md-block ">
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
                <input type="checkbox" v-model="liquid" name="liquid" id="liquid" class="me-2 custom-checkbox">
                <label for="liquid">Жидкий</label>
            </div>
            <div class="col-auto me-4">
                <input type="checkbox" v-model="fragile" name="fragile" id="fragile" class="me-2 custom-checkbox">
                <label for="fragile">Хрупкий</label>
            </div>
            <div class="col-auto me-4">
                <input type="checkbox" v-model="loose" name="loose" id="loose" class="me-2 custom-checkbox">
                <label for="loose">Сыпучий</label>
            </div>
            <div class="col-auto me-4">
                <input type="checkbox" v-model="dangerous" name="dangerous" id="dangerous" class="me-2 custom-checkbox">
                <label for="dangerous">Опасный</label>
            </div>

            <div class="col-sm-12 col-md-5 form-floating">
                <input id="declared_cost" name="declared_cost" v-model="declaredCost" type="text" pattern="[0-9 .]*"
                    maxlength="8" class="form-control mb-md-0" placeholder="Объявленная стоимость, ₽" required>
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
            <div class="col-sm-12 col-md-3 form-floating">
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
                <input type="checkbox" v-model="pallet" name="pallet" id="pallet" class="me-2 custom-checkbox">
                <label for="pallet">Груз на поддоне</label>
            </div>
        </div>
        <div class="row">
            <div class="col-auto me-4">
                <input type="checkbox" v-model="protectivePackaging" name="protective_packaging"
                    id="protective_packaging" class="me-2 custom-checkbox">
                <label for="protective_packaging">Защитная упаковка</label>
            </div>
        </div>
        <div class="row">
            <div class="col-auto me-4">
                <input type="checkbox" v-model="carton" name="carton" id="carton" class="me-2 custom-checkbox">
                <label for="carton">Картонная коробка</label>
            </div>
        </div>
    </div>

    <!-- Стоимость -->
    <div class="row">
        <div class="col-12 outline">
            <div class="row">
                <div class="col-sm-12 col-md-7 title-div d-flex align-items-center">
                    <h4 class="orders-info m-3 me-5">Расчет стоимости</h4>
                </div>
                <div class="col-sm-12 col-md-5 info">
                    <p>Груз: {{ totalVolume }} м&#179, {{ totalWeight }} кг, {{ totalQuantityText }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <table class="table m-0">
            <tbody>
                <tr>
                    <th>Автоперевозка</th>
                    <td>{{ formatMoney(priceVW) }}</td>
                </tr>
                <tr>
                    <th>Страхование</th>
                    <td>{{ formatMoney(PricedeclaredCost) }}</td>
                </tr>
                <tr v-if="dangerous">
                    <th>Перевозка опасного груза</th>
                    <td>{{ formatMoney(500) }}</td>
                </tr>
                <tr v-if="pallet">
                    <th>Поддон</th>
                    <td>{{ formatMoney(300) }}</td>
                </tr>
                <tr v-if="protectivePackaging">
                    <th>Защитная упаковка</th>
                    <td>{{ formatMoney(450) }}</td>
                </tr>
                <tr v-if="carton">
                    <th>Картонная коробка</th>
                    <td>{{ formatMoney(15) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-8 title-div d-flex align-items-center justify-content-between">
            <h3 class="orders-info m-2 me-md-5 ">Стоимость заказа - {{ formatMoney(getTotalPrice()) }}</h3>
        </div>
        <div class="col-sm-12 col-md-4">
            <button class="btn form__btn" type="submit" @click="saveData">Оформить</button>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            items: [
                {
                    length: '',
                    width: '',
                    height: '',
                    weight: '',
                    quantity: 1,
                }
            ],
            deliveryDate: '',
            cityInto: '',
            cityFrom: '',
            declaredCost: '',

            // Тип
            liquid: false,
            fragile: false,
            loose: false,
            dangerous: false,
            PricedeclaredCost: 0,

            // Упаковка
            pallet: false,
            protectivePackaging: false,
            carton: false,

            priceVW: 0,
            totalPrice: 0,

            totalWeight: 0,
            totalVolume: 0,

            deliveryLength: 0,


            // Тариф
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
        // Чекбоксы
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

        // Получение города
        document.addEventListener('cityFrom', this.handleCityFrom);
        document.addEventListener('cityInto', this.handlecityInto);
    },
    beforeDestroy() {
        // Очистка прослушки
        window.removeEventListener('length-updated', this.updateDeliveryLength);
    },
    methods: {
        // Передача данных
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
        // Длинна маршрута
        updateDeliveryLength(event) {
            this.deliveryLength = (Math.round(event.detail.value / 1000));
        },

        // Города
        handleCityFrom(event) {
            this.cityFrom = event.detail;
        },
        handlecityInto(event) {
            this.cityInto = event.detail;
        },

        // Чекбокс
        weightFlag() {
            this.pallet = this.items.some(item => parseFloat(item.weight) >= 50);
            this.carton = this.items.some(item => parseFloat(item.weight) <= 3);
        },

        // Итоговая цена
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

            // Цена маршрута
            var totalDistancePrice = this.deliveryLength * pricePerKm;

            // Вес и объем
            this.maxVolume;
            this.maxWeight;
            let totalWeightPrice = this.totalWeight * pricePerKg;
            let totalVolumePrice = this.totalVolume * pricePerM3;

            // Маршурт Вес или Объем
            this.priceVW = totalDistancePrice + (totalWeightPrice > totalVolumePrice ? totalWeightPrice : totalVolumePrice);

            // Итоговая цена
            this.totalPrice = this.priceVW + additionalPrice + this.PricedeclaredCost;
            return this.totalPrice;
        },

        // Цена за км
        getPricePerKm() {
            for (let i = 0; i < this.tariffs.length; i++) {
                if (this.deliveryLength >= this.tariffs[i].distanceMin && this.deliveryLength <= this.tariffs[i].distanceMax) {
                    return this.tariffs[i].pricePerKm;
                }
            }
            return this.tariffs[this.tariffs.length - 1].pricePerKm; // Если расстояние больше всех указанных лимитов, берется последний тариф
        },

        // Цена за кг
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

        // Цена за м3
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

        // Добавить место
        addRow() {
            this.items.push({
                length: 1,
                width: 1,
                height: 1,
                weight: 1,
                quantity: 1
            });
        },
        // Удалить
        deleteRow(index) {
            this.items.splice(index, 1);
        },

        // Форматирование денег
        formatMoney(value) {
            return value.toLocaleString('ru-RU', {
                style: 'currency',
                currency: 'RUB',
                minimumFractionDigits: 0,
                maximumFractionDigits: 2,
            });
        },
    },
    computed: {
        // Места
        totalQuantity() {
            let sum = 0;
            this.items.forEach(item => {
                sum += parseInt(item.quantity);
            });
            return sum;
        },
        totalQuantityText() {
            const total = this.totalQuantity;
            if (total === 1) {
                return "1 место";
            } else if (total >= 2 && total <= 4) {
                return `${total} места`;
            } else {
                return `${total} мест`;
            }
        },

        // Объем каждого места
        volumes() {
            return this.items.map(item => {
                const volume = item.length * item.width * item.height * item.quantity;
                return {
                    ...item,
                    volume
                };
            });
        },
        // Общий объем
        maxVolume() {
            this.totalVolume = this.volumes.reduce((acc, item) => acc + item.volume, 0);
            this.totalQuantity = this.items.reduce((acc, item) => acc + item.quantity, 0);

            return this.totalVolume;
        },

        // Общий вес
        maxWeight() {
            const totalWeight = this.items.reduce((acc, item) => acc + (item.weight * item.quantity), 0);
            this.totalWeight = totalWeight;
            return this.totalWeight;
        },
    },
}
</script>
<style>
.min-w {
    min-width: 30px;
}

.w-50 {
    width: 50%;
}

/* Чекбокс */
.custom-checkbox {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    width: 15px;
    height: 15px;
    border: 2px solid #fa663d;
    outline: none;
    transition: background-color 0.3s ease-in-out;
}

.custom-checkbox:checked {
    border: 2px solid #fa663d;
    background-color: #fa663d;
}

::-webkit-calendar-picker-indicator {
    filter: invert(1);
    width: 20px;
    height: 20px;
}
</style>
