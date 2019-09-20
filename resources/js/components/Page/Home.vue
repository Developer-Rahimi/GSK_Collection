<template>
    <div>

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
                Product:[]

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
                        console.log(response.data) ;
                        this.Product=response.data;
                    })
            }
        }
    }
</script>

<style scoped>

</style>