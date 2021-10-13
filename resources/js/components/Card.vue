<template>
    <div class="item">
        <div class="img">
            <div class="favorite">&#9825;</div>
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