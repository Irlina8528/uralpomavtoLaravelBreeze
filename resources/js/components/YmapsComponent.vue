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
import { length } from '../ymaps';

    export default {
        data() {
            return {
                messages:  "test",
                deliveryLength: 0,
            }
        },
        computed: {
            delivery() {
                if (length) {
                    this.deliveryLength = length.text;
                    return this.deliveryLength;
                } else {
                    return 0;
                }
            }
        },
    }
</script>

<style>
    div{
        color: black;
    }
</style>
