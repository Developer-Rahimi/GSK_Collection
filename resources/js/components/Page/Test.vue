<template>
    <div>
        {{Data}}
        <EditText
            :required="true"
            :MinLength=3
            :Type="text"
        :Info=ch
        />
    </div>
</template>

<script>
    export default {
        name: "Test",
        data(){
            return {
                Data:'',
            }
        },mounted() {
        },
        methods:{
            ch(d){
               console.log(d) ;
            }
        }
    }
</script>

<style scoped>

</style>
