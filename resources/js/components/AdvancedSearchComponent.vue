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
                            <h5 class="modal-title" id="exampleModalLabel">Pick your favourite setting!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span>Quante persone alloggeranno?</span>
                            <div>
                                <button v-on:click="guestDecrease"><span>-</span></button>
                                <span v-on:change="filter">{{ this.guestNumber }}</span>
                                <button v-on:click="guestIncrease"><span>+</span></button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="other" data-toggle="modal" data-target="#filterModal">Filters</button>

                <div class="modal" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog filter dark" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Filters</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Coming soon™
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div id="indexContent">
            <card v-for="apartment in apartments" :key="apartment.id"
                :title="apartment.title"
                :price="apartment.price"
            />
                
        </div>

        <ul class="pagination">
            <li v-for="n in totalPage" :key="n" v-on:click="changePage(n)" class="page-item">
                <a class="page-link" href="#">{{ n }}</a>
            </li>
        </ul>
    </div>

</template>

<script> 

import Card from './Card.vue';

export default {
    components: {
        'Card': Card
    },

    mounted() {
        this.getAllApartments();
    },

    data() {
        return {
            allApartments: [],
            apartments: [],
            currentPage: 1,
            totalPage: 0,
            guestNumber: 0,
            guestWord: 'Guests',
        }
    },

    methods: {
        getAllApartments() {
            axios.get(`/api/apartments`).then((response) => {
                this.allApartments = response.data.data;
                this.apartments = response.data.data;
                this.totalPage = response.data.meta.last_page;
            });
        },
        
        getApartments() {
            axios.get(`/api/apartments?page=${this.currentPage}`).then((response) => {
                this.apartments = response.data.data;
            });
        },

        changePage(nPage) {
            this.currentPage = nPage;
            this.getApartments();
        },

        filter() {
            
        },

        guestIncrease() {
            this.guestNumber++;
            if (this.guestNumber === 1) {
                this.guestWord = 'Guest';
            } else {
                this.guestWord = 'Guests'
            }
        },

        guestDecrease() {
            if (this.guestNumber === 0) {
                return;
            }
            this.guestNumber--;
            if (this.guestNumber === 1) {
                this.guestWord = 'Guest';
            } else {
                this.guestWord = 'Guests'
            }
        },

        
    },
}
</script>

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
                    text-align: center;

                    & > div {
                        margin-top: 20px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
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
    justify-content: space-between;
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