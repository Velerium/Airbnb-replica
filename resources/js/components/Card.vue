<template>
    <div class="item">
        <div class="img">
            <div class="favorite">&#9825;</div>
        </div>
        <div class="itemDetails">
            <div class="titleDistance">
                <h4>Ellipsis with a loooooooong title</h4>
                <span>distance</span>
            </div>
            <div class="price">price</div>
        </div>
    </div>
</template>

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

                h4 {
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                }

                span {
                    color: #666;
                }
            }
        }
    }

</style>