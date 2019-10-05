<template>
    <div>
        <EditText
            :required="true"
            :MinLength=3
            TypeInput="number"
        :Info=ch>

        </EditText>

        <BigText
            :required="false"
            :MinLength=20
            :Info=ch></BigText>
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
