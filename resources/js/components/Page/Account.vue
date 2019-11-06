<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
   <div class="container">
       <div id="Account" v-show="!Loading">
           <div class="card">
               <div class="card-header">
                   <h2 class="title">حساب کاربری</h2>
                   <h3 class="head">به حساب کاربری خود خوش آمدید. در اینجا میتوانید تمام اطلاعات شخصی و سفارشات خود را مدیریت نمائید.</h3>
                   <div>
                       <div class="btn btn-warning" v-if="Link!=='all'" style="float:left" @click="Link='all'"><span style="margin-left: 7px">بازگشت  </span></div>
                   </div>
               </div>
               <div class="card-body">
                    <div v-if="Link==='all' ">
                        <ul >
                            <li v-for="Item in Itemes" @click="Show(Item.link)">
                                <font-awesome-icon class="icon" style="font-size: 50px;color:#4d90fe"  v-bind:icon="Item.icon" />
                                <span class="name" v-text="Item.Name"></span>
                            </li>
                        </ul>
                    </div>
                   <div  v-else-if="Link==='MyInfo' "class="User">
                       <span style="color:red">اطلاعات شخصی شما</span>
                       <br>
                       <span>اگر اطلاعات شخصی شما تغییر کرد، آن‌ها را در اسرع وقت بروز کنید.</span>
                       <!--<div class="field-form">
                           <span class="label">عنوان اجتماعی </span>
                           <br>
                           <div>
                               <input type="radio">
                               <span>آقا</span>
                               <input type="radio">
                               <span>خانم</span>
                           </div>

                       </div>-->
                       <div class="field-form">
                           <span class="required" v-show="true">*</span>
                           <span class="Name" >نام ونام خانوادگی</span>
                           <br>
                           <br><!--v-show="User.UserName.length()<3"-->

                           <div class="main" v-if="User.UserName.length<3">
                               <input  class="c-text" type="text" v-model="User.UserName"  >
                           </div>
                           <div class="main" v-else>
                               <input  class="c-text valid-text" v-model="User.UserName"    type="text" >
                               <font-awesome-icon class="icon"  icon="check-circle"   />
                           </div>
                           </div>
                       <div class="field-form">
                           <span class="required" v-show="true">*</span>
                           <span class="Name" >ایمیل</span>
                           <br>
                           <br><!--v-show="User.UserName.length()<3"-->

                           <div class="main" v-if="User.UserEmail.length<3">
                               <input  class="c-text" type="text" v-model="User.UserEmail"  >
                           </div>
                           <div class="main" v-else>
                               <input  class="c-text valid-text" v-model="User.UserEmail"    type="text" >
                               <font-awesome-icon class="icon"  icon="check-circle"   />
                           </div>
                           </div>
                       <!--<div class="field-form">
                           <span class="required" v-show="true">*</span>
                           <span class="Name" >تاریخ تولد</span>
                           <br>
                           <br>&lt;!&ndash;v-show="User.UserName.length()<3"&ndash;&gt;

                           <date-picker v-model="User.UserDateBorn"></date-picker>
                           </div>-->

                       <div class="field-form">
                           <button class="btn btn-success c-save" value="ذخیره" style="margin-top:20px">
                             ذخیره
                           </button>
                       </div>

                   </div>
                    <div  v-else-if="Link==='order'" class="User"><!--:fields="UserFields"-->
                        <b-table striped hover :items="Orders" :fields="OrderFields">
                            <template v-slot:cell(id)="data">
                                {{ data.index + 1 }}
                            </template>
                            <template v-slot:cell(More)="data">
                                <button class="btn btn-info" @click="GetUser(data.item.id)">اطلاعات بیشتر</button>
                            </template>
                        </b-table>
                    </div>
               </div>
           </div>
       </div>
       <div v-show="Loading">
           <center>
               <div style="width: 150px">
                   <div class="loader" >

                       <div class="face">
                           <div class="circle"></div>
                       </div>
                       <div class="face">
                           <div class="circle"></div>
                       </div>
                   </div>
               </div>
           </center>


       </div>
       </div>
</template>

<script>
    import VuePersianDatetimePicker from 'vue-persian-datetime-picker'
    export default {
        name: "Account",
        components: {
            datePicker: VuePersianDatetimePicker
        },
        props:{
            UrlGetUser: {
                type: String,
                required: true,
            },
            UrlGetOrder: {
                type: String,
                required: true,
            },
            Index: {
                type: String,
                required: true,
            },

        },
        data(){
            return {
                Loading:false,
                Link:'all',
                Itemes:[
                    {Name:"اطلاعات شخصی من",icon:"user",link:"MyInfo"},
                    {Name:"محصولات مورد علاقه",icon:"heart",link:"Fav"},
                    {Name:"تاریخچه و جزییات سفارش",icon:"history",link:"order"},
                    {Name:"صورت های مالی من",icon:"money-bill-alt",link:"#"},
                    {Name:"آدرس های من",icon:"map-marker-alt",link:"#"},
                    {Name:"تخفیف های من",icon:"barcode",link:"#"},
                ],
                User:{
                    UserName:"",
                    UserEmail:"",
                },
                Orders:[],
                OrderFields:[
                    { key: 'id', label: 'ردیف' },
                    { key: 'OrderID', label: 'کد سفارش' },
                    { key: 'Date', label: 'تاریخ' },
                    { key: 'DatePay', label: 'تاریخ پرداخت' },
                ]
               /* date: '1397/02/02'*/
            };
        },
        mounted() {
        },
        methods:{
            GetInfoUser(){
                this.Loading=true;
                axios
                    .get(this.UrlGetUser+'/'+this.Index)
                    .then(response => {
                        console.log(response.data) ;
                        this.User=response.data;
                    }).finally(()=>{
                    this.Loading=false;
                });
            },
            GetOrder(){
                this.Loading=true;
                axios
                    .get(this.UrlGetOrder)
                    .then(response => {
                        console.log(response.data) ;
                        this.Orders=response.data;
                    }).finally(()=>{
                    this.Loading=false;
                });
            },
            Show(Link){
                this.Link=Link;
                if (Link==='MyInfo') {
                    this.GetInfoUser();
                }
                else if(Link==='order'){
                    this.GetOrder();
                }
            }

        }
    }
</script>

<style scoped>

</style>
