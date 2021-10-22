<template>
    <div class="item">
        <div style="position: relative; background-size: cover" :style="'background-image: url(' + cover + ')'" class="img">
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%)"></div>
        </div>
        <div class="itemDetails">
            <div class="titleDistance">
                <h5>{{ title }}</h5>
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
        cover: String,
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
        cursor: pointer;

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
        }

        .itemDetails {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 10px 5px;
            
            .titleDistance {
                max-width: 100%;

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