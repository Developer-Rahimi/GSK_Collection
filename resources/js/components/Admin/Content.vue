<template>
    <div>
        <h1>Contents</h1>
    </div>
</template>

<script>
    export default {
        name: "Contents",
        data(){
            return {
                Contents:[]
            }
        },
        mounted() {
            this.GetContents();
        },
        methods:{
            GetContents(){

            }
        }
    }
</script>

<style scoped>

</style>