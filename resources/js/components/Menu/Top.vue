<template>
<div id="Top">
       <a v-for="menu in Menues" v-bind:href="menu.Link" v-bind:title="menu.Title"><span >{{menu.Title}}</span><font-awesome-icon  v-bind:icon="menu.icon" /></a>
</div>
</template>

<script>
    export default {
        name: "Top",
        data(){
            return{
                Menues:[
                    {Title:"ورود",Link:"/User/Login",icon:"sign-in-alt"},
                    {Title:"حساب من",Link:"/User/MyAccount",icon:"user"},
                    {Title:"خروج",Link:"/User/LogOut",icon:"sign-out-alt"},
                    {Title:"سبد خرید",Link:"/Cart",icon:"cart-plus"},
                ],
            }
        }
    }
</script>

<style scoped>

</style>
