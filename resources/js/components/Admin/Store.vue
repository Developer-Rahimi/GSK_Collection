<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
    <div>
        <div class="container">
            <div id="Store">
                <div class="Card">
                    <div class="card-header">
                        <h3 class="title">محصولات</h3>
                        <button class="btn btn-success c-btn" @click="$bvModal.show('AddStore')">افزودن به انبار</button>
                    </div>
                    <div class="card-body">
                        <b-table
                                ref="selectableTable"
                                selectable
                                :select-mode="'single'"
                                selected-variant="active"
                                :fields="StoreFields"
                                striped hover :items="Stores" >
                            <!--:fields="ContentFields" @row-selected="onRowSelected"-->
                            <template v-slot:cell(id)="data">
                                {{ data.index + 1 }}
                            </template>
                            <template v-slot:cell(ProductName)="data">
                                {{ data.item.Product.ProductName }}
                            </template>
                            <template v-slot:cell(QuantityAll)="data">
                                {{ data.item.Quantity +data.item.QuantityCell }}
                            </template>
                        </b-table>
                    </div>
                </div>
            </div>

        </div>
        <b-modal id="AddStore" hide-footer>
            <template v-slot:modal-title>
                <h3 class="card-title c-title">افزودن به انبار</h3>
            </template>
            <div class="field-form">
                <span class="required" v-show="true">*</span>
                <span class="Name" >محصول</span>
                <br>
                <br><!--v-show="User.UserName.length()<3"-->
                <div class="main">
                    <select class="c-text" v-model="Info.ProductID">
                        <option disabled value="">لطفا انتخاب کنید</option>
                        <option v-for="Product in Products" v-bind:value="Product.ProductID">{{Product.ProductName}}</option>
                    </select>
                </div>
            </div>
            <div class="field-form">
                <span class="required" v-show="true">*</span>
                <span class="Name" >تعداد</span>
                <br>
                <br><!--v-show="User.UserName.length()<3"-->

                <div class="main" v-if="true">
                    <input  class="c-text" type="number" v-model="Info.Quantity" >
                </div>
                <div class="main" v-else>
                    <input  class="c-text valid-text"     type="text" v-model="Info.Quantity">
                    <font-awesome-icon class="icon"  icon="check-circle"   />
                </div>
            </div>
            <button class="btn btn-success"  @click="AddStore()">ذخیره</button>
            <button class="btn btn-danger"  @click="$bvModal.hide('AddStore')">انصراف</button>
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
    export default {
        name: "Store",
        props:{
            UrlGetStore: {
                type: String,
                required: true,
            },
            UrlGetProduct: {
                type: String,
                required: true,
            },
        },
        data(){
            return {
                Stores:null,
                Products:null,
                Categories:null,
                Loading:false,
                Info:{
                    ProductID:''
                },
                StoreFields:[
                    { key: 'id', label: 'ردیف' },
                    { key: 'ProductName', label: 'نام محصول' },
                    { key: 'Quantity', label: 'تعداد فروش نرفته' },
                    { key: 'QuantityCell', label: 'تعداد فروش رفته' },
                    { key: 'QuantityAll', label: 'موجودی انبار' },
                ]
            }
        },
        mounted() {
            this.GetStore();
            this.GetProduct();
            console.log(this.UrlGetProduct);
        },
        methods:{
            GetStore(){
                this.Loading=true;
                axios
                    .get(this.UrlGetStore)
                    .then(response => {
                        var data=response.data;
                       this.Stores=data;
                    }).finally(() => this.Loading = false);
            },
            GetProduct(){
                this.Loading=true;
                axios
                    .get(this.UrlGetProduct)
                    .then(response => {
                        var data=response.data;
                        this.Products=data;
                    }).finally(() => this.Loading = false);
            },
            AddStore(){
                console.log(this.Info.ProductID);
                console.log();
                this.Loading=true;
                axios
                    .post(this.UrlGetStore,{
                        ProductID:this.Info.ProductID,
                        Quantity:this.Info.Quantity
                    })
                    .then(response => {
                        var data=response.data;
                        this.GetStore();
                        this.toast("محصول با موفقیت به انبار اضافه شد","success");
                        this.$bvModal.hide('AddStore');
                    }).finally(() => this.Loading = false);

            },
            toast(msg,state) {
                this.$bvToast.toast(msg, {
                    href: '#foo',
                    variant:state,
                    title: 'پیام سیستم',

                })
            }
        }
    }
</script>

<style scoped>

</style>