<template>
       <div id="Top">
              <div class="container">
                     <a  v-for="Menu in Menues" href="#"><font-awesome-icon  v-bind:icon="Menu.Icon" /><span v-text="Menu.Name"></span></a>
              </div>

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
                                this.Menues.push({Name:"حساب من",Link:"/User/MyAccount",Icon:"user"});
                                this.Menues.push({Name:"خروج",Link:"/User/LogOut",Icon:"sign-out-alt"});
                                this.Menues.push({Name:"سبد خرید",Link:"/Cart",Icon:"shopping-cart"});
                                this.Menues.push({Name:"لیست علاقه مندیها",Link:"#",Icon:"heart"});
                         }else{
                                this.Menues.push({Name:"ورود",Link:"/User/Login",Icon:"sign-in-alt"});
                                this.Menues.push({Name:"ثبت نام",Link:"/User/Login",Icon:"user"});
                         }


                  }
           }
    }
</script>

<style scoped>

</style>
