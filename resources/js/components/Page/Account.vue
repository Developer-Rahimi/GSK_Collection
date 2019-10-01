<template>
   <div class="container">
       <div id="Account">
           <div class="card">
               <div class="card-header">
                   <h2 class="title">حساب کاربری</h2>
                   <h3 class="head">به حساب کاربری خود خوش آمدید. در اینجا میتوانید تمام اطلاعات شخصی و سفارشات خود را مدیریت نمائید.</h3>
               </div>
               <div class="card-body">
                   <ul>
                       <li v-for="Item in Itemes">
                           <a href=""></a>
                           <font-awesome-icon class="icon" style="font-size: 70px;color:#4d90fe"  v-bind:icon="Item.icon" />
                           <span class="name" v-text="Item.Name"></span>
                       </li>
                   </ul>
               </div>
           </div>


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
