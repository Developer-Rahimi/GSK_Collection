<template>
   <div class="container">
       <div id="Account">
           <h3 class="head">به حساب کاربری خود خوش آمدید. در اینجا میتوانید تمام اطلاعات شخصی و سفارشات خود را مدیریت نمائید.</h3>
        <ul>
            <li v-for="Item in Itemes">
                <a href=""></a>
                <font-awesome-icon class="icon" style="font-size: 70px;color:#4d90fe"  v-bind:icon="Item.icon" />
                <span class="name" v-text="Item.Name"></span>
            </li>
        </ul>
       </div>
   </div>
</template>

<script>
    export default {
        name: "Account",
        data(){
            return {
                Itemes:[
                    {Name:"اطلاعات شخصی من",icon:"user",link:"#"},
                    {Name:"محصولات مورد علاقه",icon:"heart",link:"#"},
                    {Name:"تاریخچه و جزییات سفارش",icon:"history",link:"#"},
                    {Name:"صورت های مالی من",icon:"money-bill-alt",link:"#"},
                    {Name:"آدرس های من",icon:"map-marker-alt",link:"#"},
                    {Name:"تخفیف های من",icon:"barcode",link:"#"},
                ],
                User:{},
            };
        },
        mounted() {
            this.GetInfoUser();
        },
        methods:{
            GetInfoUser(){

            }
        }
    }
</script>

<style scoped>

</style>
