<template>
    <div class="indexContainer">
        <h1>I nostri appartamenti</h1>
        <div id="indexNav">
            <div class="filters">
            <!-- <button type="button" class="time" data-toggle="modal" data-target="#timeModal">Anytime &#x25BC;</button>

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
                </div> -->
                
                <button type="button" class="guests" data-toggle="modal" data-target="#guestModal"><span v-if="guestNumber !== 0">{{ this.guestNumber }}</span> {{ this.guestWord }}</button>

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
                            <h3 class="modal-title" id="exampleModalLongTitle">Personalizza la tua esperienza</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5>Prezzo per notte</h5>
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
                                </div>
                                <div class="minorRight">
                                    <div class="rooms">
                                        <h5>Camere:</h5>
                                        <div class="roomButtons">
                                            <button v-on:click="roomDecrease"><span>-</span></button>
                                            <span>{{ this.roomsNumber }}</span>
                                            <button v-on:click="roomIncrease"><span>+</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="servicesFilter">
                                <h5>Servizi</h5>
                                <div class="services">
                                    <div v-for="service in services" :key="service.id"  :id="service.id" :name="service.service_name">
                                        <input v-on:change="newFilterQuery(service.id)" type="checkbox" name="service">
                                        <label :for="service.service_name">{{service.service_name}}</label>
                                    </div>
                                </div>
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
            <card v-on:click.native="redirect(apartment.id)" v-for="apartment in apartments" :key="apartment.id"
                :title="apartment.title"
                :cover="apartment.cover"
                :price="apartment.price"
                :guests_n="apartment.guests_n"
                :beds_n="apartment.beds_n"
                :service="apartment.service[0].service_name"
                :service2="apartment.service[1].service_name"
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

    data() {
        return {
            apartments: [],
            aptByQuery: [],
            services: [],
            filterService: [],
            currentPage: 1,
            totalPage: 0,
            guestNumber: 0,
            guestWord: 'Ospiti',
            bedsNumber: 0,
            roomsNumber: 0,
            value: [35, 1000],
            priceMin: 35,
            priceMax: 1000,
            // fuzzySearch: '',
            newQuery: ``,
            filterFlag: false,

            // searchOptions: {
            //     key: 'pj3fPYZczjgdGuLpmajsU40F64Y5nmpB',
            //     language: 'it-IT',
            //     limit: 15,
            //     center: [9.1881, 45.4636],
            //     radius: 100000,
            // },

            // autocompleteOptions: {
            //     key: 'pj3fPYZczjgdGuLpmajsU40F64Y5nmpB',
            //     language: 'it-IT',
            // },
        }
    },

    computed: {
        queryURL() {
            return `/api/apartments/?guests=${this.guestNumber}&priceMin=${this.value[0]}&priceMax=${this.value[1]}&beds=${this.bedsNumber}&rooms=${this.roomsNumber}`;
        },
        newQueryURL() {
            return `${this.newQuery}`;
        },

        // searchBoxOptions() {
        //     return {
        //         minNumberofCharacters: 3,
        //         searchOptions: this.searchOptions,
        //         autocompleteOptions: this.autocompleteOptions,
        //     }
        // } 
    },

    mounted() {
        this.getApartments();
        this.getAllServices();
        // this.fuzzyTimeout();
    },

    methods: {

        getApartments() {
            if (this.newQuery === ``) {
                axios.get(this.queryURL).then((response) => {
                    this.apartments = response.data;
                });
            } else {
                
                this.newQuery = this.newQuery.replace(/(priceMin=)[^\&]+/, '$1' + this.value[0]);
                this.newQuery = this.newQuery.replace(/(priceMax=)[^\&]+/, '$1' + this.value[1]);
                this.newQuery = this.newQuery.replace(/(beds=)[^\&]+/, '$1' + this.bedsNumber);
                this.newQuery = this.newQuery.replace(/(rooms=)[^\&]+/, '$1' + this.roomsNumber);

                axios.get(this.newQueryURL).then((response) => {
                    this.apartments = response.data;
                });
            }
        },

        getApartmentsServices() {
            axios.get(this.newQueryURL).then((response) => {
                this.apartments = response.data;
            });
        },

        getAllServices() {
            axios.get(`/api/services`).then((response) => {
                this.services = response.data;
            });
        },

        redirect(id) {
            window.location.href = '/searchApartments/' + id;
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

        serviceChange(id) {
            if (this.filterService.includes(id)) {
                var value = this.filterService.indexOf(id);
                this.filterService.splice(value, 1);
            } else {
                this.filterService.push(id);
            }
        },

        guestsReset() {
            this.guestNumber = 0;
            this.getApartments();
        },

        filterReset() {
            Vue.set(this.value, 0, 35);
            Vue.set(this.value, 1, 1000);
            this.bedsNumber = 0;
            this.roomsNumber = 0;

            var items = document.getElementsByName('service');
            items.forEach(service => {
                if (service.type === 'checkbox')
                    service.checked = false;
            });

            this.filterService = [];
            this.newQuery = ``;

            this.getApartments();
        },

        newFilterQuery(id) {
            this.serviceChange(id);
            this.newQuery = this.queryURL;
            for(var i = 0; i < this.filterService.length; i++) {
                this.newQuery += `&service[]=${this.filterService[i]}`
            }
            console.log(this.newQuery);
            this.getApartmentsServices();
        },

        // fuzzyTimeout() {
        //     setTimeout(this.fuzzySetup, 500);
        // },

        // fuzzySetup() {
        //     var ttSearchBox = new tt.plugins.SearchBox(tt.services, this.searchBoxOptions);
        //     document.querySelector('.minorRight').appendChild(ttSearchBox.getSearchBoxHTML());
        //     // var apts = JSON.parse(JSON.stringify(this.apartments))
        //     ttSearchBox.on('tomtom.searchbox.resultselected', event => {
        //         var coordinates = event.data.result.position;
        //         var queryLng = coordinates.lng.toFixed(4);
        //         var queryLat = coordinates.lat.toFixed(4);
        //         this.searchOptions.center = [queryLng, queryLat];

                

                //var aptsValues = Object.values(apts);

                    // delete axios.defaults.headers.common['X-Requested-With'];
                    // axios.get(`https://api.tomtom.com/routing/1/calculateRoute/${queryLng},${queryLat}:${aptLng},${aptLat}/json?language=it-IT&key=pj3fPYZczjgdGuLpmajsU40F64Y5nmpB`).then((response) => {
                    //     console.log(response.data.routes[0].summary.lengthInMeters);
                    // });
                
        //     });
        // }
    }
}

</script>

<style src="@vueform/slider/themes/default.css"></style>
<style lang="scss" scoped>

.indexContainer {
    margin: 60px 80px 30px;
    text-align: center;
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
        margin: 0 auto;

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
                        width: 50%;
                        margin: 40px 0;

                        & > div {
                            width: 50%;
                        }

                        .minorLeft, .minorRight {
                            display: flex;
                            flex-direction: column;

                            .beds, .rooms {
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                                margin-bottom: 30px;

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

                    .servicesFilter {

                        h5 {
                            margin-bottom: 30px;
                        }

                        .services {
                            display: flex;
                            flex-wrap: wrap;

                            div {
                                width: calc(100%/3);
                                margin-bottom: 20px;
                            }

                            label {
                                vertical-align: middle;
                                margin-left: 5px;
                                font-size: 14px;
                                font-weight: bold;
                            }
                        }
                    }
                }

                .modal-footer {
                    display: flex;
                    justify-content: space-between;
                }

                &.guest {
                    top: 230px;
                    right: 0;
                    bottom: 0;
                    left: 0;
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