<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
    <div class="container">
    <div id="Content" v-show="!Loading &!ShowContent">
        <div class="card">
            <div class="card-header">
                <h3>محتوای سایت</h3>
                <div>
                    <div class="btn btn-info" style="float:left" @click="$bvModal.show('AddContent')"><span style="margin-left: 7px">افزودن محتوا  </span><font-awesome-icon icon="pen" /></div>
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
                <h3 class="card-title c-title">محصول انتخاب شده</h3>
                <div>
                    <div class="btn btn-info" style="float:left" @click="ShowContent=false"><span style="margin-left: 7px">بازگشت  </span></div>
                </div>
            </div>
            <div class="card-body">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title c-title">مشخصات محتوا</h3>
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
                </div>
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تصاویر</h3>
                    <div>
                        <div class="btn btn-info" style="float:left" @click="$bvModal.show('AddImage')"><span style="margin-left: 7px">افزودن تصویر  </span><font-awesome-icon icon="pen" /></div>
                    </div>
                </div>
                <div class="card-body">

                    <b-table v-if="Content.Images.length" striped hover :items="Content.Images" :fields="ImageFields" @row-selected="onRowSelected">
                        <template v-slot:cell(id)="data">
                            {{ data.index + 1 }}
                        </template>
                        <!-- <template v-slot:cell(ContentStatus)="data">
                             {{ data.item.ContentStatus.ContentStateTitle }}
                         </template>-->
                    </b-table>
                    <p v-else class="alert alert-warning">چیزی برای نمایش وجود ندارد</p>
                </div>
                </div>
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title c-title">مشخصات محصول</h3>
                    <div>
                        <div class="btn btn-info" style="float:left" @click="$bvModal.show('AddProduct')"><span style="margin-left: 7px">افزودن محصول  </span><font-awesome-icon icon="pen" /></div>
                    </div>
                </div>
                <div class="card-body">
                    <table v-if="Content.Products.length">
                        <tr>
                            <th>عنوان</th>
                            <th>توضیحات</th>
                        </tr>
                        <tr><!--v-if="Content.Products[0]"-->
                            <td >قیمت محصول</td>
                            <td v-if="Content.Products"><div v-if="Content.Products[0]">{{Content.Products[0].ProductPrice}}</div></td>
                        </tr>
                    </table>
                    <p v-else class="alert alert-warning">چیزی برای نمایش وجود ندارد</p>
                </div>
                </div>
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title c-title">معرفی</h3>
                    <div>
                        <div class="btn btn-info" style="float:left" @click="$bvModal.show('AddIntroduction')"><span style="margin-left: 7px">افزودن معرفی  </span><font-awesome-icon icon="pen" /></div>
                    </div>
                </div>
                <div class="card-body">
                    <ul v-if="Content.Introductions.length">
                        <li v-for="Introduction in Content.Introductions">
                            <p v-text="Introduction.IntroductionDesc"></p>
                        </li>
                    </ul>
                    <p v-show="Content.Introductions.length===0" class="alert alert-warning">چیزی برای نمایش وجود ندارد</p>
                </div>
                </div>
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title c-title">ویژگی ها</h3>
                    <div>
                        <div class="btn btn-info" style="float:left" @click="$bvModal.show('AddSpecifications')"><span style="margin-left: 7px">افزودن ویژگی  </span><font-awesome-icon icon="pen" /></div>
                    </div>
                </div>
                <div class="card-body">
                    <ul v-if="Content.Specifications.length">
                        <li v-for="Specification in Content.Specifications">
                            <div>
                                <div class="btn btn-info" style="float:left" @click="ShowAddSub(Specification.SpecificationID)"><span style="margin-left: 7px">افزودن زیر ویژگی  </span><font-awesome-icon icon="pen" /></div>
                            </div>
                            <h4>{{Specification.SpecificationName}}</h4>
                            <b-table striped hover :items="Specification.SubSpecifications" :fields="SubSpecificationFields">
                                <template v-slot:cell(SubSpecificationID)="data">
                                    {{ data.index + 1 }}
                                </template>
                            </b-table>
                        </li>
                    </ul>
                    <p v-else class="alert alert-warning">چیزی برای نمایش وجود ندارد</p>
                </div>
                </div>

                <div class="card">
                <div class="card-header">
                    <h3 class="card-title c-title">برچسب ها</h3>
                    <div>
                        <div class="btn btn-info" style="float:left" @click="$bvModal.show('AddTag')"><span style="margin-left: 7px">افزودن برچسب  </span><font-awesome-icon icon="pen" /></div>
                    </div>
                </div>
                <div class="card-body">
                    <a v-if="Content.Tags.length" v-for="Tag in Content.Tags" href="#">{{Tag.TagName}}</a>
                    <p v-show="Content.Tags.length===0" class="alert alert-warning">چیزی برای نمایش وجود ندارد</p>
                </div>
                </div>
        </div>
            </div>
        </div>



        <b-modal id="AddContent" hide-footer>
            <template v-slot:modal-title>
                <h3 class="card-title c-title">افزودن محتوا</h3>
            </template>
            <div class="field-form">
                <span class="required" v-show="true">*</span>
                <span class="Name" >نام محتوا</span>
                <br>
                <br><!--v-show="User.UserName.length()<3"-->

                <div class="main" v-if="true">
                    <input  class="c-text" type="text" v-model="Info.ContentName" >
                </div>
                <div class="main" v-else>
                    <input  class="c-text valid-text"     type="text" v-model="Info.ContentName">
                    <font-awesome-icon class="icon"  icon="check-circle"   />
                </div>
            </div>
            <button class="btn btn-success"  @click="SendContent">ذخیره</button>
            <button class="btn btn-danger"  @click="$bvModal.hide('AddContent')">انصراف</button>
        </b-modal>
        <b-modal id="AddImage" hide-footer>
            <template v-slot:modal-title>
                <h3 class="card-title c-title">افزودن تصویر</h3>
            </template>
            <div class="field-form">

            <label>File<!--v-on:change="handleFileUpload()"-->
                <input type="file" id="file" ref="file" v-on:change="handleFileUpload()" />
            </label>
            </div>
            <button class="btn btn-success"  @click="SendImage">ذخیره</button>
            <button class="btn btn-danger"  @click="$bvModal.hide('AddImage')">انصراف</button>
        </b-modal>
        <b-modal id="AddProduct" hide-footer>
            <template v-slot:modal-title>
                <h3 class="card-title c-title">افزودن محصول</h3>
            </template>
            <div class="c-body">
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
            </div>
            <button class="btn btn-success"  @click="SendProduct">ذخیره</button>
            <button class="btn btn-danger"  @click="$bvModal.hide('AddProduct')">انصراف</button>
        </b-modal>
        <b-modal id="AddSpecifications" hide-footer>
            <template v-slot:modal-title>
                <h3 class="card-title c-title">افزودن ویژگی</h3>
            </template>
            <div class="c-body">
                <div class="field-form">
                    <span class="required" v-show="true">*</span>
                    <span class="Name" >ویژگی</span>
                    <br>
                    <br><!--v-show="User.UserName.length()<3"-->

                    <div class="main" v-if="true">
                        <input  class="c-text" type="text" v-model="Info.SpecificationName" >
                    </div>
                    <div class="main" v-else>
                        <input  class="c-text valid-text"  v-model="Info.SpecificationName"    type="text" >
                        <font-awesome-icon class="icon"  icon="check-circle"   />
                    </div>
                </div>
            </div>
            <button class="btn btn-success" @click="SendSpecification" >ذخیره</button>
            <button class="btn btn-danger"  @click="$bvModal.hide('AddSpecifications')">انصراف</button>
        </b-modal>
        <b-modal id="AddSubSpecifications" hide-footer>
            <template v-slot:modal-title>
                <h3 class="card-title c-title">افزودن زیر ویژگی</h3>
            </template>
            <div class="field-form">
                <span class="required" v-show="true">*</span>
                <span class="Name" >نام</span>
                <br>
                <br><!--v-show="User.UserName.length()<3"-->

                <div class="main" v-if="true">
                    <input  class="c-text" type="text" v-model="Info.SubSpecificationName" >
                </div>
                <div class="main" v-else>
                    <input  class="c-text valid-text"  v-model="Info.SubSpecificationName"    type="text" >
                    <font-awesome-icon class="icon"  icon="check-circle"   />
                </div>
            </div>
            <div class="field-form">
                <span class="required" v-show="true">*</span>
                <span class="Name" >توضیح</span>
                <br>
                <br><!--v-show="User.UserName.length()<3"-->

                <div class="main" v-if="true">
                    <input  class="c-text" type="text" v-model="Info.SubSpecificationDesc" >
                </div>
                <div class="main" v-else>
                    <input  class="c-text valid-text"  v-model="Info.SubSpecificationDesc"    type="text" >
                    <font-awesome-icon class="icon"  icon="check-circle"   />
                </div>
            </div>
            <button class="btn btn-success"  @click="SendSubSpecification">ذخیره</button>
            <button class="btn btn-danger"  @click="$bvModal.hide('AddSubSpecifications')">انصراف</button>
        </b-modal>
        <b-modal id="AddTag" hide-footer>
            <template v-slot:modal-title>
                <h3 class="card-title c-title">افزودن برچسب</h3>
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
        <b-modal id="AddIntroduction" hide-footer>
            <template v-slot:modal-title>
                <h3 class="card-title c-title">افزودن معرفی</h3>
            </template>
            <div class="c-body">
                <div class="field-form">
                    <span class="required" v-show="true">*</span>
                    <span class="Name" >موضوع</span>
                    <br>
                    <br><!--v-show="User.UserName.length()<3"-->

                    <div class="main" v-if="true">
                        <input  class="c-text" type="text" v-model="Info.IntroductionTitle" >
                    </div>
                    <div class="main" v-else>
                        <input  class="c-text valid-text"  v-model="Info.IntroductionTitle"    type="text" >
                        <font-awesome-icon class="icon"  icon="check-circle"   />
                    </div>
                </div>
                <div class="field-form">
                    <span class="required" v-show="true">*</span>
                    <span class="Name" >متن</span>
                    <br>
                    <br><!--v-show="User.UserName.length()<3"-->

                    <div class="main" v-if="true">
                        <textarea  class="c-text" type="text" v-model="Info.IntroductionDesc" style="height: 300px" />
                    </div>
                    <div class="main" v-else>
                        <textarea  class="c-text valid-text"  v-model="Info.IntroductionDesc"  style="height: 300px"  type="text" />
                        <font-awesome-icon class="icon"  icon="check-circle"   />
                    </div>
                </div>
            </div>
            <button class="btn btn-success"  @click="SendIntroduction">ذخیره</button>
            <button class="btn btn-danger"  @click="$bvModal.hide('AddTag')">انصراف</button>
        </b-modal>
    </div>
</template>

<script>
    export default {
        name: "Contents",
        props:{
            UserInfo: {
                type: String,
                required: true,
            },
            UrlGetContent: {
                type: String,
                required: true,
            },
            UrlSendContent: {
                type: String,
                required: true,
            },
            UrlSendProduct: {
                type: String,
                required: true,
            },
            UrlSendTag: {
                type: String,
                required: true,
            },
            UrlSendSpecification: {
                type: String,
                required: true,
            },
            UrlSendSubSpecification: {
                type: String,
                required: true,
            },
            UrlSendIntroduction: {
                type: String,
                required: true,
            },
            UrlSendIamge: {
                type: String,
                required: true,
            },
        },
        data(){
            return {
                Contents:[],
                Content:{
                    Products:[],
                    Tags:[],
                    Introductions:[],
                    Specifications:[],
                    Images:[],
                },
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
                User:{},
                image: '',
                SubID: 0,
            }
        },
        mounted() {
            this.User=JSON.parse(this.UserInfo);
            console.log(this.User.id)
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
            SendContent(){
                this.Loading=true;
                axios
                    .post(this.UrlSendContent,{
                        UserID:this.User.id,
                        ContentName:this.Info.ContentName,

                    })
                    .then(response => {
                        var data=response.data;
                        console.log(data);
                        if(data.Status==='OK'){
                            this.$bvModal.hide('AddContent');
                            this.GetContents();
                        }
                    }).finally(()=>{
                    this.Loading=false;
                });
            },
            SendProduct(){
                this.Loading=true;
                axios
                    .post(this.UrlSendProduct,{
                        ContentID:this.Content.ContentID,
                        ProductPrice:this.Info.ProductPrice,

                    })
                    .then(response => {
                        var data=response.data;
                        console.log(data);
                        if(data.Status==='OK'){
                            this.shCnt(this.ID);
                            this.$bvModal.hide('AddProduct');
                        }
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
                            this.$bvModal.hide('AddTag');
                        }
                    }).finally(()=>{
                    this.Loading=false;
                });
            },
            SendSpecification(){
                this.Loading=true;
                axios
                    .post(this.UrlSendSpecification,{
                        ContentID:this.Content.ContentID,
                        SpecificationName:this.Info.SpecificationName,

                    })
                    .then(response => {
                        var data=response.data;
                        console.log(data);
                        if(data.Status==='OK'){
                            this.$bvModal.hide('AddSpecifications');
                            this.shCnt(this.ID);
                        }
                    }).finally(()=>{
                    this.Loading=false;
                });
            },
            ShowAddSub(id){
                this.$bvModal.show('AddSubSpecifications');
                this.SubID=id;
            },
            SendSubSpecification(){
                this.Loading=true;
                axios
                    .post(this.UrlSendSubSpecification,{
                        SpecificationID:this.SubID,
                        SubSpecificationName:this.Info.SubSpecificationName,
                        SubSpecificationDesc:this.Info.SubSpecificationDesc,

                    })
                    .then(response => {
                        var data=response.data;
                        console.log(data);
                        if(data.Status==='OK'){
                            this.$bvModal.hide('AddSubSpecifications');
                            this.shCnt(this.ID);
                        }
                    }).finally(()=>{
                    this.Loading=false;
                });
            },

            SendIntroduction(){
                this.Loading=true;
                axios
                    .post(this.UrlSendIntroduction,{
                        ContentID:this.Content.ContentID,
                        UserID:this.User.id,
                        IntroductionTitle:this.Info.IntroductionTitle,
                        IntroductionDesc:this.Info.IntroductionDesc,

                    })
                    .then(response => {
                        var data=response.data;
                        console.log(data);
                        if(data.Status==='OK'){
                            this.$bvModal.hide('AddIntroduction');
                            this.shCnt(this.ID);
                        }
                    }).finally(()=>{
                    this.Loading=false;
                });
            },
            handleFileUpload(){
                this.image = this.$refs.file.files[0];
            },
            SendImage(){
                var that=this;
                this.Loading=true;
                let formData = new FormData();
                formData.append('image', this.image);
                formData.append('ContentID', this.Content.ContentID);
                axios.post( that.UrlSendIamge,
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(function(){
                    console.log('SUCCESS!!');
                    that.Loading=false;
                    that.$bvModal.hide('AddImage');
                    that.shCnt(that.Content.ContentID);
                })
                    .catch(function(){
                        console.log('FAILURE!!');
                        that.Loading=false;
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
