<template>
    <div id="Contact">
        <div class="container-contact100">
            <div class="wrap-contact100">
                <form class="contact100-form validate-form">
				<span class="contact100-form-title">
					ارسال پیام برای ما
				</span>

                    <label class="label-input100" for="first-name">نام شما *</label>
                    <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
                        <input id="first-name" class="input100" v-model="info.ContactName" type="text" name="first-name" placeholder="نام">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
                        <input class="input100" v-model="info.ContactLast" type="text" name="last-name" placeholder="نام خانوادگی">
                        <span class="focus-input100"></span>
                    </div>

                    <label class="label-input100" for="email">آدرس ایمیل *</label>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input id="email" class="input100" type="text"  v-model="info.ContactEmail" name="email" placeholder="example@gmail.com">
                        <span class="focus-input100"></span>
                    </div>

                    <!--<label class="label-input100" for="phone">Enter phone number</label>
                    <div class="wrap-input100">
                        <input id="phone" class="input100" type="text" name="phone" placeholder="Eg. +1 800 000000">
                        <span class="focus-input100"></span>
                    </div>-->

                    <label class="label-input100" for="message">پیام *</label>
                    <div class="wrap-input100 validate-input" data-validate = "Message is required">
                        <textarea id="message" class="input100" name="message" v-model="info.ContactDesc" placeholder="پیام خود را وارد نمایید"></textarea>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-contact100-form-btn">
                        <button class="contact100-form-btn" @click="SendContact">
                            ارسال پیام
                        </button>
                    </div>
                </form>

                <div class="contact100-more flex-col-c-m" style="background-image: url('contact/images/bg-01.jpg');">
                    <div class="flex-w size1 p-b-47">
                        <div class="txt1 p-r-25">
                            <span class="lnr lnr-map-marker"></span>
                        </div>

                        <div class="flex-col size2">
						<span class="txt1 p-b-20">
							آدرس
						</span>

                            <span class="txt2" v-text="Contact.Address">
							Mada Center 8th floor, 379 Hudson St, New York, NY 10018 US
						</span>
                        </div>
                    </div>

                    <div class="dis-flex size1 p-b-47">
                        <div class="txt1 p-r-25">
                            <span class="lnr lnr-phone-handset"></span>
                        </div>

                        <div class="flex-col size2">
						<span class="txt1 p-b-20">
							شماره تماس
						</span>

                            <span class="txt3" v-text="Contact.Phone">
							+1 800 1236879
						</span>
                        </div>
                    </div>

                    <div class="dis-flex size1 p-b-47">
                        <div class="txt1 p-r-25">
                            <span class="lnr lnr-envelope"></span>
                        </div>

                        <div class="flex-col size2">
						<span class="txt1 p-b-20">
							آدرس ایمیل
						</span>

                            <span class="txt3" v-text="Contact.Email">

						</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div id="dropDownSelect1"></div>
   <!-- <div class="card">
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
                            v-model="info.ContactName"
                            class="name"
                            type="text"
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
                            v-model="info.ContactEmail"
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
                            v-model="info.ContactDesc"
                            type="text"
                            class="desc"
                            required
                            placeholder="اینجا بنویسید ...."
                    ></b-form-textarea>
                </b-form-group>
                <br>
                <button class="btn btn-info" v-if="!loading"    @click="SendContact">ارسال</button>
                <VueButtonSpinner
                    v-else
                        class="btn_send"
                        :is-loading="true"
                        :disabled="true"
                        :status="true">
                    <span  style="margin-left:4px;float: right " >ارسال</span>
                </VueButtonSpinner>

            </div>
        </div>
    </div>-->
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
            UrlSendContact: {
                type: String,
                required: true,
            },
        },
        data(){
            return {
                Contact:{},
                info:{},
                loading:false,
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
            },
            SendContact(){
                this.loading=true;
                axios
                    .post(this.UrlSendContact,{
                        ContactName:this.info.ContactName,
                        ContactEmail:this.info.ContactEmail,
                        ContactDesc:this.info.ContactDesc
                    })
                    .then(response => {
                        var data=response.data;
                        console.log(data) ;
                        this.info.ContactDesc="";
                        this.loading=false;
                    })
            }
        }
    }
</script>

<style scoped>

</style>
