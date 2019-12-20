<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>سبد خرید</h3>
            </div>
            <div class="card-body">
        <div id="Cart"  v-if="Carts.length">
            <h2 class="title">سبد خريد</h2>
            <h3 class="head" v-text="'محتويات سبد خريد شما:  '+Carts.length +' محصول'"></h3>
            <b-table :items="Carts" :fields="CartFields" class="table" style="direction: rtl">
                <template v-slot:cell(CartID)="data">
                    {{ data.index + 1 }}
                </template>
                <template v-slot:cell(ContentName)="data">
                    <!--{{ data.item.Product.ProductName}}-->
                    {{ data.item.Product.ProductName}}
                </template>
                <template v-slot:cell(ProductPrice)="data">
                    <span v-if="data.item.Product"> {{ data.item.Product.ProductPrice}}</span>

                </template>
                <template v-slot:cell(Quntity)="data">
                    {{ data.item.Quantity}}
                </template>
                <template v-slot:cell(Total)="data">
                    <span v-if="data.item.Product"> {{ data.item.Product.ProductPrice * data.item.Quantity }}</span>
                </template>
            </b-table>
            <div class="info">
                <table>
                    <tr>
                        <td class="label">جمع محصولات:</td>
                        <td>{{Tot}}</td>
                    </tr>
                    <tr>
                        <td class="label">هزینه بسته بندی و ارسال:</td>
                        <td>{{post}}</td>
                    </tr>
                    <tr>
                        <td class="label">مجموع:</td>
                        <td>{{Total}}</td>
                    </tr>
                    <tr >
                        <td class="label">آدرس:</td>
                        <td>
                            <div v-for="Address in Addresses" >

                                <input id="add" type="radio"  name="gender" v-bind:value="Address.AddressID" >
                                <label for="add" v-text="Address.AddressName"></label><br>
                            </div>


                        </td>
                    </tr>
                    <tr>
                        <td class="label"></td>
                        <td><button class="btn btn-primary c-btn" @click="SendPay()"><font-awesome-icon  icon="money-bill-alt" /><span>پرداخت</span></button></td>
                    </tr>
                </table>
            </div>
        </div>
        <div v-else v-show="!Loading">
            <center>
                <!--<img src=" ../../icon/basket.png" alt="">-->
                <font-awesome-icon  icon="shopping-cart" style="font-size: 50px"/>
                <br><br>
                <h3>سبد خرید شما خالی است</h3>
            </center>

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
        </div>
    </div>
</template>

<script>
    export default {
        name: "Cart",
        props: {
            User: {
                type: String,
                required: true,
            },
            UrlGetAddress: {
                type: String,
                required: true,
            },
            UrlGetCart: {
                type: String,
                required: true,
            },
            UrlSendPay: {
                type: String,
                required: true,
            },
        },
        data(){
            return{
                Carts:[],
                CartFields:[
                    { key: 'CartID', label: 'ردیف' },
                    { key: 'ContentName', label: 'نام کالا' },
                    { key: 'ProductPrice', label: 'قیمت(تومان)' },
                    { key: 'Quntity', label: 'تعداد' },
                    { key: 'Total', label: 'جمع(تومان)' },
                ],
                UserInfo:{},
                Addresses:[],
                Tot:null,
                Total:null,
                Loading:false,
                PayOrder:0,
                post:12500
            }
        },
        mounted() {
            this.UserInfo=JSON.parse(this.User);
            this.GetCart();
            this.GetAddress();
        },
        methods:{
            GetCart(){
                this.Loading=true;
                axios
                    .get(this.UrlGetCart+"/"+this.UserInfo.id)
                    .then(response => {
                        var data=response.data;
                        if(data.length>0){
                        console.log(data[0].Carts) ;
                        this.Carts=data[0].Carts;
                       this.total(data[0].Carts);
                       this.PayOrder=data[0].OrderID;
                       console.log(this.PayOrder);
                        }
                    }).finally(() => this.Loading = false);
            },
            GetAddress(){
                this.Loading=true;
                axios
                    .get(this.UrlGetAddress+"/"+this.UserInfo.id)
                    .then(response => {
                        var data=response.data;
                        this.Addresses=data;
                       console.log(data);

                    }).finally(() => this.Loading = false);
            },
            SendPay(){
                this.Loading=true;
                axios
                    .post(this.UrlSendPay,{
                        PayPrice:500,
                        PayDesc:'خرید',
                        PayEmail:"moosarahimi8@gmail.com",
                        PayPhone:'09107608438',
                        PayOrder:this.PayOrder,

                    })
                    .then(response => {
                        var data=response.data;
                        console.log(data) ;
                        window.location.replace(data);
                    }).finally(() => this.Loading = false);
            },
            total(data){
                var tot=0;
                for(var i=0;i<data.length;i++){
                    tot += (data[i].Quantity *   data[i].Product.ProductPrice);
                    console.log(data[i].Product.ProductPrice) ;
                    console.log(data[i].Quantity *   data[i].Product.ProductPrice) ;
                }
                console.log(tot) ;
                this.Tot=tot;
                this.Total=tot+this.post;
            }

        }
    }
</script>

<style scoped>

</style>
