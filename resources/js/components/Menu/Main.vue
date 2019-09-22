<template>
    <div class="menu">
       <a v-for="menu in Menues" v-bind:href="menu.Link" v-bind:title="menu.Title"><span >{{menu.Title}}</span><font-awesome-icon  v-bind:icon="menu.icon" /></a>
    </div>
</template>

<script>
    export default {
        name: "MainMenu",
        data(){
            return {
                Menues:[
                    {Title:"صفحه اصلی",Link:"/",icon:"home"},
                    {Title:"حساب من",Link:"#",icon:"user"},
                    {Title:"مرکز دانلود",Link:"#",icon:"download"},
                    {Title:"تماس با ما",Link:"/Contact",icon:"phone-square-alt"},
                    {Title:"در باره ما",Link:"/About",icon:"info-circle"},
                    {Title:"خروج",Link:"#",icon:"sign-out-alt"},
                ],
            }
        },
        mounted(){

        },
        methods:{

        }

    }
</script>

<style scoped>

</style>
