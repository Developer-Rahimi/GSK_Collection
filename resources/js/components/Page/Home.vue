<template>
    <div  id="Product">
        <span class="title">جدید ترین محصولات</span>
        <carousel class="carousel"  :navigationEnabled="true" :per-page="5">

                <slide  v-for="Product in Products" v-bind:key="Product.ProductID">
                    <a href="#">

                        <img class="card-img" v-bind:src="'Images/'+Product.ProductIamge">
                        <span class="title" v-text="Product.ProductName"></span>
                        <span class="price" v-text="Product.ProductPrice+' تومان'"></span>
                        <span class="btn_add_cart" >افزودن به سبد خرید</span>
                    </a>
                </slide>

        </carousel>
        <span class="title">پرفروش ترین محصولات</span>
        <carousel class="carousel" navigationEnabled="true" :per-page="5">

                <slide  v-for="Product in Products" v-bind:key="Product.ProductID">

                        <a href="#">
                        <img class="card-img" v-bind:src="'Images/'+Product.ProductIamge">
                        <span class="title" v-text="Product.ProductName"></span>
                        <span class="price" v-text="Product.ProductPrice+' تومان'"></span>
                        <span class="btn_add_cart" >افزودن به سبد خرید</span>
                        </a>
                </slide>

        </carousel>
        <span class="title">تخفیفات ویژه</span>
        <carousel class="carousel" navigationEnabled="true" :per-page="5">

                <slide  v-for="Product in Products" v-bind:key="Product.ProductID">
                    <a href="#">
                        <img class="card-img" v-bind:src="'Images/'+Product.ProductIamge">
                        <span class="title" v-text="Product.ProductName"></span>
                        <span class="price" v-text="Product.ProductPrice+' تومان'"></span>
                        <span class="btn_add_cart" >افزودن به سبد خرید</span>
                    </a>
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