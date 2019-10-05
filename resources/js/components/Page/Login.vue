<template>
    <div id="Login">
        <div class="card">
            <div class="card-header">
                <h2 class="title">تائید هویت</h2>
            </div>
            <div class="card-body">
                <div class="register">
                    <span>ایجاد حساب کاربری</span>
                    <br>
                    <br>
                    <br>
                    <div class="field-form">
                    <EditText
                        :required="false"
                        LabelName="برای ایجاد حساب و ادامه خرید، ایمیل خود را وارد کنید"
                        :MinLength=5
                        TypeInput="email"
                    ></EditText>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <button class="btn btn-warning">ایجاد حساب کاربری</button>
                </div>
                <div class="enter">
                <span>آیا ثبت نام کرده اید؟</span>
                <br>
                <br>
                <br>
                    <div class="field-form">
                <EditText
                    :required="false"
                    LabelName="آدرس ایمیل"
                    :MinLength=5
                    TypeInput="email"
                ></EditText>
                    </div>
                    <div class="field-form">
                <EditText
                    :required="false"
                    LabelName="رمز عبور"
                    :MinLength=5
                    TypeInput="password"
                ></EditText>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <button class="btn btn-info">ورود به حساب</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Login"
    }
</script>

<style scoped>

</style>
