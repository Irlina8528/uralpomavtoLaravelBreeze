<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header color-red">{{  messages }}</h1>
                    <div class="card-body">
                        Length  {{ delivery }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            messages: "test",
            deliveryLength: 0,
        }
    },
    mounted() {
        // Listen for the 'length-updated' event
        window.addEventListener('length-updated', this.updateDeliveryLength);
    },
    beforeDestroy() {
        // Clean up the event listener when the component is destroyed
        window.removeEventListener('length-updated', this.updateDeliveryLength);
    },
    methods: {
        updateDeliveryLength(event) {
            // Update the deliveryLength with the new length value
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
    div{
        color: black;
    }
</style>
