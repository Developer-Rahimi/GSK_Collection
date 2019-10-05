<template>
    <div id="BigText">
        <div>
            <span class="required" v-show="required">*</span>
            <span class="Name">نام</span>
            <br>
            <div class="main" v-show="!valid" >
                <textarea  class="c-text"  v-model="Data" @change="Check()" />
            </div>
            <div class="main" v-show="valid" >
                <textarea  class="c-text valid-text" v-model="Data" type="text" @change="Check()"/>
                <font-awesome-icon class="icon"  icon="check-circle"    />
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BigText",
        props: {
            required: {
                type: Boolean,
                required: true,
            },
            MinLength: {
                type: Number,
                required: true,
            },
            Info: {
                type: Function,
                required: false,
            },

        },
        data(){
            return {
                valid:false,
                Data:'',
            }
        },
        mounted() {
            console.log(this.Data+"dsd");
            /*document.getElementsByID('EditText').style.minWidth = '50px';
            document.getElementsByID('EditText').style.background = 'red';
            document.getElementsByClassName("c-text").style.color = 'red';*/
        },
        methods:{
            Check(){
                this.valid=this.Data.length>this.MinLength;
                //console.log(this.Data);
                this.Info(this.Data);
            }
        }
    }
</script>

<style scoped>
    #BigText .required {
        color:red;
    }
    #BigText .main {
        /*color:red;*/
        width:100%;
    }
    #BigText .c-text {
        float:right;
        display: block;
        width:auto;
        min-width:250px;
        height: 150px;
        padding: 5px 10px;
        color: #555555;
        background-color: #ffffff;
        border: 1px solid #cccccc;
        border-radius: 4px;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }
    #BigText .valid-text {
        border: 1px solid #46a74e;
        color: #35b33f;
        background: #ddf9e1;
    }
    #BigText .icon{
        float:right;
        font-size:20px;
        color: #46a74e;
        margin-right:10px;
        margin-top: 7px;
    }
</style>
