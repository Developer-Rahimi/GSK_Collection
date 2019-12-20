<template>
    <div>
        <div id="Content" v-if="!Loading">


        <img class="show" v-if="Content.Images.length>0" v-bind:src="'http://gsk.whereapp.ir/Appdata/Images/'+Content.Images[0].ImageUrl" alt="">
        <div class="gallery" v-if="Content.Images.length>0">
            <img v-for="image in Content.Images" v-bind:src="'http://gsk.whereapp.ir/Appdata/Images/'+image.ImageUrl" alt="">

        </div>
        <div class="info">
            <h3 class="title" v-text="Content.ContentName"></h3>
            <span v-if="Content.Product" class="price" v-text="'قیمت:'+Content.Product.ProductPrice+' تومان'"></span>
            <br>
            <br>
            <br>
            <span v-if="Content.Product.Stores.length!==0 & Content.Product.Stores.Quantity!==0" class="price" v-text="'تعداد موجود: '+Content.Product.Stores[0].Quantity +' '"></span>
            <span v-else class="price" >نا موجود</span>
            <br><br>
            <span v-if="Content.Product.Stores.length!==0 & Content.Product.Stores.Quantity!==0" class="add_to_cart"   v-b-modal.Quantity><font-awesome-icon  icon="cart-plus" />افزودن به سبد خرید</span>
            <!--v-if="Content.Product.Stores.length!==0 & Content.Product.Stores.Quantity!==0"-->
            <p v-for="Introduction in Content.Introductions" class="Desc" v-text="Introduction.IntroductionDesc"></p>
            <br><br><br><br>

            <b-tabs
                active-nav-item-class="font-weight-bold text-uppercase text-danger"
                active-tab-class="font-weight-bold text-success"
                content-class="mt-3 c-tabs"
                class="c-tabs"
            >
                <b-tab  title="مشخصات فنی" active>
                    <ul class="c-list">
                        <li class="c-list-item" v-for="Specification in Content.Specifications">
                            <h3 class="label">{{Specification.SpecificationName}}</h3>
                            <b-table striped hover :fields="subSpecificationsfields" :items="Specification.SubSpecifications"></b-table>
                        </li>
                    </ul>
                </b-tab>
                <b-tab  v-bind:title="'نظرات('+Content.Comments.length+')'">
                    <div id="Comment">
                        <ul class="c-list">
                            <li class="c-list-item" v-for="Comment in Content.Comments">
                                <div class="avatar">
                                    <img src=" ../../icon/default.png" v-bind:alt="Comment.UserName" v-bind:title="Comment.UserName">
                                </div>
                                <div class="body">
                                    <span class="UserName" v-text="Comment.User.UserName"></span>
                                    <span class="Date" v-text="Comment.CommentCreateAt"></span>
                                    <p class="Text" v-text="Comment.CommentDesc"></p>
                                </div>
                            </li>
                        </ul>
                        <div class="card">
                            <div>
                                <h3 class="label">افزودن نظر</h3>
                            </div>
                            <div class="card-body">
                                <textarea v-model="info.CommentDesc" class="text"></textarea>
                            </div>
                            <div >
                                <input type="button" class="btn btn-primary btn_custom" @click="SendComment" value="ارسال نظر">
                            </div>
                        </div>



                    </div>
                </b-tab>
                <b-tab  title="برچسب ها" >

                    <div id="Tag">
                        <a class="item" href="#" v-for="Tag in Content.Tags"><font-awesome-icon  icon="tag" /><span  v-text="Tag.TagName+' '"></span></a>

                    </div>
                </b-tab>
            </b-tabs>


        </div>
        <b-modal id="Quantity" hide-footer hide-header centered title="افزودن به سبد خرید">
            <div id="Qua">
                <p>لطفا تعداد را وارد نمایید:</p>
                <span class="required" v-show="true">*</span>
                <span class="Name" v-text="'تعداد:'"></span>
                <br>
                <br>
                <div class="main" v-show="true" >
                    <input  class="c-text" type="number" v-model="Quantity"  >
                </div>
                <div style="float:right;width:100%;height:auto;margin-top:30px">
                    <button class="btn btn-info" @click="SendCart()">افزودن</button>
                </div>
            </div>
        </b-modal>
        </div>
        {{Content}}
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
        name: "ShowContent",
        props: {
            UrlGetContent: {
                type: String,
                required: true,
            },
            UrlSendComment: {
                type: String,
                required: true,
            },
            UrlSendCart: {
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
                Content:{
                    Comments:[],
                    Tags:[],
                    Specifications:[],
                    subSpecifications:[],
                    Products:[],
                    Images:[],
                },
                info:{},
                Loading:false,
                subSpecificationsfields: [
                    {
                        key: 'SubSpecificationName',
                        label:"عنوان"
                    },
                    {
                        key: 'SubSpecificationDesc',
                        label:"توضیحات"
                    }
                ],
                Quantity:1,

            }
        },
        mounted() {
            this.GetContent(this.Index);
        },
        methods:{

            GetContent(id){
                this.Loading=true;
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
            SendComment(){
                axios
                    .post(this.UrlSendComment,{
                        UserID:1,
                        ContentID:this.Index,
                        CommentSubject:"",
                        CommentDesc:this.info.CommentDesc
                    })
                    .then(response => {
                        var data=response.data;
                        console.log(data) ;
                        this.info.CommentDesc="";
                    })
            },
            SendCart(){
                axios
                    .post(this.UrlSendCart,{
                        ProductID:this.Content.Product.ProductID,
                        Quantity:this.Quantity
                    })
                    .then(response => {
                        var data=response.data;
                        console.log(data) ;
                        this.$bvModal.hide('Quantity');
                    });
            }
        }
    }
</script>
<style scoped>

</style>
