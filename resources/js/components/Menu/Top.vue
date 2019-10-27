<template>
<div id="Top">
       <a v-for="menu in Menues" v-bind:href="menu.Link" v-bind:title="menu.Title"><span >{{menu.Title}}</span><font-awesome-icon  v-bind:icon="menu.icon" /></a>
</div>
</template>

<script>
    export default {
        name: "Top",
           props:{
                  UserInfo:{
                         type: String,
                         required: true,
                  }
           },
        data(){
            return{
                Menues:[],
                User:{},
        }
        },
           mounted(){
                 // this.User=JSON.parse(this.UserInfo);
                  this.InitMenu();
           },
           methods:{
                  InitMenu(){
                         if(this.UserInfo){
                                this.Menues.push({Title:"حساب من",Link:"/User/MyAccount",icon:"user"});
                                this.Menues.push({Title:"خروج",Link:"/User/LogOut",icon:"sign-out-alt"});
                                this.Menues.push({Title:"سبد خرید",Link:"/Cart",icon:"cart-plus"});
                         }else{
                                this.Menues.push({Title:"ورود",Link:"/User/Login",icon:"sign-in-alt"});
                                this.Menues.push({Title:"ثبت نام",Link:"/User/Login",icon:"user"});
                         }


                  }
           }
    }
</script>

<style scoped>

</style>
