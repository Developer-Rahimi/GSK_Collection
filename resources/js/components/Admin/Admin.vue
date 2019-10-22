<template>
    <div class="container">
        <h1>مدیریت سایت</h1>
        <div class="card">
            <div class="card-header">
                <h3>صفحه اصلی</h3>
            </div>
            <div class="card-body">
                <ul>
                    <li v-for="Menu in Menues">
                        <a v-bind:href="Menu.Link" v-bind:title="Menu.Name"><span v-text="Menu.Name"></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Admin",
        data(){
            return {
                Menues:[
                    {Name:"محتوا",Link:"/Admin/Content",icon:""},
                    {Name:"کاربران",Link:"/Admin/User",icon:"user"},
                ]
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