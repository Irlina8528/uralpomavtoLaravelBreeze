<template>
    <div class="row d-flex align-items-center">

        <div class="col-sm-12 col-md-2 pe-md-3 form-floating">
            <input id="number-places" v-model="numberPlaces" type="text" value="1" class="form-control mb-md-0"
                placeholder="Количество мест" required>
            <label for="number-places">Количество мест</label>
        </div>
        <div class="col-sm-12 col-md-3 pe-md-3 form-floating">
            <input id="total-weight" v-model="totalWeight" type="text" class="form-control mb-md-0" placeholder="Общий вес в кг"
                required>
            <label for="total-weight">Общий вес в кг</label>
        </div>
        <div class="col-sm-12 col-md-3 pe-md-3 form-floating">
            <input id="total-volume" v-model="totalVolume" type="text" class="form-control mb-md-0" placeholder="Общий объем в м3"
                required>
            <label for="total-volume">Общий объем в м3</label>
        </div>
        <div class="col-sm-12 col-md-4 pe-md-3 d-flex align-items-center" v-if="totalWeight == 0 || totalVolume == 0 || deliveryLength == 0 || numberPlaces == 0">
            <p>Заполните все данные</p>
        </div>
        <div class="col-sm-12 col-md-4 pe-md-3 d-flex align-items-center" v-else>
            <p>Ориентировочная стоимость:
                {{ getTotalPrice() }}
            </p>
        </div>

        <!-- <p>Стоимость расстояния:
            {{ getPricePerKm() }} руб.
        </p>
        <p>Стоимость веса:
            {{ getPricePerKg() }} руб.
        </p>
        <p>Стоимость об:
            {{ getpricePerM3() }} руб.
        </p> -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            numberPlaces: 0,
            totalWeight: 0,
            totalVolume: 0,
            deliveryLength: 0,
            tariffs: [
                // до 1000
                {
                    distanceMin: 0,
                    distanceMax: 1000,
                    pricePerKm: 0.4,
                    weights: [
                        { weightMax: 100, pricePerKg: 15 },
                        { weightMin: 100, weightMax: 500, pricePerKg: 12 },
                        { weightMin: 500, weightMax: 1000, pricePerKg: 11 },
                        { weightMin: 1000, pricePerKg: 10 },
                    ],
                    volumes: [
                        { volumeMax: 5, pricePerM3: 3500 },
                        { volumeMin: 5, volumeMax: 10, pricePerM3: 3300 },
                        { volumeMin: 15, pricePerM3: 3100 },
                    ]
                },
                // от 1000 до 5000
                {
                    distanceMin: 1000,
                    distanceMax: 5000,
                    pricePerKm: 0.5,
                    weights: [
                        { weightMax: 100, pricePerKg: 25 },
                        { weightMin: 100, weightMax: 500, pricePerKg: 22 },
                        { weightMin: 500, weightMax: 1000, pricePerKg: 20 },
                        { weightMin: 1000, pricePerKg: 19 },
                    ],
                    volumes: [
                        { volumeMax: 5, pricePerM3: 6100 },
                        { volumeMin: 5, volumeMax: 10, pricePerM3: 5900 },
                        { volumeMin: 15, pricePerM3: 5700 },

                    ]
                },
                // от 5000
                {
                    distanceMin: 5000,
                    distanceMax: 10000,
                    pricePerKm: 0.6,
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
    mounted() {
        // Прослушка событие "обновление длины"
        window.addEventListener('length-updated', this.updateDeliveryLength);
    },
    beforeDestroy() {
        // Очистка прослушки
        window.removeEventListener('length-updated', this.updateDeliveryLength);
    },
    methods: {
        updateDeliveryLength(event) {
            this.deliveryLength = (Math.round(event.detail.value / 1000));
        },
        getTotalPrice() {
            let pricePerKm = this.getPricePerKm();
            let pricePerKg = this.getPricePerKg();
            let pricePerM3 = this.getpricePerM3();


            let totalDistancePrice = this.deliveryLength * pricePerKm;
            let totalWeightPrice = this.totalWeight * pricePerKg;
            let totalVolumePrice = this.totalVolume * pricePerM3;

            let totalPrice = totalDistancePrice + (totalWeightPrice > totalVolumePrice ? totalWeightPrice : totalVolumePrice);
            return totalPrice.toLocaleString('ru-RU', { style: 'currency', currency: 'RUB' });
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
    },
    computed: {
        calculateDelivery() {
            if (this.totalWeight > 10) {
                return this.deliveryLength * 100;
            } else {
                return this.deliveryLength;
            }
        }
    },
}
</script>
