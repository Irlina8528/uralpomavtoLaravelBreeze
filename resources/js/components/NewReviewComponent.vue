<template>
    <div class="row">
        <div class="col-12">
            <div class="title-div d-flex align-items-center">
                <h4 class="orders-info m-3 me-5 ">Оставьте отзыв о нашей работе</h4>
                <button class="btn col-sm-12 col-md-3 p-1"  @click="showFeedbackForm">Написать отзыв</button>
            </div>
        </div>
    </div>
    <div class="row text-center" v-if="showForm">
        <div class="col-sm-12 col-md-6 offset-md-3 mb-4">
            <form action="" method="post">
                <p class="mb-2 mt-2">Оцените качество услуги</p>
                <div>
                    <star-rating
                        :star-size="50"
                        :star-max="5"
                        :rating="rating"
                        inactive-color="#3d3d3d"
                        active-color="#fa663d"
                        padding="1"
                        inline="true"
                        text-class="rating-text"
                        @update:rating ="setRating"
                    ></star-rating>
                </div>

                <div class="form-floating mt-3">
                    <textarea class="form-control" placeholder="Комментарий" name="comment" v-model="comment" required></textarea>
                    <label for="comment">Комментарий</label>
                    <button class="btn form__btn p-3" type="submit" @click="saveData">Отправить</button>
                </div>
            </form>
        </div>
    </div>


</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            showForm: false,
            comment: "",
            rating: 0,
            id_order: this.initialData
        }
    },
    props: {
        initialData: {
            type: Object,
            required: true
        }
    },
    methods: {
        // Передача данных
        saveData() {
            axios.post('/feedback', {
                rating: this.rating,
                comment: this.comment,
                id_order: this.id_order,
            })
                .then(response => {
                    console.log(response.data);

                    window.location.reload();
                })
                .catch(error => {
                    console.error(error);
                });
        },
        showFeedbackForm() {
            this.showForm = true;
        },
        setRating(rating){
            this.rating= rating;
        }

    }
}
</script>

<style>
textarea{
    height: 130px !important;
}
.rating-text{
    font-size: clamp(1rem, 0.875rem + 0.63vw, 1.875rem);
}
</style>
