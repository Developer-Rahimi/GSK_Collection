<template>
    <div>
        <div ID="Product" v-for="Product in Products">
            <div class="card">
                <img class="card-img" v-bind:src="'Images/'+Product.ProductIamge">
                <span class="title" v-text="Product.ProductName"></span>
                <span class="price" v-text="Product.ProductPrice+' تومان'"></span>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "Home",
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