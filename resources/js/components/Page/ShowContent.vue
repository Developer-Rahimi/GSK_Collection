<template>
    <div id="Content">
        <img class="show" v-bind:src="' ../../images/'+Content.Images[0].Imagename" alt="">
        <div class="gallery">
            <img v-for="image in Content.Images" v-bind:src="' ../../images/'+image.Imagename" alt="">

        </div>
        <div class="info">
            <h3 class="title" v-text="Content.ContentName"></h3>
            <span class="price" v-text="Content.ProductPrice"></span>
            <span><font-awesome-icon  icon="cart-plus" />افزودن به سبد خرید</span>
           <p class="Desc" v-text="Content.Desc"></p>

                <b-tabs
                    active-nav-item-class="font-weight-bold text-uppercase text-danger"
                    active-tab-class="font-weight-bold text-success"
                    content-class="mt-3 c-tabs"
                    class="c-tabs"
                >
                    <b-tab  title="مشخصات فنی" active>
                        <ul class="c-list">
                            <li class="c-list-item" v-for="Specification in Specifications">
                                <h3 class="label">{{Specification.SpecificationName}}</h3>
                                <b-table striped hover :fields="subSpecificationsfields" :items="Specification.subSpecifications"></b-table>
                            </li>
                        </ul>
                    </b-tab>
                    <b-tab  title="نظرات(1)">
                        <div id="Comment">
                            <ul class="c-list">
                                <li class="c-list-item" v-for="Comment in Comments">
                                    <div class="avatar">
                                        <img src=" ../../icon/default.png" v-bind:alt="Comment.UserName" v-bind:title="Comment.UserName">
                                    </div>
                                    <div class="body">
                                        <span class="UserName" v-text="Comment.UserName"></span>
                                        <span class="Date" v-text="Comment.CommentDate"></span>
                                        <p class="Text" v-text="Comment.CommentText"></p>
                                    </div>
                                </li>
                            </ul>
                            <div class="card">
                                <div>
                                    <h3 class="label">افزودن نظر</h3>
                                </div>
                                <div class="card-body">
                                    <textarea class="text"></textarea>
                                </div>
                                <div >
                                    <input type="button" class="btn btn-primary btn_custom" value="ارسال نظر">
                                </div>
                            </div>



                        </div>
                    </b-tab>
                    <b-tab  title="برچسب ها" >
                        <div id="Tag">
                            <a class="item" href="#" v-for="Tag in Tags"><font-awesome-icon  icon="tag" /><span  v-text="Tag.TagName+' '"></span></a>

                        </div>
                    </b-tab>
                </b-tabs>


        </div>

    </div>
</template>

<script>
    export default {
        name: "ShowContent",
        data(){
            return {
                Content:{
                    ContentName:"Plc 12Sa2R",ProductPrice:35000,
                    Images:[
                        {ImageID:1,Imagename:"13.jpg"},
                        {ImageID:2,Imagename:"14.jpg"},
                        {ImageID:3,Imagename:"15.jpg"},
                    ],
                    Desc:"اتریهای لیتیوم پلیمر یکی از بهترین راهها برای تامین انرژی الکتریکی و تغذیه مدارات الکتریکی است. این باتریها در مقایسه با دیگر انواع باتریها مزایای بسیاری دارند. کوچک هستند، به نسبت ولتاژ و انرژی ذخیره شده در خود ابعاد کوچکی دارند. متاسفانه شارژ بهترین باتریها هم تمام میشود و اغلب این اتفاق در بدترین زمان ممکن رخ میدهد. اگر میخواهید باتری لیتیم پلیمر با تمام شدن شارژ شما را غافلگیر نکند باید از مانیتورینگ ولتاژ باتری استفاده کنید . ویژگی ساختاری باتریهای لیتیم پلیمر بگونه ای است که ولتاژ آن تا تخلیه کامل شارژ باتری، تقریبا ثابت میماند. بنابر این تشخیص میزان شارژ باتری با استفاده از مانیتورینگ ولتاژ در روشهای معمول غیر ممکن است. اما این بورد با اتصال به باتری شما و با استفاده از الگوریتم پیچیده داخلی خود میتواند وضع نسبی شارژ باتری را مشخص نماید. همچنین یک پین اخطار روی بورد در نظر گرفته شده که با افت ولتاژ باتری در سطحی مشخص که توسط کاربر تعیین میگردد ، سطح منطقی ولتاژ Low شده و در صورت افت ولتاژ از مقدار تعیین شده اعلام آلارم مینماید. این ماژول توانایی چک کردن سطح ولتاژ تک به تک و همچنین کلی سل های باطری را به صورت جداگانه دارد . حد خطا در این ماژول در حد یک صدم ولت میباشد که بسیار عالیست . این ماژول برای کلیه باطری های لیتیوم پلیمر و لیتیوم یون و غیره قابل استفاده میباشد ."
                },
                Tags:[
                    {TagID:1,TagName:"برچسب",ContentID:1},
                    {TagID:1,TagName:"برچسب تست",ContentID:1},
                    {TagID:1,TagName:"تست",ContentID:1},
                    {TagID:1,TagName:"محصول",ContentID:1},
                    {TagID:1,TagName:"محصول تستی",ContentID:1},
                    {TagID:1,TagName:"محصول شماره یک",ContentID:1},
                    {TagID:1,TagName:"تگ",ContentID:1},
                    {TagID:1,TagName:"تست تگ",ContentID:1},
                    {TagID:1,TagName:"برچسب دوم",ContentID:1},
                    {TagID:1,TagName:"برچسب اول",ContentID:1},
                ],
                subSpecificationsfields: [
                    {
                        key: 'subSpecificationName',
                        label:"عنوان"
                    },
                    {
                        key: 'subSpecificationDesc',
                        label:"توضیحات"
                    }
                ],
                Specifications:[
                    {SpecificationID:1,SpecificationName:"فیزیکی",subSpecifications:[
                            {subSpecificationID:1,SpecificationID:1,subSpecificationName:"عرض",subSpecificationDesc:"127cm"},
                            {subSpecificationID:1,SpecificationID:1,subSpecificationName:"طول",subSpecificationDesc:"127cm"}
                        ]},
                    {SpecificationID:1,SpecificationName:"ویژگی ها",subSpecifications:[
                            {subSpecificationID:1,SpecificationID:1,subSpecificationName:"تعداد خروجی",subSpecificationDesc:"5"},
                            {subSpecificationID:1,SpecificationID:1,subSpecificationName:"تعداد خروجی",subSpecificationDesc:"10"}
                        ]}
                ],
                Comments:[
                    {CommentID:1,CommentDate:"1398-05-06",UserName:"علی قربانی",CommentText:"سلام و خسته نباشید خدمت شما" +
                            "ایا این ماژول خام هست و باید برنامه روش نصب کنیم؟\n" +
                            "و این ماژول روش کارت هست؟یا باید خریداری کنم؟"},{CommentID:1,CommentDate:"1398-05-06",UserName:"علی قربانی",CommentText:"سلام و خسته نباشید خدمت شما" +
                            "ایا این ماژول خام هست و باید برنامه روش نصب کنیم؟\n" +
                            "و این ماژول روش کارت هست؟یا باید خریداری کنم؟"},{CommentID:1,CommentDate:"1398-05-06",UserName:"علی قربانی",CommentText:"سلام و خسته نباشید خدمت شما" +
                            "ایا این ماژول خام هست و باید برنامه روش نصب کنیم؟\n" +
                            "و این ماژول روش کارت هست؟یا باید خریداری کنم؟"},{CommentID:1,CommentDate:"1398-05-06",UserName:"علی قربانی",CommentText:"سلام و خسته نباشید خدمت شما" +
                            "ایا این ماژول خام هست و باید برنامه روش نصب کنیم؟\n" +
                            "و این ماژول روش کارت هست؟یا باید خریداری کنم؟"},{CommentID:1,CommentDate:"1398-05-06",UserName:"علی قربانی",CommentText:"سلام و خسته نباشید خدمت شما" +
                            "ایا این ماژول خام هست و باید برنامه روش نصب کنیم؟\n" +
                            "و این ماژول روش کارت هست؟یا باید خریداری کنم؟"},
                ]
            }
        },
        mounted() {

        },
        methods:{

        }
    }
</script>
<style scoped>

</style>
