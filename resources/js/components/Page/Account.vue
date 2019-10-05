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
                           <font-awesome-icon class="icon" style="font-size: 50px;color:#4d90fe"  v-bind:icon="Item.icon" />
                           <span class="name" v-text="Item.Name"></span>
                       </li>
                   </ul>
                   <div class="User">
                       <span style="color:red">اطلاعات شخصی شما</span>
                       <br>
                       <span>اگر اطلاعات شخصی شما تغییر کرد، آن‌ها را در اسرع وقت بروز کنید.</span>
                       <div class="field-form">
                           <span class="label">عنوان اجتماعی </span>
                           <br>
                           <div>
                               <input type="radio">
                               <span>آقا</span>
                               <input type="radio">
                               <span>خانم</span>
                           </div>

                       </div>
                       <div class="field-form">
                           <EditText

                               :required="true"
                               LabelName="نام"
                               :MinLength=3
                               TypeInput="text"
                           >

                           </EditText>
                           </div>
                       <div class="field-form">
                           <EditText

                               :required="true"
                               LabelName="نام خانوادگی"
                               :MinLength=3
                               TypeInput="text"
                               >

                           </EditText>
                           </div>
                       <div class="field-form">
                           <EditText

                               :required="true"
                               LabelName="ایمیل"
                               :MinLength=3
                               TypeInput="email"
                           >

                           </EditText>
                           </div>
                       <div class="field-form">
                           <span class="required" style="color: red">*</span>
                           <span class="Name" >تاریخ تولد</span>
                           <br>
                           <select name="cars" size="1">

                           <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                               <option value="6">6</option>
                               <option value="7">7</option>
                               <option value="8">8</option>
                               <option value="9">9</option>
                               <option value="10">10</option>
                               <option value="11">11</option>
                               <option value="12">12</option>
                               <option value="13">13</option>
                               <option value="14">14</option>
                               <option value="15">15</option>
                               <option value="16">16</option>
                               <option value="17">17</option>
                               <option value="18">18</option>
                               <option value="19">19</option>
                               <option value="20">20</option>
                               <option value="21">21</option>
                               <option value="22">22</option>
                               <option value="23">23</option>
                               <option value="24">24</option>
                               <option value="25">25</option>
                               <option value="26">26</option>
                               <option value="27">27</option>
                               <option value="28">28</option>
                               <option value="29">29</option>
                               <option value="30">30</option>
                               <option value="31">31</option>
                           </select>
                           <select name="cars" size="1">
                               <option value="1">فروردین</option>
                               <option value="2">اردیبهشت</option>
                               <option value="3">خرداد</option>
                               <option value="4">تیر</option>
                               <option value="5">مرداد</option>
                               <option value="6">شهریور</option>
                               <option value="7">مهر</option>
                               <option value="8">آبان</option>
                               <option value="9">آذر</option>
                               <option value="10">دی</option>
                               <option value="11">بهمن</option>
                               <option value="12">اسفند</option>
                           </select>
                           <select name="cars" size="1">
                               <option value="1350">1350</option>
                               <option value="1351">1351</option>
                               <option value="1352">1352</option>
                               <option value="1353">1353</option>
                               <option value="1354">1354</option>
                               <option value="1355">1355</option>
                               <option value="1356">1356</option>
                               <option value="1357">1357</option>
                               <option value="1358">1358</option>
                               <option value="1359">1359</option>
                               <option value="1350">1350</option>
                               <option value="1361">1351</option>
                               <option value="1362">1352</option>
                               <option value="1363">1353</option>
                               <option value="1364">1354</option>
                               <option value="1365">1355</option>
                               <option value="1366">1356</option>
                               <option value="1367">1357</option>
                               <option value="1368">1358</option>
                               <option value="1369">1359</option>
                               <option value="1370">1350</option>
                               <option value="1371">1351</option>
                               <option value="1372">1352</option>
                               <option value="1373">1353</option>
                               <option value="1374">1354</option>
                               <option value="1375">1355</option>
                               <option value="1376">1356</option>
                               <option value="1377">1357</option>
                               <option value="1378">1358</option>
                               <option value="1379">1359</option>
                               <option value="1380">1350</option>
                               <option value="1381">1351</option>
                               <option value="1382">1352</option>
                               <option value="1383">1353</option>
                               <option value="1384">1354</option>
                               <option value="1385">1355</option>
                               <option value="1386">1356</option>
                               <option value="1387">1357</option>
                               <option value="1388">1358</option>
                               <option value="1389">1359</option>
                               <option value="1390">1350</option>
                               <option value="1391">1351</option>
                               <option value="1392">1352</option>
                               <option value="1393">1353</option>
                               <option value="1394">1354</option>
                               <option value="1395">1355</option>
                               <option value="1396">1356</option>
                               <option value="1397">1357</option>
                               <option value="1398">1358</option>
                               <!--<option value="1399">1359</option>-->

                           </select>
                       </div>
                       <div class="field-form">
                           <button class="btn btn-success c-save" value="ذخیره" style="margin-top:20px">
                             ذخیره
                           </button>
                       </div>
                       </div>
                   </div>

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
