<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
    <div>
        <div class="container">
            <div id="Products">
                <div class="Card">
                    <div class="card-header">
                            <h3 class="title">محصولات</h3>
                            <button class="btn btn-success c-btn" @click="$bvModal.show('AddProduct')">افزودن محصول</button>
                    </div>
                    <div class="card-body">
                        <b-table
                                ref="selectableTable"
                                selectable
                                :select-mode="'single'"
                                selected-variant="active"
                                :fields="ProductFields"
                                striped hover :items="Products" >
                            <!--:fields="ContentFields" @row-selected="onRowSelected"-->
                            <template v-slot:cell(id)="data">
                                {{ data.index + 1 }}
                            </template>
                            <!--<template v-slot:cell(ProductName)="data">
                                {{ data.item.Product.ProductName }}
                            </template>-->
                            <template v-slot:cell(Category)="data">
                                {{ data.item.Category.CategoryName }}
                            </template>
                        </b-table>
                    </div>
                </div>
            </div>

        </div>
        <b-modal id="AddProduct" hide-footer>
            <template v-slot:modal-title>
                <h3 class="card-title c-title">افزودن محصول</h3>
            </template>
            <div class="field-form">
                <span class="required" v-show="true">*</span>
                <span class="Name" >نام محصول</span>
                <br>
                <br><!--v-show="User.UserName.length()<3"-->

                <div class="main" v-if="true">
                    <input  class="c-text" type="text" v-model="Info.ProductName" >
                </div>
                <div class="main" v-else>
                    <input  class="c-text valid-text"     type="text" v-model="Info.ProductName">
                    <font-awesome-icon class="icon"  icon="check-circle"   />
                </div>
            </div>
            <div class="field-form">
                <span class="required" v-show="true">*</span>
                <span class="Name" >قیمت محصول</span>
                <br>
                <br><!--v-show="User.UserName.length()<3"-->

                <div class="main" v-if="true">
                    <input  class="c-text" type="text" v-model="Info.ProductPrice" >
                </div>
                <div class="main" v-else>
                    <input  class="c-text valid-text"     type="text" v-model="Info.ProductPrice">
                    <font-awesome-icon class="icon"  icon="check-circle"   />
                </div>
            </div>
            <div class="field-form">
                <span class="required" v-show="true">*</span>
                <span class="Name" >دسته بندی</span>
                <br>
                <br><!--v-show="User.UserName.length()<3"-->
                <div class="main" v-if="true">
                    <select class="c-text" v-model="Info.CategoryID">
                        <option v-for="Category in Categories" v-bind:value="Category.CategoryID">{{Category.CategoryName}}</option>
                    </select>
                </div>
                <div class="main" v-else>
                    <input  class="c-text valid-text" type="text" >
                    <font-awesome-icon class="icon"  icon="check-circle"   />
                </div>
            </div>
            <button class="btn btn-success"  @click="SendProduct()">ذخیره</button>
            <button class="btn btn-danger"  @click="$bvModal.hide('AddProduct')">انصراف</button>
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
        name: "Product",
        props:{
            UrlGetProduct: {
                type: String,
                required: true,
            },
            UrlSendProduct: {
                type: String,
                required: true,
            },
            UrlGetCategory: {
                type: String,
                required: true,
            },
        },
        data(){
            return {
                Products:null,
                Categories:null,
                Loading:false,
                Info:{},
                ProductFields:[
                    { key: 'id', label: 'ردیف' },
                    { key: 'ProductName', label: 'نام محصول' },
                    { key: 'ProductPrice', label: 'قیمت محصول' },
                    { key: 'Category', label: 'نام دسته بندی' },
                ]
            }
        },
        mounted() {
            this.GetProduct();
            this.GetCategory();
            console.log(this.UrlGetProduct);
        },
        methods:{
            GetProduct(){
                this.Loading=true;
                axios
                    .get(this.UrlGetProduct)
                    .then(response => {
                        var data=response.data;
                        this.Products=data;
                    }).finally(() => this.Loading = false);
            },
            GetCategory(){
                this.Loading=true;
                axios
                    .get(this.UrlGetCategory)
                    .then(response => {
                        var data=response.data;
                        this.Categories=data;
                    }).finally(() => this.Loading = false);
            },
            SendProduct(){
                this.Loading=true;
                axios
                    .post(this.UrlSendProduct,{
                        ProductName:this.Info.ProductName,
                        ProductPrice:this.Info.ProductPrice,
                        CategoryID:this.Info.CategoryID,
                    })
                    .then(response => {
                        var data=response.data;
                        this.$bvModal.hide('AddProduct');
                        this.GetProduct();
                    }).finally(() => this.Loading = false);
            }
        }
    }
</script>

<style scoped>

</style>