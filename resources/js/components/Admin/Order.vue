<template>
    <div>
        <h1>Order</h1>
    </div>
</template>

<script>
    export default {
        name: "Order",
        props:{
            UrlGetOrder: {
                type: String,
                required: true,
            },
        },
        data(){
            return{
                Orders:[],
            }
        },
        mounted() {
        },
        methods:{
            GetUsers(){
                this.Loading=true;
                axios
                    .get(this.UrlGetOrder)
                    .then(response => {
                        var data=response.data;
                        console.log(data) ;
                        this.Orders=data;
                    }).finally(() => this.Loading = false)
            },
        }
    }
</script>

<style scoped>

</style>