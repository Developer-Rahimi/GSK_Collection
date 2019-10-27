<template>
    <div id="Wrapper">
        <div id="Header">
            <Top :UserInfo="UserInfo"></Top>
            <img v-bind:src="Home+'/icon/logo.png'" style="float:right;width:280px;height:200px;">
            <h1 class="SiteName">گروه صنعتی کریمی</h1>
            <br>
            <h4 class="SiteBanner">پیشرو در صنعت کنترل و ابزار دقیق</h4>
            <MainMenu ></MainMenu>
        </div>
        <div id="Content">
            <SlideShow></SlideShow>
            <slot></slot>
        </div>
        <div id="Footer">
            <div class="Access">
                <h3 class="title">دسترسی سریع</h3>
                <Access></Access>
            </div>
            <div class="About">
                <h3 class="title">درباره ما</h3>
                <span>درسال 1369 فعالیت خود را در حوزه برق ،کنترل و اتوماسیون صنعتی آغاز نموده است. این فروشگاه با بیش از دو دهه حضور در صنایع کشور توانسته با بهره گیری از دانش فنی و تجربیات عملی یکی از مجموعه های فعال در کشور در این حوزه باشد.
فروشگاه تکنوکلید با فعالیت گسترده و تخصصی در  زمینه واردات اتوماسیون صنعتی و فشار ضعیف  و راه اندازی و کنترل خطوط تولید و به صورت کلید در دست و موجودی بسیار بالا و خوب انبار و به لحاظ کیفیت در حسن انجام کار و داشتن کادری فنی و مجرب و با بهرگیری از دانش فنی خود همگام با تکنولوژی روز دنیا  اقدام به واردات ...</span>
            </div>
            <div class="Contact">
                <h3 class="title">تماس با ما</h3>
            </div>
            <span class="Designer">
               Copyright© 2019 Industrial Projects Rahimi of Iran. All rights reserved.
            </span>
        </div>

    </div>
</template>

<script>
    export default {
        name: "Master",
        props:{
            Home:{
                type: String,
                required: true,
            },
            UserInfo:{
                type: String,
                required: true,
            }
        },
        data(){
            return {
                User:{}
            }
        },
        mounted() {
           // this.User=JSON.parse(this.UserInfo);
        },
        methods:{

        }
    }
</script>

<style scoped>

</style>
