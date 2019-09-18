<template>
    <div>
        <a v-for="menu in Menues" v-bind:href="menu.Link" v-bind:title="menu.Title"><sapn >{{menu.Title}}</sapn></a>
    </div>
</template>

<script>
    export default {
        name: "Access",
        data(){
            return {
                Menues:[
                    {Title:"اتوماسیون",Link:"#"},
                    {Title:"محصولات جدید",Link:"#"},
                    {Title:"آموزش",Link:"#"},
                    {Title:"وبلاگ",Link:"#"},
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
