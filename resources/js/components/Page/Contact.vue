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
        </div>
    </div>
    </div>
</template>

<script>
    export default {
        name: "Contact",
        props: {
            UrlGetContact: {
                type: String,
                required: true,
            },
        },
        data(){
            return {
                Contact:{},

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
