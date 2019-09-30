<template>
    <h1>Cart</h1>
</template>

<script>
    export default {
        name: "Cart",
        props: {
            UrlGetCart: {
                type: String,
                required: true,
            },
        },
        data(){
            return{
                Carts:[],
            }
        },
        mounted() {
            this.GetCart();
        },
        methods:{
            GetCart(){
                axios
                    .get(this.UrlGetCart)
                    .then(response => {
                        var data=response.data;
                        console.log(data) ;
                        this.Carts=data;
                    })
            }

        }
    }
</script>

<style scoped>

</style>
