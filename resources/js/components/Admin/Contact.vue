<template>
    <div class="container">
       <div class="card">
           <div class="card-header">

           </div>
           <div class="card-body"><!--@row-selected="onRowSelected"-->
               <div>
                   <b-table
                       ref="selectableTable"
                       selectable
                       :select-mode="'single'"
                       selected-variant="active"
                       striped hover :items="Contacts"  :fields="ContactFields">
                       <template v-slot:cell(ContactID)="data">
                           {{ data.index + 1 }}
                       </template>
                       <!--<template v-slot:cell(ContentStatus)="data">
                           {{ data.item.ContentStatus.ContentStateTitle }}
                       </template>-->
                   </b-table>
               </div>
               <div>

               </div>

           </div>
       </div>
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
                ContactFields:[
                    { key: 'ContactID', label: 'ردیف' },
                    { key: 'ContactName', label: 'نام' },
                    { key: 'ContactEmail', label: 'ایمیل' },
                    { key: 'ContactEmail', label: 'ایمیل' },
                ],
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
