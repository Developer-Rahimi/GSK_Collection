<template>
    <div>
        <ul>
            <li v-for="menu in Menues">
                <a  v-bind:href="menu.Link" v-bind:title="menu.Title"><sapn >{{menu.Title}}</sapn></a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "Access",
        data(){
            return {
                Menues:[
                    {Title:"اتوماسیون",Link:"#",icon:"tools"},
                    {Title:"محصولات جدید",Link:"#",icon:"product-hunt"},
                    {Title:"آموزش",Link:"#",icon:"school"},
                    {Title:"وبلاگ",Link:"#",icon:"blog"},
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
