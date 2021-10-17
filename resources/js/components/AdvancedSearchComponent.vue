<template>
    <div class="indexContainer">
        <div id="indexNav">
            <ul>
                <li>Home type</li>
                <li>Home type</li>
                <li>Home type</li>
                <li>Home type</li>
                <li>Home type</li>
                <li>Home type</li>
                <li>Home type</li>
                <li>Home type</li>
                <li>More &#x25BC;</li>
            </ul>
            <div class="filters">
                <button type="button" class="time" data-toggle="modal" data-target="#timeModal">Anytime &#x25BC;</button>

                <div class="modal show" id="timeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog duration" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pick your favourite setting!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            *filter here would be useful if we actually included booking*
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                        </div>
                    </div>
                </div>
                
                <button type="button" class="guests" data-toggle="modal" data-target="#guestModal"><span v-if="guestNumber !== 0">{{ this.guestNumber }}</span> {{ this.guestWord }} &#x25BC;</button>

                <div class="modal show" id="guestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog guest" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Selezione ospiti</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span>Quante persone alloggeranno?</span>
                            <div class="guestsFilter">
                                <button v-on:click="guestDecrease"><span>-</span></button>
                                <span>{{ this.guestNumber }}</span>
                                <button v-on:click="guestIncrease"><span>+</span></button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" v-on:click="guestsReset">Reset</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Salva</button>
                        </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="other" data-toggle="modal" data-target="#filterModal">Filtri</button>

                <div class="modal" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog filter dark" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Filtri</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5>Price range</h5>
                            <div class="priceFilter">
                                <Slider v-model="value" v-on:change="getApartments"
                                    :min="this.priceMin"
                                    :max="this.priceMax"
                                    />
                            </div>
                            <div class="minorFilters">
                                <div class="minorLeft">
                                    <div class="beds">
                                        <h5>Letti:</h5>
                                        <div class="bedButtons">
                                            <button v-on:click="bedDecrease"><span>-</span></button>
                                            <span>{{ this.bedsNumber }}</span>
                                            <button v-on:click="bedIncrease"><span>+</span></button>
                                        </div>
                                    </div>
                                    <div class="rooms">
                                        <h5>Camere:</h5>
                                        <div class="roomButtons">
                                            <button v-on:click="roomDecrease"><span>-</span></button>
                                            <span>{{ this.roomsNumber }}</span>
                                            <button v-on:click="roomIncrease"><span>+</span></button>
                                        </div>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                                <div class="minorRight"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" v-on:click="filterReset">Reset</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Salva</button>
                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- <div v-for="service in services" :key="service.id">
            {{ service.service_name }}
        </div> -->

        <div id="indexContent">
            <card v-for="apartment in apartments" :key="apartment.id"
                :title="apartment.title"
                :price="apartment.price"
                :guests_n="apartment.guests_n"
                :beds_n="apartment.beds_n"
            />
                
        </div>

        <!-- <ul class="pagination">
            <li v-for="n in totalPage" :key="n" v-on:click="changePage(n)" class="page-item">
                <a class="page-link" href="#">{{ n }}</a>
            </li>
        </ul> -->
    </div>

</template>

<script> 

import Card from './Card.vue';
import Vue from 'vue';
import VueCompositionAPI from '@vue/composition-api'
import Slider from '@vueform/slider/dist/slider.vue2.js'

Vue.use(VueCompositionAPI)

export default {
    components: {
        'Card': Card,
        Slider,
    },

    mounted() {
        this.getApartments();
        this.getAllServices();
    },

    data() {
        return {
            apartments: [],
            services: [],
            currentPage: 1,
            totalPage: 0,
            guestNumber: 0,
            guestWord: 'Ospiti',
            bedsNumber: 0,
            value: [50, 1000],
            priceMin: 50,
            priceMax: 1000,
            roomsNumber: 0,
        }
    },

    methods: {

        getApartments() {
            axios.get(`/api/apartments/?guests=${this.guestNumber}&priceMin=${this.value[0]}&priceMax=${this.value[1]}&beds=${this.bedsNumber}&rooms=${this.roomsNumber}`).then((response) => {
                this.apartments = response.data;
            });
        },

        getAllServices() {
            axios.get(`/api/services`).then((response) => {
                this.services = response.data;
            });
        },

        changePage(nPage) {
            this.currentPage = nPage;
            this.getApartments();
        },

        guestIncrease() {
            this.guestNumber++;
            if (this.guestNumber === 1) {
                this.guestWord = 'Ospite';
            } else {
                this.guestWord = 'Ospiti'
            }

            this.getApartments();
        },

        guestDecrease() {
            if (this.guestNumber === 0) {
                return;
            }
            this.guestNumber--;
            if (this.guestNumber === 1) {
                this.guestWord = 'Ospite';
            } else {
                this.guestWord = 'Ospiti';
            }

            this.getApartments();
        },

        bedIncrease() {
            this.bedsNumber++;
            this.getApartments();
        },

        bedDecrease() {
            if (this.bedsNumber === 0) {
                return;
            }
            this.bedsNumber--;
            this.getApartments();
        },

        roomIncrease() {
            this.roomsNumber++;
            this.getApartments();
        },

        roomDecrease() {
            if (this.roomsNumber === 0) {
                return;
            }
            this.roomsNumber--;
            this.getApartments();
        },

        guestsReset() {
            this.guestNumber = 0;
            this.getApartments();
        },

        filterReset() {
            Vue.set(this.value, 0, 50);
            Vue.set(this.value, 1, 1000);
            this.bedsNumber = 0;
            this.roomsNumber = 0;

            this.getApartments();
        }
    },
}
</script>

<style src="@vueform/slider/themes/default.css"></style>
<style lang="scss" scoped>

.indexContainer {
margin: 0 80px;
}

#indexNav {
    height: 110px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;

    ul {
        list-style-type: none;
        display: flex;
        margin-bottom: 0;
        padding-left: 0;

        li {
            margin-right: 25px;

        }
    }

    .filters {
        display: flex;
        position: relative;

        .time, .guests, .other {
            padding: 10px 15px;
            margin-left: 10px;
            border: 1px solid #ccc;
            border-radius: 30px;
            cursor: pointer;
        }

        .modal.show {
            inset: 0px !important;

            .modal-dialog{
                position: absolute;
                padding: 5px;
                width: 45vw;

                .modal-header {
                    position: relative;
                    justify-content: center;
                    border-bottom: none;

                    .close {
                        position: absolute;
                        top: 16px;
                        right: 16px;
                    }
                }

                .modal-body {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    text-align: center;

                    .guestsFilter {
                        margin-top: 20px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }

                    .priceFilter {
                        width: 80%;
                    }

                    .minorFilters {
                        display: flex;
                        width: 100%;
                        margin-top: 30px;

                        & > div {
                            width: 50%;
                        }

                        .minorLeft {
                            display: flex;
                            flex-direction: column;

                            .beds, .rooms {
                                display: flex;
                                flex-direction: column;
                                align-items: center;

                                h5 {
                                    margin-bottom: 15px;
                                }

                                .bedButtons, .roomButtons {
                                    display: flex;
                                    align-items: center;
                                }
                            }
                        }
                    }

                    button {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        margin: 0 15px;
                        width: 30px;
                        height: 30px;
                        border-radius: 50%;
                        font-size: 20px;
                    }

                    & > h5 {
                        margin-bottom: 50px;
                    }
                }

                .modal-footer {
                    display: flex;
                    justify-content: space-between;
                }

                &.duration {
                    top: 120px;
                    right: 300px;
                }

                &.guest {
                    top: 120px;
                    right: 200px;
                }

                &.filter.dark {
                    position: static;
                    width: 50%;
                    max-width: unset;
                }
            }
        }
    }
}

#indexContent {
    display: flex;
    flex-wrap: wrap;
}

.pagination {
    justify-content: center;
}

.modal-backdrop {
    background-color: #fff !important;

    &.show {
        opacity: 0 !important;
    }
}

</style>