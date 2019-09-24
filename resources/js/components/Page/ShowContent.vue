<template>
    <div id="Content">
        <img class="show" src=" ../../images/13.jpg" alt="">

        <div class="gallery">
            <img src=" ../../images/13.jpg" alt="">
            <img src=" ../../images/14.jpg" alt="">
            <img src=" ../../images/15.jpg" alt="">
        </div>
        <div class="info">
            <h3 class="title">نام محصول</h3>
            <span class="price" >125000 تومان</span>
            <span><font-awesome-icon  icon="cart-plus" />افزودن به سبد خرید</span>
            <p>
                در کنار نوشتن متن، این ال سی دی گرافیکی اجازه رسم سریال خط، دایره، جعبه، خاموش و روشن کردن پیکسل ها، پاک کردن بلوک های خاصی از نمایشگر، کنترل نور پس زمینه  را می دهد. در این ال سی دی متن ها به رنگ سفید بر روی پس زمینه آبی نوشته می شوند.در کنار نوشتن متن، این ال سی دی گرافیکی اجازه رسم سریال خط، دایره، جعبه، خاموش و روشن کردن پیکسل ها، پاک کردن بلوک های خاصی از نمایشگر، کنترل نور پس زمینه  را می دهد. در این ال سی دی متن ها به رنگ سفید بر روی پس زمینه آبی نوشته می شوند.در کنار نوشتن متن، این ال سی دی گرافیکی اجازه رسم سریال خط، دایره، جعبه، خاموش و روشن کردن پیکسل ها، پاک کردن بلوک های خاصی از نمایشگر، کنترل نور پس زمینه  را می دهد. در این ال سی دی متن ها به رنگ سفید بر روی پس زمینه آبی نوشته می شوند.
            </p>
            <div>
                <b-tabs
                    active-nav-item-class="font-weight-bold text-uppercase text-danger"
                    active-tab-class="font-weight-bold text-success"
                    content-class="mt-3"
                >
                    <b-tab title="مشخصات" active><p>I'm the first tab</p></b-tab>
                    <b-tab title="نظرات"><p>I'm the second tab</p></b-tab>
                    <b-tab title="برچسب ها" ><p>I'm a disabled tab!</p></b-tab>
                </b-tabs>
            </div>
        </div>
        <div id="Comment">

        </div>
    </div>
</template>

<script>
    export default {
        name: "ShowContent"
    }
</script>
<style scoped>

</style>
