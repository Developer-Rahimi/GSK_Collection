<template>
    <div id="New">
        <div class="container">
            <a  v-for="Menu in Menues" href="#"><font-awesome-icon  v-bind:icon="Menu.Icon" /><span v-text="Menu.Name"></span></a>
        </div>

    </div>
</template>

<script>
    export default {
        name: "New",
        data(){
            return {
                Menues:[
                    {Name:"حساب من",Link:"#",Icon:"user"},
                    {Name:"لیست علاقه مندیها",Link:"#",Icon:"heart"},
                    {Name:"سبد خرید",Link:"#",Icon:"shopping-cart"},
                    {Name:"ورود کاربر",Link:"#",Icon:"sign-in-alt"},
                ],
            }
        }
    }
</script>

<style scoped>

</style>