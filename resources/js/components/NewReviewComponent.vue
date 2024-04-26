<template>

    <div class="row">
        <div class="col-12">
            <div class="title-div d-flex align-items-center">
                <h4 class="orders-info m-3 me-5 ">Оставьте отзыв о нашей работе</h4>
                <button type="button" data-bs-toggle="modal" data-bs-target="#feedback" class="btn col-sm-12 col-md-3 p-1" >Написать отзыв</button>
            </div>
        </div>
    </div>
    <div class="row text-center">
        <div class="modal fade" id="feedback" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Оцените качество услуги</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                    </div>
                    <div class="modal-body">
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
                                <textarea class="form-control" placeholder="Комментарий" name="comment" v-model="comment" id="comment" required></textarea>
                                <label for="comment">Комментарий</label>
                                <button class="btn form__btn p-3" type="submit" @click="saveData">Отправить</button>
                            </div>
                    </div>

                </div>
            </div>
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
