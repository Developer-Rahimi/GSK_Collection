<template>
    <div  id="Product">
        <span class="title">جدید ترین محصولات</span>
        <carousel class="carousel"  :navigationEnabled="true" :per-page="5">

            <slide  v-for="Product in Products" v-bind:key="Product.ProductID">
                <a v-bind:href="'Show/Content/'+Product.ProductID">

                    <img class="card-img" v-bind:src="'Images/'+Product.ProductIamge">
                    <div class="name" ><font-awesome-icon  icon="tag" /><span v-text="Product.ProductName"></span></div>
                    <div class="price" ><font-awesome-icon  icon="money-bill" /><span v-text="Product.ProductPrice+' تومان'"></span></div>
                    <div class="btn_add_cart" ><font-awesome-icon  icon="cart-plus" /><span>افزودن به سبد خرید</span></div>
                </a>
            </slide>

        </carousel>
        <span class="title">پرفروش ترین محصولات</span>
        <carousel class="carousel" navigationEnabled="true" :per-page="5">

            <slide  v-for="Product in Products" v-bind:key="Product.ProductID">
                <a href="#">

                    <img class="card-img" v-bind:src="'Images/'+Product.ProductIamge">
                    <div class="name" ><font-awesome-icon  icon="tag" /><span v-text="Product.ProductName"></span></div>
                    <div class="price" ><font-awesome-icon  icon="money-bill" /><span v-text="Product.ProductPrice+' تومان'"></span></div>
                    <div class="btn_add_cart" ><font-awesome-icon  icon="cart-plus" /><span>افزودن به سبد خرید</span></div>
                </a>
            </slide>

        </carousel>
        <span class="title">تخفیفات ویژه</span>
        <carousel class="carousel" navigationEnabled="true" :per-page="5">

            <slide  v-for="Product in Products" v-bind:key="Product.ProductID">
                <a href="#">

                    <img class="card-img" v-bind:src="'Images/'+Product.ProductIamge">
                    <div class="name" ><font-awesome-icon  icon="tag" /><span v-text="Product.ProductName"></span></div>
                    <div class="price" ><font-awesome-icon  icon="money-bill" /><span v-text="Product.ProductPrice+' تومان'"></span></div>
                    <div class="btn_add_cart" ><font-awesome-icon  icon="cart-plus" /><span>افزودن به سبد خرید</span></div>
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
