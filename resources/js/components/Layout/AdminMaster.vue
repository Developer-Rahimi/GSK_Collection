<template>
    <div>
        <div style="float: right;width: 100%;height: 60px;border-bottom: 1px solid silver">
            <div class="container">
                <div id="Menu">
                    <a v-for="Menu in Menues"v-bind:href="UrlAdmin+Menu.Link">{{Menu.Name}}</a>
                </div>
            </div>

        </div>
        <div class="container">

        </div>
        <div class="Content">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AdminMaster",
        props:{
            UrlAdmin: {
                type: String,
                required: true,
            },
        },
        data(){
            return {
                Menues:[
                    {Name:"صفحه اصلی",Link:"/"},
                    {Name:"محتوا",Link:"/Content"},
                    {Name:"سفارشات",Link:"/Order"},
                    {Name:"محصولات",Link:"/Product"},
                    {Name:"کاربران",Link:"/User"},
                ],
            }
        },
        mounted() {
        },
        methods:{

        }
    }
</script>

<style scoped>

</style>