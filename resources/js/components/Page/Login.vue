<template>
    <div id="Login">
        <div class="card">
            <div class="card-header">
                <h2 class="title">تائید هویت</h2>
            </div>
            <div class="card-body">
                <div class="register"   v-show="!ShowForm">
                    <span>ایجاد حساب کاربری</span>
                    <br>
                    <br>
                    <br>
                    <div class="field-form">
                        <span class="required" v-show="true">*</span>
                        <span class="Name" >ایمیل</span>
                        <br>
                        <br><!--v-show="User.UserName.length()<3"-->

                        <div class="main" v-if="true">
                            <input  class="c-text" type="email" v-model="Register.UserEmail"  >
                        </div>
                        <div class="main" v-else>
                            <input  class="c-text valid-text" v-model="Register.UserEmail"    type="email" >
                            <font-awesome-icon class="icon"  icon="check-circle"   />
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <button class="btn btn-warning" @click=" CheckEmail()">ایجاد حساب کاربری</button>
                </div>
                <div class="enter" v-show="!ShowForm">
                <span>آیا ثبت نام کرده اید؟</span>
                <br>
                <br>
                <br>
                    <div class="field-form">
                        <span class="required" v-show="true">*</span>
                        <span class="Name" >ایمیل</span>
                        <br>
                        <br><!--v-show="User.UserName.length()<3"-->

                        <div class="main" v-if="true">
                            <input  class="c-text" type="email" v-model="InfoLogin.UserEmail"  >
                        </div>
                        <div class="main" v-else>
                            <input  class="c-text valid-text" v-model="InfoLogin.UserEmail"    type="email" >
                            <font-awesome-icon class="icon"  icon="check-circle"   />
                        </div>
                    </div>
                    <div class="field-form">
                        <span class="required" v-show="true">*</span>
                        <span class="Name" >کلمه عبور</span>
                        <br>
                        <br>
                        <div class="main" v-if="true">
                            <input  class="c-text" type="password" v-model="InfoLogin.UserPassword"  >
                        </div>
                        <div class="main" v-else>
                            <input  class="c-text valid-text" v-model="InfoLogin.UserPassword"    type="password" >
                            <font-awesome-icon class="icon"  icon="check-circle"   />
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <button class="btn btn-info" v-if="InfoLogin.UserPassword.length>6 & InfoLogin.UserEmail.length>5" @click="Login()">ورود به حساب</button>
                    <button class="btn btn-info" v-else  disabled>ورود به حساب</button>
                    </div>


                <div class="registerForm" v-show="ShowForm">
                    <div class="field-form">
                        <span class="required" v-show="true">*</span>
                        <span class="Name" >نام ونام خانوادگی</span>
                        <br>
                        <br><!--v-show="User.UserName.length()<3"-->

                        <div class="main" v-if="true">
                            <input  class="c-text" type="text" v-model="Register.UserName"  >
                        </div>
                        <div class="main" v-else>
                            <input  class="c-text valid-text" v-model="Register.UserName"    type="text" >
                            <font-awesome-icon class="icon"  icon="check-circle"   />
                        </div>
                    </div>
                    <div class="field-form">
                        <span class="required" v-show="true">*</span>
                        <span class="Name" >شماره تلفن</span>
                        <br>
                        <br><!--v-show="User.UserName.length()<3"-->

                        <div class="main" v-if="true">
                            <input  class="c-text" type="phone" v-model="Register.UserPhone"  >
                        </div>
                        <div class="main" v-else>
                            <input  class="c-text valid-text" v-model="Register.UserPhone"    type="phone" >
                            <font-awesome-icon class="icon"  icon="check-circle"   />
                        </div>
                    </div>
                    <div class="field-form">
                        <span class="required" v-show="true">*</span>
                        <span class="Name" >کلمه عبور</span>
                        <br>
                        <br><!--v-show="User.UserName.length()<3"-->
                        <div class="main" v-if="Register.Password.length<6">
                            <input  class="c-text" type="password" v-model="Register.Password"  >
                        </div>
                        <div class="main" v-else>
                            <input  class="c-text valid-text" v-model="Register.Password"    type="password" >
                            <font-awesome-icon class="icon"  icon="check-circle"   />
                        </div>
                    </div>
                    <div class="field-form">
                        <span class="required" v-show="true">*</span>
                        <span class="Name" >تکرار کلمه عبور</span>
                        <br>
                        <br><!--v-show="User.UserName.length()<3"-->
                        <div class="main" v-if="Register.Password   !=Register.RePassword || Register.RePassword.length<6">
                            <input  class="c-text" type="password" v-model="Register.RePassword"  >
                        </div>
                        <div class="main" v-else>
                            <input  class="c-text valid-text" v-model="Register.RePassword"    type="password" >
                            <font-awesome-icon class="icon"  icon="check-circle"   />
                        </div>
                    </div>
                    <div class="field-form">
                        <button class="btn btn-success" @click="Logup">ثبت نام</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        name: "Login",
        props:{
            UrlLogin: {
                type: String,
                required: true,
            },
            UrlCheckEmail: {
                type: String,
                required: true,
            },
            UrlCheckRegister: {
                type: String,
                required: true,
            },
        },
        data(){
            return {
                InfoLogin:{
                    UserPassword:'',
                    UserEmail:'',
                },
                Register:{
                    Password:'',
                    RePassword:''
                },
                ShowForm:false,
            }
        },
        mounted() {
        },
        methods:{
            Login(){
                axios
                    .post(this.UrlLogin,{
                        UserEmail:this.InfoLogin.UserEmail,
                        UserPassword:this.InfoLogin.UserPassword,
                    })
                    .then(response => {
                        var data=response.data;
                        console.log(data) ;
                    })
            },
            CheckEmail(){
                axios
                    .post(this.UrlCheckEmail,{
                        UserEmail:this.Register.UserEmail,
                    })
                    .then(response => {
                        var data=response.data;
                        console.log(data) ;
                        if(data.Status==="NO"){
                            this.ShowForm=true;
                        }
                    })
            },
            Logup(){
                axios
                    .post(this.UrlCheckRegister,{
                        UserName:this.Register.UserName,
                        UserPhone:this.Register.UserPhone,
                        UserEmail:this.Register.UserEmail,
                        UserPassword:this.Register.Password,
                    })
                    .then(response => {
                        var data=response.data;
                        console.log(data) ;
                        if(data.Status==="OK"){
                            this.ShowForm=false;
                            this.InfoLogin.UserEmail=this.Register.UserEmail;
                        }
                    })
            }
        }

    }
</script>

<style scoped>

</style>
