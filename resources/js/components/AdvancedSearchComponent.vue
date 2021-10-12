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
                
                <button type="button" class="guests" data-toggle="modal" data-target="#guestModal">Guests &#x25BC;</button>

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
                            *filter here would be useful if we actually included booking*
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

        <div id="indexContent" v-for="apartment in apartments" :key="apartment.id">
            <div class="card-title">{{ apartment.title }}</div>
        </div>
        
        <card/>

        <!-- <div class="links">{{ $apartments->links() }}</div> -->
    </div>

</template>

<script> 

import Card from './Card.vue';

export default {
    components: {
        'Card': Card
    },

    mounted() {
        this.getApartments();
    },

    data() {
        return {
            apartments: [],
        }
    },

    methods: {
        getApartments() {
            axios.get(`/api/apartments`).then((response) => {
                this.apartments = response.data.data
            });
        }
    },
}
</script>

<style lang="scss" scoped>

</style>