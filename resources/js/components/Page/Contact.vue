<template>
    <div>
        <h1>Contact</h1>
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
                    })
            }
        }
    }
</script>

<style scoped>

</style>
