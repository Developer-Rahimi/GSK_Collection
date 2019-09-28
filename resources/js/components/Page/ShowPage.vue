<template>
    <div>
        <h1>Show Page</h1>
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
