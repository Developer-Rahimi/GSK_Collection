<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
    <div class="container">
    <div id="Content" v-show="!Loading &!ShowContent">
        <div class="card">
            <div class="card-header">
                <h3>محتوای سایت</h3>
                <div>
                    <button class="btn btn-info" @click="$bvModal.show('AddContent')">افزودن محتوا</button>
                </div>
            </div>
            <div class="card-body">
                <b-table
                    ref="selectableTable"
                    selectable
                    :select-mode="'single'"
                    selected-variant="active"
                    striped hover :items="Contents" :fields="ContentFields" @row-selected="onRowSelected">
                    <template v-slot:cell(ContentID)="data">
                        {{ data.index + 1 }}
                    </template>
                    <template v-slot:cell(ContentStatus)="data">
                        {{ data.item.ContentStatus.ContentStateTitle }}
                    </template>
                </b-table>

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
    <div id="ShowContent" v-show="!Loading&ShowContent">
        <div class="card">
            <div class="card-header">
                <h3>محصول انتخاب شده</h3>
            </div>
            <div class="card-body">
                <div class="card-header">
                    <h3>مشخصات محتوا</h3>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <th>عنوان</th>
                            <th>توضیحات</th>
                        </tr>
                        <tr><!--v-if="Content.Products[0]"-->
                            <td >نام محتوا</td>
                            <td v-if="Content">{{Content.ContentName}}</td>
                        </tr>
                        <tr><!--v-if="Content.Products[0]"-->
                            <td >وضعیت </td>
                            <td v-if="Content"><div v-if="Content.ContentStatus">{{Content.ContentStatus.ContentStateTitle}}</div></td>
                        </tr>
                        <tr><!--v-if="Content.Products[0]"-->
                            <td >نوع </td>
                            <td v-if="Content"><div v-if="Content.ContentType">{{Content.ContentType.TypeName}}</div></td>
                        </tr>
                        <tr><!--v-if="Content.Products[0]"-->
                            <td >تاریخ ایجاد</td>
                            <td v-if="Content">{{Content.ContentCreateAt}}</td>
                        </tr>
                    </table>
                </div>
                <div class="card-header">
                    <h3>تصاویر</h3>
                    <span  @click="$bvModal.show('AddImage')">افزودن تصویر</span>
                    <b-table v-if="Content.Images" striped hover :items="Content.Images" :fields="ImageFields" @row-selected="onRowSelected">
                        <template v-slot:cell(id)="data">
                            {{ data.index + 1 }}
                        </template>
                       <!-- <template v-slot:cell(ContentStatus)="data">
                            {{ data.item.ContentStatus.ContentStateTitle }}
                        </template>-->
                    </b-table>
                    <p v-else>چیزی برای نمایش وجود ندارد</p>
                </div>
                <div class="card-body">

                </div>
                <div class="card-header">
                    <h3>مشخصات محصول</h3>
                    <span  @click="$bvModal.show('AddProduct')">افزودن محصول</span>
                    <table v-if="Content.Products">
                        <tr>
                            <th>عنوان</th>
                            <th>توضیحات</th>
                        </tr>
                        <tr><!--v-if="Content.Products[0]"-->
                            <td >قیمت محصول</td>
                            <td v-if="Content.Products"><div v-if="Content.Products[0]">{{Content.Products[0].ProductPrice}}</div></td>
                        </tr>
                    </table>
                    <p v-else>چیزی برای نمایش وجود ندارد</p>
                </div>
                <div class="card-body">

                </div>
                <div class="card-header">
                    <h3>ویژگی ها</h3>
                    <span  @click="$bvModal.show('AddSpecifications')" >افزودن ویژگی</span>
                    <ul v-if="Content.Specifications">
                        <li v-for="Specification in Content.Specifications">
                            <h4>{{Specification.SpecificationName}}</h4>
                            <b-table striped hover :items="Specification.SubSpecifications" :fields="SubSpecificationFields">
                                <template v-slot:cell(SubSpecificationID)="data">
                                    {{ data.index + 1 }}
                                </template>
                                <!-- <template v-slot:cell(ContentStatus)="data">
                                     {{ data.item.ContentStatus.ContentStateTitle }}
                                 </template>-->
                            </b-table>
                        </li>
                    </ul>
                    <p v-else>چیزی برای نمایش وجود ندارد</p>
                </div>
                <div class="card-body">

                </div>

                <div class="card-header">
                    <h3>برچسب ها</h3>
                    <span  @click="$bvModal.show('AddTag')">افزودن برچسب</span>
                </div>
                <div class="card-body">
                    <a v-if="Content.Tags" v-for="Tag in Content.Tags" href="#">{{Tag.TagName}}</a>
                    <p v-else>چیزی برای نمایش وجود ندارد</p>
                </div>
        </div>
            </div>
        </div>


        <b-modal id="AddContent" hide-footer>
            <template v-slot:modal-title>
                <h3>افزودن محتوا</h3>
            </template>
            <div class="d-block text-center">
                <h3>Hello From This Modal!</h3>
            </div>
            <button class="btn btn-success"  @click="$bvModal.hide('AddContent')">ذخیره</button>
            <button class="btn btn-danger"  @click="$bvModal.hide('AddContent')">انصراف</button>
        </b-modal>
        <b-modal id="AddImage" hide-footer>
            <template v-slot:modal-title>
                <h3>افزودن تصویر</h3>
            </template>
            <div class="d-block text-center">
                <h3>Hello From This Modal!</h3>
            </div>
            <button class="btn btn-success"  @click="$bvModal.hide('AddImage')">ذخیره</button>
            <button class="btn btn-danger"  @click="$bvModal.hide('AddImage')">انصراف</button>
        </b-modal>
        <b-modal id="AddProduct" hide-footer>
            <template v-slot:modal-title>
                <h3>افزودن محصول</h3>
            </template>
            <div class="c-body">
                <div class="field-form">
                    <span class="required" v-show="true">*</span>
                    <span class="Name" >قیمت محصول</span>
                    <br>
                    <br><!--v-show="User.UserName.length()<3"-->

                    <div class="main" v-if="true">
                        <input  class="c-text" type="text"  >
                    </div>
                    <div class="main" v-else>
                        <input  class="c-text valid-text"     type="text" >
                        <font-awesome-icon class="icon"  icon="check-circle"   />
                    </div>
                </div>
            </div>
            <button class="btn btn-success"  @click="$bvModal.hide('AddProduct')">ذخیره</button>
            <button class="btn btn-danger"  @click="$bvModal.hide('AddProduct')">انصراف</button>
        </b-modal>
        <b-modal id="AddSpecifications" hide-footer>
            <template v-slot:modal-title>
                <h3>افزودن ویژگی</h3>
            </template>
            <div class="c-body">
                <div class="field-form">
                    <span class="required" v-show="true">*</span>
                    <span class="Name" >ویژگی</span>
                    <br>
                    <br><!--v-show="User.UserName.length()<3"-->

                    <div class="main" v-if="true">
                        <input  class="c-text" type="text"  >
                    </div>
                    <div class="main" v-else>
                        <input  class="c-text valid-text"     type="text" >
                        <font-awesome-icon class="icon"  icon="check-circle"   />
                    </div>
                </div>
            </div>
            <button class="btn btn-success"  @click="$bvModal.hide('AddSpecifications')">ذخیره</button>
            <button class="btn btn-danger"  @click="$bvModal.hide('AddSpecifications')">انصراف</button>
        </b-modal>
        <b-modal id="AddSubSpecifications" hide-footer>
            <template v-slot:modal-title>
                <h3>xافزودن  ویژگی</h3>
            </template>
            <div class="d-block text-center">
                <h3>Hello From This Modal!</h3>
            </div>
            <button class="btn btn-success"  @click="$bvModal.hide('AddSubSpecifications')">ذخیره</button>
            <button class="btn btn-danger"  @click="$bvModal.hide('AddSubSpecifications')">انصراف</button>
        </b-modal>
        <b-modal id="AddTag" hide-footer>
            <template v-slot:modal-title>
                <h3>افزودن برچسب</h3>
            </template>
            <div class="c-body">
                <div class="field-form">
                    <span class="required" v-show="true">*</span>
                    <span class="Name" >برچسب</span>
                    <br>
                    <br><!--v-show="User.UserName.length()<3"-->

                    <div class="main" v-if="true">
                        <input  class="c-text" type="text" v-model="Info.TagName" >
                    </div>
                    <div class="main" v-else>
                        <input  class="c-text valid-text"  v-model="Info.TagName"    type="text" >
                        <font-awesome-icon class="icon"  icon="check-circle"   />
                    </div>
                </div>
            </div>
            <button class="btn btn-success"  @click="SendTag">ذخیره</button>
            <button class="btn btn-danger"  @click="$bvModal.hide('AddTag')">انصراف</button>
        </b-modal>
    </div>
</template>

<script>
    export default {
        name: "Contents",
        props:{
            UrlGetContent: {
                type: String,
                required: true,
            },
            UrlSendTag: {
                type: String,
                required: true,
            },
        },
        data(){
            return {
                Contents:[],
                Content:{},
                Loading:false,
                ShowContent:false,
                ID:null,
                ContentFields:[
                    { key: 'ContentID', label: 'ردیف' },
                    { key: 'ContentName', label: 'نام محتوا' },
                    { key: 'ContentStatus', label: 'وضعیت انتشار' },
                   /* { key: 'Quntity', label: 'تعداد' },
                    { key: 'Total', label: 'جمع(تومان)' },*/
                ],
                ImageFields:[
                    { key: 'id', label: 'ردیف' },
                    { key: 'ImageUrl', label: 'نام عکس' },
                ],
                SubSpecificationFields:[
                    { key: 'SubSpecificationID', label: 'ردیف' },
                    { key: 'SubSpecificationName', label: 'نام ' },
                    { key: 'SubSpecificationDesc', label: 'توضیحات ' },
                ],
                Info:{},
            }
        },
        mounted() {
            this.GetContents();
        },
        methods:{
            GetContents(){
                this.Loading=true;
                axios
                    .get(this.UrlGetContent)
                    .then(response => {
                        var data=response.data;
                        console.log(data) ;
                        this.Contents=data;
                    }).finally(()=>{
                    this.Loading=false;
                });
            },
            onRowSelected(items) {
                this.Loading=true;
                this.ShowContent=true;
                console.log(items[0].ContentID);
                this.ID=items[0].ContentID;
                axios
                    .get(this.UrlGetContent+'/'+items[0].ContentID)
                    .then(response => {
                        var data=response.data;
                        console.log(data) ;
                        this.Content=data;
                    }).finally(()=>{
                    this.Loading=false;
                });
            },
            SendTag(){
                this.Loading=true;
                axios
                    .post(this.UrlSendTag,{
                        ContentID:this.Content.ContentID,
                        TagName:this.Info.TagName,

                    })
                    .then(response => {
                        var data=response.data;
                        console.log(data);
                        if(data.Status==='OK'){
                            this.shCnt(this.ID);
                        }
                    }).finally(()=>{
                    this.Loading=false;
                });
            },
            SendSpecification(){
                this.Loading=true;
                axios
                    .post(this.UrlSendTag,{
                        ContentID:this.Content.ContentID,
                        TagName:this.Info.TagName,

                    })
                    .then(response => {
                        var data=response.data;
                        console.log(data);
                        if(data.Status==='OK'){
                            this.shCnt(this.ID);
                        }
                    }).finally(()=>{
                    this.Loading=false;
                });
            },
            shCnt(id) {
                this.Loading=true;
                this.ShowContent=true;
                axios
                    .get(this.UrlGetContent+'/'+id)
                    .then(response => {
                        var data=response.data;
                        console.log(data) ;
                        this.Content=data;
                    }).finally(()=>{
                    this.Loading=false;
                });
            },
        }
    }
</script>

<style scoped>

</style>
