<template>
    <div class="container">
        <div id="Cart">
            <h2 class="title">سبد خريد</h2>
            <h3 class="head" v-text="'محتويات سبد خريد شما:  '+Carts.length +' محصول'"></h3>
            <b-table :items="Carts" :fields="CartFields">
                <template v-slot:cell(CartID)="data">
                    {{ data.index + 1 }}
                </template>
                <template v-slot:cell(ProductName)="data">
                    {{ data.item.Content.ContentName}}
                </template>
                <template v-slot:cell(ProductPrice)="data">
                    {{ data.item.Content.Product.ProductPrice}}
                </template>
                <template v-slot:cell(Total)="data">
                    {{ data.item.Content.Product.ProductPrice * data.item.Quntity }}
                </template>
            </b-table>
            <div class="info">
                <table>
                    <tr>
                        <td class="label">جمع محصولات:</td>
                        <td>125000 تومان</td>
                    </tr>
                    <tr>
                        <td class="label">هزینه بسته بندی و ارسال:</td>
                        <td>12500 تومان</td>
                    </tr>
                    <tr>
                        <td class="label">مجموع:</td>
                        <td>135000 تومان</td>
                    </tr>
                    <tr>
                        <td class="label"></td>
                        <td><button class="btn btn-primary c-btn"><font-awesome-icon  icon="money-bill-alt" /><span>پرداخت</span></button></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Cart",
        props: {
            UrlGetCart: {
                type: String,
                required: true,
            },
        },
        data(){
            return{
                Carts:[],
                CartFields:[
                    { key: 'CartID', label: 'ردیف' },
                    { key: 'ProductName', label: 'نام کالا' },
                    { key: 'ProductPrice', label: 'قیمت(تومان)' },
                    { key: 'Quntity', label: 'تعداد' },
                    { key: 'Total', label: 'جمع(تومان)' },
                ],
            }
        },
        mounted() {
            this.GetCart();
        },
        methods:{
            GetCart(){
                axios
                    .get(this.UrlGetCart)
                    .then(response => {
                        var data=response.data;
                        console.log(data) ;
                        this.Carts=data;
                    })
            }

        }
    }
</script>

<style scoped>

</style>
