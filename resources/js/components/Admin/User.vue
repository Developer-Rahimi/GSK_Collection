<template>
    <div class="container">
        <div id="User">
            <b-table
                v-show="!ShowUser &!Loading"
                striped hover :items="Users":fields="UserFields" >
                <template v-slot:cell(id)="data">
                    {{ data.index + 1 }}
                </template>
                <template v-slot:cell(More)="data">
                    <button class="btn btn-info" @click="GetUser(data.item.id)">اطلاعات بیشتر</button>
                </template>
            </b-table>
            <div v-show="ShowUser &!Loading" v-if="User">
                <div class="card">
                    <div class="card-header">
                        <h3>{{User.UserName}}</h3>
                        <span @click="ShowUser=false">بازگشت</span>
                        <button class="btn btn-danger">بلاک</button>
                        <button class="btn btn-info">فعال</button>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>عنوان</th>
                                <th>توضیحات</th>
                            </tr>
                            <tr>
                                <th>نام کاربر</th>
                                <td v-text="User.UserName"></td>
                            </tr>
                            <tr>
                                <th>شماره تلفن</th>
                                <td v-text="User.UserPhone"></td>
                            </tr>
                            <tr>
                                <th>ایمیل</th>
                                <td v-text="User.UserEmail"></td>
                            </tr>
                            <tr>
                                <th>دسترسی</th>
                                <td v-if="User.Permission" v-text="User.Permission.PermissionNameFa"></td>
                                <td v-else v-text="'نامشخص'"></td>
                            </tr>
                            <tr>
                                <th>وضعیت</th>
                                <td v-if="User.UserConfirm" v-text="'فعال'"></td>
                                <td v-else v-text="'غیر فعال'"></td>
                            </tr>
                            <tr>
                                <th>شماره تلفن</th>
                                <td v-text="User.UserPhone"></td>
                            </tr>

                        </table>
                    </div>
                </div>

            </div>
            <div v-show="Loading">
                <center>
                   <div style="width: 150px">
                       <div class="loader" >

                           <div class="face">
                               <div class="circle"></div>
                           </div>
                           <div class="face">
                               <div class="circle"></div>
                           </div>
                       </div>
                   </div>
                </center>
            </div>

        </div>
    </div>

</template>

<script>
    export default {
        name: "User",
        props:{
            UrlGetUser: {
                type: String,
                required: true,
            },
        },
        data(){
            return {
                Users:[],
                UserFields:[
                    { key: 'id', label: 'ردیف' },
                    { key: 'UserName', label: 'نام کاربر' },
                    /*{ key: 'UserPhone', label: 'شماره تلفن' },*/
                    { key: 'UserEmail', label: 'ایمیل' },
                    { key: 'More', label: 'ایمیل' },
                ],
                User:{},
                Loading:false,
                ShowUser:false,
            }
        },
        mounted() {
            this.GetUsers();
        },
        methods:{
            GetUsers(){
                this.Loading=true;
                axios
                    .get(this.UrlGetUser)
                    .then(response => {
                        var data=response.data;
                        console.log(data) ;
                        this.Users=data;
                    }).finally(() => this.Loading = false)
            },
            GetUser(id){
                this.Loading=true;
                axios
                    .get(this.UrlGetUser+"/"+id)
                    .then(response => {
                        var data=response.data;
                        console.log(data) ;
                        this.User=data;
                        this.ShowUser=true;
                    }).finally(() => this.Loading = false)
            },
        }
    }
</script>

<style scoped>

</style>
