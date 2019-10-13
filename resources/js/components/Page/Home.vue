<template>
    <div  id="Product">
        <span class="title">جدید ترین محصولات</span>
        <carousel class="carousel"  :navigationEnabled="true" :per-page="5">

            <slide  v-for="Content in Contents" v-bind:key="Content.ContentID">
                <a v-bind:href="'Show/Content/'+Content.ContentID" v-if="Content.Images[0]!=null">

                    <img class="card-img" v-bind:src="'http://gsk.whereapp.ir/Appdata/Images/'+Content.Images[0].ImageUrl">
                   <div class="name" ><font-awesome-icon  icon="tag" /><span v-text="Content.ContentName"></span></div>

                     <div class="price" v-if="Content.Products[0]!=null"><font-awesome-icon  icon="money-bill" /><span v-text="Content.Products[0].ProductPrice+' تومان'"></span></div>
                    <div class="btn_add_cart" ><font-awesome-icon  icon="cart-plus" /><span>افزودن به سبد خرید</span></div>
                </a>
            </slide>

        </carousel>
        <span class="title">پرفروش ترین محصولات</span>
        <carousel class="carousel"  :navigationEnabled="true" :per-page="5">

            <slide  v-for="Content in Contents" v-bind:key="Content.ContentID">
                <a v-bind:href="'Show/Content/'+Content.ContentID" v-if="Content.Images[0]!=null">

                    <img class="card-img" v-bind:src="'http://gsk.whereapp.ir/Appdata/Images/'+Content.Images[0].ImageUrl">
                    <div class="name" ><font-awesome-icon  icon="tag" /><span v-text="Content.ContentName"></span></div>

                    <div class="price" v-if="Content.Products[0]!=null"><font-awesome-icon  icon="money-bill" /><span v-text="Content.Products[0].ProductPrice+' تومان'"></span></div>
                    <div class="btn_add_cart" ><font-awesome-icon  icon="cart-plus" /><span>افزودن به سبد خرید</span></div>
                </a>
            </slide>

        </carousel>
        <span class="title">تخفیفات ویژه</span>
        <carousel class="carousel"  :navigationEnabled="true" :per-page="5">

            <slide  v-for="Content in Contents" v-bind:key="Content.ContentID">
                <a v-bind:href="'Show/Content/'+Content.ContentID" v-if="Content.Images[0]!=null">

                    <img class="card-img" v-bind:src="'http://gsk.whereapp.ir/Appdata/Images/'+Content.Images[0].ImageUrl">
                    <div class="name" ><font-awesome-icon  icon="tag" /><span v-text="Content.ContentName"></span></div>

                    <div class="price" v-if="Content.Products[0]!=null"><font-awesome-icon  icon="money-bill" /><span v-text="Content.Products[0].ProductPrice+' تومان'"></span></div>
                    <div class="btn_add_cart" ><font-awesome-icon  icon="cart-plus" /><span>افزودن به سبد خرید</span></div>
                </a>
            </slide>

        </carousel>

    </div>

</template>

<script>
    import { Carousel, Slide } from 'vue-carousel';
    export default {
        name: "Home",
        components: {
            Carousel,
            Slide
        },
        props: {
            UrlGetProduct: {
                type: String,
                required: true,
            },
        },
        data(){
            return {
                Contents:[],
                Raw:-1,

            };
        },
        mounted() {
            this.GetProduct();

        },
        methods:{
            GetProduct(){
                axios
                    .get(this.UrlGetProduct)
                    .then(response => {
                        var data=response.data;
                        console.log(data) ;
                        this.Contents=data;

                    })
            },
            GetImage(){
                //this.Raw++;
                return this.Contents[0].Images[0].ImageUrl;

            }
        }
    }
</script>

<style scoped>

</style>
