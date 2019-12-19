<template>
    <div class="container">
       <div class="card" id="Contact">
           <div class="card-header">
                <h3 v-if="!ShowContact">لیست فرم های تماس</h3>
               <div v-else>
                   <h3 >{{Contact.ContactName}}</h3>
                   <span class="email">{{Contact.ContactEmail}}</span>
                   <botton class="btn btn-outline-warning back" @click="ShowContact=!ShowContact">باز گشت</botton>
                   <br><br>
                   <span class="date">{{Contact.ContactDate}}</span>

               </div>

           </div>
           <div class="card-body"><!---->
               <div v-if="!ShowContact">
                   <b-table
                       ref="selectableTable"
                       selectable
                       :select-mode="'single'"
                       selected-variant="active"
                       striped hover :items="Contacts"  :fields="ContactFields" @row-selected="onRowSelected">
                       <template v-slot:cell(ContactID)="data">
                           {{ data.index + 1 }}
                       </template>
                       <!--<template v-slot:cell(ContentStatus)="data">
                           {{ data.item.ContentStatus.ContentStateTitle }}
                       </template>-->
                   </b-table>
               </div>
               <div v-else >

                    <p>{{Contact.ContactDesc}}</p>
                   <div class="field-form" style="float:right;width: 400px">
                       <label for="name">نام:</label>
                       <input id="name" type="text" class="text-box-1">
                   </div>
                   <br> <br> <br>
                   <div class="field-form" style="float:right;width: 500px">
                       <label for="desc">متن:</label>
                       <textarea id="desc" type="text" class="text-box-1" style="min-height: 250px"></textarea>
                   </div>
                   <div class="field-form" style="float:right;width: 100%">
                       <botton class="btn btn-outline-primary">ارسال پاسخ</botton>
                   </div>
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
                Contact:{},
                ContactFields:[
                    { key: 'ContactID', label: 'ردیف' },
                    { key: 'ContactName', label: 'نام' },
                    { key: 'ContactEmail', label: 'ایمیل' },
                    { key: 'ContactEmail', label: 'ایمیل' },
                ],
                Loading:false,
                ShowContact:true,
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
            },
            onRowSelected(items){
                this.Contact=items[0];
                this.ShowContact=true;
            }
        }
    }
</script>

<style scoped>

</style>
