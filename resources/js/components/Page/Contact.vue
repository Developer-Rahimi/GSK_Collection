<template>
    <div id="Contact">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">تماس با ما</h2>
        </div>
        <div class="card-body">

                    <span class="label">آدرس:</span>
            <br>
                    <span class="data" v-text="Contact.Address"></span>
            <br>
                    <span class="label">رایانامه:</span>
            <br>
                    <span class="data" v-text="Contact.Email"></span>
            <br>
                    <span class="label">تلفن:</span>
            <br>
                    <span  class="data" v-text="Contact.Phone"></span>
            <br>
                    <span  class="label">فکس:</span>
            <br>
                    <span class="data" v-text="Contact.Fax"></span>
            <br>
            <br>
            <div class="Contact_Form">
                <b-form-group
                        class="lbl_name"
                        label="نام شما:"
                        description=""
                >
                    <b-form-input
                            v-model="info.Name"
                            class="name"
                            type="email"
                            required
                            placeholder="برای مثال: علی"
                    ></b-form-input>
                </b-form-group>
                <b-form-group
                        class="lbl_email"
                        label="رایانامه:"
                        description=""
                >
                    <b-form-input
                            v-model="info.email"
                            type="email"
                            class="email"
                            required
                            placeholder="info@gskcollection"
                    ></b-form-input>
                </b-form-group>
                <b-form-group
                        class="lbl_desc"
                        label="متن:"
                        description=""
                >
                    <b-form-textarea
                            v-model="info.desc"
                            type="email"
                            class="desc"
                            required
                            placeholder="اینجا بنویسید ...."
                    ></b-form-textarea>
                </b-form-group>
                <br>
                <VueButtonSpinner
                        class="btn_send"
                        :is-loading="true"
                        :disabled="true"
                        :status="true">
                    <span  style="margin-left:4px;float: right ">ارسال</span>
                </VueButtonSpinner>

            </div>
        </div>
    </div>
    </div>
</template>

<script>
    import VueButtonSpinner from 'vue-button-spinner';
    export default {
        name: "Contact",
        components: {
            VueButtonSpinner
        },
        props: {
            UrlGetContact: {
                type: String,
                required: true,
            },
        },
        data(){
            return {
                Contact:{},
                info:{}
            }
        },
        mounted() {
            this.GetContact();
        },
        methods:{
            GetContact(){
                axios
                    .get(this.UrlGetContact)
                    .then(response => {
                       console.log(response.data) ;
                       this.Contact=response.data;
                    })
            }
        }
    }
</script>

<style scoped>

</style>
