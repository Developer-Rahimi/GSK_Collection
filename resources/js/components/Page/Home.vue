<template>
    <div>
        <carousel :per-page="5">

                <slide ID="Product" v-for="Product in Products" v-bind:key="Product.ProductID">
                    <div class="item">
                        <img class="card-img" v-bind:src="'Images/'+Product.ProductIamge">
                        <span class="title" v-text="Product.ProductName"></span>
                        <span class="price" v-text="Product.ProductPrice+' تومان'"></span>
                    </div>
                </slide>

        </carousel>

    </div>

</template>

<script>
    import { Carousel, Slide } from 'vue-carousel';
    export default {
        name: "Home",
        components: {
            Carousel,
            Slide
        },
        props: {
            UrlGetProduct: {
                type: String,
                required: true,
            },
        },
        data(){
            return {
                Products:[]

            };
        },
        mounted() {
            this.GetProduct();
        },
        methods:{
            GetProduct(){
                axios
                    .get(this.UrlGetProduct)
                    .then(response => {
                        var data=response.data;
                        console.log(data) ;
                        this.Products=data;
                    })
            }
        }
    }
</script>

<style scoped>

</style>