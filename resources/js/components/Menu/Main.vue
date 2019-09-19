<template>
    <div class="menu">
       <a v-for="menu in Menues" v-bind:href="menu.Link" v-bind:title="menu.Title"><sapn >{{menu.Title}}</sapn></a>
    </div>
</template>

<script>
    export default {
        name: "MainMenu",
        data(){
            return {
                Menues:[
                    {Title:"صفحه اصلی",Link:"/"},
                    {Title:"حساب من",Link:"#"},
                    {Title:"مرکز دانلود",Link:"#"},
                    {Title:"تماس با ما",Link:"/Contact"},
                    {Title:"در باره ما",Link:"/About"},
                    {Title:"خروج",Link:"#"},
                ],
            }
        },
        mounted:{

        },
        methods:{

        }

    }
</script>

<style scoped>

</style>
