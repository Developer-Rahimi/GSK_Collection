<template>
    <div id="ProductPage">
        <a href="#" v-for="Product in Products">

            <img class="card-img" v-bind:src="' ./../../images/'+Product.ProductIamge">
            <div class="name" ><font-awesome-icon  icon="tag" /><span v-text="Product.ProductName"></span></div>
            <div class="price" ><font-awesome-icon  icon="money-bill" /><span v-text="Product.ProductPrice+' تومان'"></span></div>
            <div class="btn_add_cart" ><font-awesome-icon  icon="cart-plus" /><span>افزودن به سبد خرید</span></div>
        </a>
    </div>
</template>

<script>
    export default {
        name: "ShowPage",
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
