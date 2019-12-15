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
                       <div class="field-form">
                           <button class="btn btn-success c-save" value="ذخیره" style="margin-top:20px">
                             ذخیره
                           </button>
                       </div>

                   </div>
                    <div  v-else-if="Link==='order'" class="Order"><!--:fields="UserFields"-->
                        <b-table striped hover :items="Orders" :fields="OrderFields">
                            <template v-slot:cell(id)="data">
                                {{ data.index + 1 }}
                            </template>
                            <template v-slot:cell(More)="data">
                                <button class="btn btn-info" @click="GetUser(data.item.id)">اطلاعات بیشتر</button>
                            </template>
                        </b-table>
                    </div>
                    <div v-show="Link==='Address'" class="Address">
                        <b-table striped hover :items="Addresses" :fields="AddressFields">
                            <template v-slot:cell(id)="data">
                                {{ data.index + 1 }}
                            </template>
                            <template v-slot:cell(State)="data">
                                <span>{{data.item.State.StateName}}</span>
                            </template>
                            <template v-slot:cell(City)="data">
                                <span>{{data.item.City.CityName}}</span>
                            </template>
                        </b-table>
                        <button class="btn btn-info" @click="AddLocation">افزودن آدرس</button>
                     </div>

                                <!--<div id = "map" style = "width:100%; height:400px;"></div>-->






       </div>
       </div>
       </div>
       <b-modal id="AddAddress" hide-footer>
           <template v-slot:modal-title>
               <h3 class="card-title c-title">افزودن محتوا</h3>
           </template>
           <div class="field-form">
               <span class="required" v-show="true">*</span>
               <span class="Name" >نام آدرس</span>
               <br>
               <br>
               <div class="main" v-if="true">
                   <input  class="c-text" type="text" v-model="Info.AddressName" placeholder="مثلا محل کار">
               </div>
               <div class="main" v-else>
                   <input  class="c-text valid-text" v-model="Info.AddressName"    type="text" >
                   <font-awesome-icon class="icon"  icon="check-circle"   />
               </div>
           </div>
           <div class="field-form">
               <span class="required" v-show="true">*</span>
               <span class="Name" >استان</span>
               <br>
               <br>

               <div class="main" v-if="true">
                   <select name="State" class="c-text" v-model="Info.StateID">
                       <option v-for="State in States" v-bind:value="State.StateID">{{State.StateName}}</option>
                   </select>
               </div>
               <div class="main" v-else>
                   <input  class="c-text valid-text" v-model="User.UserName"    type="text" >
                   <font-awesome-icon class="icon"  icon="check-circle"   />
               </div>
           </div>
           <div class="field-form">
               <span class="required" v-show="true">*</span>
               <span class="Name" >شهر</span>
               <br>
               <br>
               <div class="main" v-if="true">
                   <select name="Cities" class="c-text" v-model="Info.CityID">
                       <option v-for="City in Cities" v-bind:value="City.CityID">{{City.CityName}}</option>
                   </select>
               </div>
               <div class="main" v-else>
                   <input  class="c-text valid-text"     type="text" >
                   <font-awesome-icon class="icon"  icon="check-circle"   />
               </div>
           </div>
           <div class="field-form">
               <span class="required" v-show="true">*</span>
               <span class="Name" >خیابان</span>
               <br>
               <br><!--v-show="User.UserName.length()<3"-->

               <div class="main" v-if="true">
                   <input  class="c-text" type="text" v-model="Info.Street"  >
               </div>
               <div class="main" v-else>
                   <input  class="c-text valid-text" v-model="Info.Street"    type="text" >
                   <font-awesome-icon class="icon"  icon="check-circle"   />
               </div>
           </div>
           <div class="field-form">
               <span class="required" v-show="true">*</span>
               <span class="Name" >کوچه</span>
               <br>
               <br><!--v-show="User.UserName.length()<3"-->

               <div class="main" v-if="true">
                   <input  class="c-text" type="text" v-model="Info.Alley"  >
               </div>
               <div class="main" v-else>
                   <input  class="c-text valid-text" v-model="Info.Alley"    type="text" >
                   <font-awesome-icon class="icon"  icon="check-circle"   />
               </div>
           </div>
           <div class="field-form">
               <span class="required" v-show="true">*</span>
               <span class="Name" >پلاک</span>
               <br>
               <br><!--v-show="User.UserName.length()<3"-->

               <div class="main" v-if="true">
                   <input  class="c-text" type="text" v-model="Info.Plaque"  >
               </div>
               <div class="main" v-else>
                   <input  class="c-text valid-text" v-model="Info.Plaque"    type="text" >
                   <font-awesome-icon class="icon"  icon="check-circle"   />
               </div>
           </div>
           <!--<div class="field-form">
               <span class="required" v-show="true">*</span>
               <span class="Name" >کدپستی</span>
               <br>
               <br>&lt;!&ndash;v-show="User.UserName.length()<3"&ndash;&gt;

               <div class="main" v-if="true">
                   <input  class="c-text" type="text" v-model="User.UserName"  >
               </div>
               <div class="main" v-else>
                   <input  class="c-text valid-text" v-model="User.UserName"    type="text" >
                   <font-awesome-icon class="icon"  icon="check-circle"   />
               </div>
           </div>-->
           <button class="btn btn-success"  @click="AddAddress">ذخیره</button>
           <button class="btn btn-danger">انصراف</button>
       </b-modal>
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
            UrlGetState:{
                type: String,
                required: true,
            },
            UrlAddress:{
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
                    {Name:"آدرس های من",icon:"map-marker-alt",link:"Address"},
                    {Name:"تخفیف های من",icon:"barcode",link:"#"},
                ],
                User:{
                    UserName:"",
                    UserEmail:"",
                },
                Addresses:[],
                States:[],
                Cities:[],
                Orders:[],
                OrderFields:[
                    { key: 'id', label: 'ردیف' },
                    { key: 'OrderID', label: 'کد سفارش' },
                    { key: 'Date', label: 'تاریخ' },
                    { key: 'DatePay', label: 'تاریخ پرداخت' },
                ],
                AddressFields:[
                    { key: 'id', label: 'ردیف' },
                    { key: 'AddressName', label: 'عنوان آدرس' },
                    { key: 'State', label: 'استان' },
                    { key: 'City', label: 'شهر' },
                    { key: 'Street', label: 'خیابان' },
                    { key: 'Alley', label: 'کوچه' },
                    { key: 'Plaque', label: 'پلاک' },
                ],
                Info:{}
            };
        },
        mounted() {
            this.GetState();
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
            GetState(){
                this.Loading=true;
                axios
                    .get(this.UrlGetState)
                    .then(response => {
                        console.log(response.data) ;
                        this.States=response.data;
                        this.Cities=this.States[0].City;
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
                else if(Link==='Address'){
                    this.GetAddresses();
                }
            },
            InitMap(){
                var map = L.map('map').setView([35.70163, 51.39211], 12);
                L.tileLayer('https://developers.parsijoo.ir/web-service/v1/map/?type=tile&x={x}&y={y}&z={z}&apikey=627973149c2041b184e31259821d1306', {
                    maxZoom: 21,
                }).addTo(map);
            },
            AddLocation(){
                this.$bvModal.show('AddAddress');
                this.InitMap();
            },
            AddAddress(){
                this.Loading=true;
                axios
                    .post(this.UrlAddress,{
                        AddressName:this.Info.AddressName,
                        StateID:this.Info.StateID,
                        CityID:this.Info.CityID,
                        Street:this.Info.Street,
                        Alley:this.Info.Alley,
                        Plaque:this.Info.Plaque,
                        UserID:this.Index,
                    })
                    .then(response => {
                        console.log(response.data) ;
                    }).finally(()=>{
                    this.Loading=false;
                });
            },
            GetAddresses(){
                this.Loading=true;
                axios
                    .get(this.UrlAddress+"/"+this.Index)
                    .then(response => {
                        console.log(response.data) ;
                        this.Addresses=response.data;
                    }).finally(()=>{
                    this.Loading=false;
                });
            },

        }
    }
</script>

<style scoped>

</style>
