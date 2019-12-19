<template>
    <div>
        {{Contacts}}
    </div>
</template>

<script>
    export default {
        name: "Contact",
        props: {
            UserInfo: {
                type: String,
                required: true,
            },
            UrlGetContact: {
                type: String,
                required: true,
            },
        },
        data(){
            return {
                Contacts:[],
                Loading:false,
            }
        },
        mounted() {
            this.GetContacts();
        },
        methods:{
            GetContacts(){
                this.Loading=true;
                axios
                    .get(this.UrlGetContact)
                    .then(response => {
                        var data=response.data;
                        console.log(data) ;
                        this.Contacts=data;
                    }).finally(()=>{
                    this.Loading=false;
                });
            }
        }
    }
</script>

<style scoped>

</style>
