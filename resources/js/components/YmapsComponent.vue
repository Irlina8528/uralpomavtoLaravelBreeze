<template>
    <p>
        Длинна  {{ delivery }}
    </p>
</template>

<script>
export default {
    data() {
        return {
            deliveryLength: 0,
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
            this.deliveryLength = event.detail.text;
        }
    },
    computed: {
        delivery() {
            return this.deliveryLength || 0;
        }
    },
}
</script>
<style>

</style>
