<template>
    <div class="item">
        <div style="position: relative" class="img">
            <div class="favorite">&#9825;</div>
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%)">
                Guests: {{ guests_n }}
                <br>
                Beds: {{ beds_n }}
                <br>
                <br>
                Services: {{ service }}, {{ service2 }}
            </div>
        </div>
        <div class="itemDetails">
            <div class="titleDistance">
                <h5>{{ title }}</h5>
                <span>distance</span>
            </div>
            <div class="price">{{ price }}€ /notte</div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Card',
    data() {
        return {

        }
    },
    props: {
        title: String,
        price: String,
        service: String,
        service2: String,
        guests_n: Number,
        beds_n: Number,
    }
}
</script>

<style lang="scss" scoped>

    .item {
        width: 18%;
        height: 0;
        padding-bottom: calc(18% + 50px);
        margin-bottom: 40px;
        border-radius: 20px;
        margin-right: 1.6%;

        &:nth-child(5n+1) {
            margin-left: 1.6%;
        }

        .img {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 100%;
            border-radius: 20px;
            border: 1px solid black;

            .favorite {
                position: absolute;
                top: 0px;
                right: 10px;
                font-size: 32px;
            }
        }

        .itemDetails {
            display: flex;
            justify-content: space-between;
            padding: 10px 5px;
            
            .titleDistance {
                max-width: 60%;

                h5 {
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                }

                span {
                    color: #666;
                }
            }

            .price {
                font-size: 16px;
            }
        }
    }

</style>