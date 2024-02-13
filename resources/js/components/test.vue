<template>
    <div class="row">
        
        <div class="col-sm-12 col-md-2 pe-md-3 form-floating">
            <input id="number-places" v-model="numberPlaces" type="text" value="1" class="form-control" placeholder="Количество мест" required>
            <label for="number-places">Количество мест</label>
        </div>
        <div class="col-sm-12 col-md-2 pe-md-3 form-floating">
            <input id="total-weight" v-model="totalWeight" type="text" value="1" class="form-control" placeholder="Общий вес в кг" required>
            <label for="total-weight">Общий вес в кг</label>
        </div>
        <div class="col-sm-12 col-md-2 pe-md-3 form-floating">
            <input id="total-volume" v-model="totalVolume" type="text" value="1" class="form-control" placeholder="Общий объем в м3" required>
            <label for="total-volume">Общий объем в м3</label>
        </div>
        <p>Стоимость: 
            {{ calculateDelivery}} {{ deliveryLength }}
        </p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            numberPlaces: 1,
            totalWeight: 1,
            totalVolume: 1,
            deliveryLength: 0,
            calc: 1,
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
<style>

</style>


<template>
    <label for="distance">Расстояние (в км):</label>
  <input type="number" id="distance" v-model="distance">
  
  <label for="weight">Вес груза (в кг):</label>
  <input type="number" id="weight" v-model="weight">
  
  <h3>Итоговая стоимость:</h3>
  <p>{{ getTotalPrice() }} руб.</p>
</template>

<script>
export default {
  data() {
    return {
      distance: 0,
      weight: 0,
      tariffs: [
        {
          distanceMin: 0,
          distanceMax: 1000,
          pricePerKm: 10,
          weights: [
            { weightMax: 100, pricePerKg: 30 },
            { weightMin: 100, weightMax: 1000, pricePerKg: 20 },
            { weightMin: 1000, pricePerKg: 10 },
            // Добавьте другие значения весов и цен за килограмм при необходимости
          ]
        },
        // Добавьте другие объединенные объекты с различными пределами расстояния
        {
          distanceMin: 1000,
          distanceMax: 5000,
          pricePerKm: 20,
          weights: [
            { weightMax: 100, pricePerKg: 60 },
            { weightMin: 100, weightMax: 1000, pricePerKg: 50 },
            { weightMin: 1000, pricePerKg: 40 },
            // Добавьте другие значения весов и цен за килограмм при необходимости
          ]
        },
      ]
    }
  },
  methods: {
    getTotalPrice() {
      let pricePerKm = this.getPricePerKm();
      let pricePerKg = this.getPricePerKg();

      let totalDistancePrice = this.distance * pricePerKm;
      let totalWeightPrice = this.weight * pricePerKg;

      return totalDistancePrice + totalWeightPrice;
    },
    getPricePerKm() {
      for (let i = 0; i < this.tariffs.length; i++) {
        if (this.distance >= this.tariffs[i].distanceMin && this.distance <= this.tariffs[i].distanceMax) {
            return this.tariffs[i].pricePerKm;
        }
      }

      // Если расстояние больше всех указанных лимитов, берется последний тариф
      return this.getPricePerKgFromWeights(this.tariffs[this.tariffs.length - 1].weights);
    },
    getPricePerKgFromWeights(weights) {
      for (let i = 0; i < weights.length; i++) {
        if (
          (this.weight >= weights[i].weightMin || weights[i].weightMin === undefined) &&
          (this.weight <= weights[i].weightMax || weights[i].weightMax === null)
        ) {
          return weights[i].pricePerKg;
        }
      }

      // Если вес больше всех указанных лимитов, берется последняя цена за килограмм
      return weights[weights.length - 1].pricePerKg;
    },
    getPricePerKg() {
      let tariffs = this.tariffs;
      let distance = this.distance;

      for (let i = 0; i < tariffs.length; i++) {
        if (distance >= tariffs[i].distanceMin && distance <= tariffs[i].distanceMax) {
          let weights = tariffs[i].weights;

          for (let j = 0; j < weights.length; j++) {
            let weightMin = weights[j].weightMin;
            let weightMax = weights[j].weightMax;

            if ((weightMin === undefined || weightMin <= this.weight) && (weightMax === null || weightMax >= this.weight)) {
              return weights[j].pricePerKg;
            }
          }
        }
      }

      return this.tariffs[this.tariffs.length - 1].weights[this.tariffs[this.tariffs.length - 1].weights.length - 1].pricePerKg;
    },
  }
}

</script>
<style>

</style>


<template>
    <div class="row">
        
        <div class="col-sm-12 col-md-2 pe-md-3 form-floating">
            <input id="number-places" v-model="numberPlaces" type="text" value="1" class="form-control" placeholder="Количество мест" required>
            <label for="number-places">Количество мест</label>
        </div>
        <div class="col-sm-12 col-md-2 pe-md-3 form-floating">
            <input id="total-weight" v-model="totalWeight" type="text" value="1" class="form-control" placeholder="Общий вес в кг" required>
            <label for="total-weight">Общий вес в кг</label>
        </div>
        <div class="col-sm-12 col-md-2 pe-md-3 form-floating">
            <input id="total-volume" v-model="totalVolume" type="text" value="1" class="form-control" placeholder="Общий объем в м3" required>
            <label for="total-volume">Общий объем в м3</label>
        </div>
        <p>Стоимость общая: 
            {{ getTotalPrice() }} руб.
        </p>
        <p>Стоимость расстояния: 
            {{ getPricePerKm() }} руб.
        </p>
        <p>Стоимость веса: 
            {{ getPricePerKg() }} руб.
        </p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            numberPlaces: 1,
            totalWeight: 1,
            weight: 0,
            totalVolume: 1,
            deliveryLength: 0,
            tariffs: [
        {
          distanceMin: 0,
          distanceMax: 1000,
          pricePerKm: 10,
          weights: [
            { weightMax: 100, pricePerKg: 30 },
            { weightMin: 100, weightMax: 1000, pricePerKg: 20 },
            { weightMin: 1000, pricePerKg: 10 },
            // Добавьте другие значения весов и цен за килограмм при необходимости
          ]
        },
        // Добавьте другие объединенные объекты с различными пределами расстояния
        {
          distanceMin: 1000,
          distanceMax: 5000,
          pricePerKm: 20,
          weights: [
            { weightMax: 100, pricePerKg: 60 },
            { weightMin: 100, weightMax: 1000, pricePerKg: 50 },
            { weightMin: 1000, pricePerKg: 40 },
            // Добавьте другие значения весов и цен за килограмм при необходимости
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

      let totalDistancePrice = this.deliveryLength * pricePerKm;
      let totalWeightPrice = this.totalWeight * pricePerKg;

      return totalDistancePrice + totalWeightPrice;
    },
    getPricePerKm() {
      for (let i = 0; i < this.tariffs.length; i++) {
        if (this.deliveryLength >= this.tariffs[i].distanceMin && this.deliveryLength <= this.tariffs[i].distanceMax) {
            return this.tariffs[i].pricePerKm;
        }
      }

      // Если расстояние больше всех указанных лимитов, берется последний тариф
      return this.getPricePerKgFromWeights(this.tariffs[this.tariffs.length - 1].weights);
    },
    getPricePerKgFromWeights(weights) {
      for (let i = 0; i < weights.length; i++) {
        if (
          (this.totalWeight >= weights[i].weightMin || weights[i].weightMin === undefined) &&
          (this.totalWeight <= weights[i].weightMax || weights[i].weightMax === null)
        ) {
          return weights[i].pricePerKg;
        }
      }

      // Если вес больше всех указанных лимитов, берется последняя цена за килограмм
      return weights[weights.length - 1].pricePerKg;
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
        }
      }

      return this.tariffs[this.tariffs.length - 1].weights[this.tariffs[this.tariffs.length - 1].weights.length - 1].pricePerKg;
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
