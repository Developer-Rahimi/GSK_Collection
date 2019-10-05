<template>
    <div id="EditText">
        <div>
            <span class="required" v-show="required">*</span>
            <span class="Name" v-text="LabelName"></span>
            <br>
            <div class="main" v-show="!valid" >
                <input  class="c-text" v-bind:type="TypeInput" v-model="Data" @change="Check()" >
            </div>
            <div class="main" v-show="valid" >
                <input  class="c-text valid-text"v-model="Data" type="text" >
                <font-awesome-icon class="icon"  icon="check-circle"   />
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "EditText",
        props: {
            LabelName: {
                type: String,
                required: true,
            },
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
            TypeInput: {
                type: String,
                required: true,
            },
        },
        data(){
            return {
                valid:false,
                Data:'',
                Width:300,
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
                this.Dat(this.Data);
            }
        }
    }
</script>

<style scoped>
    #EditText {
        float:right;
        width: 100%;
    }
    #EditText .required {
        color:red;
    }
    #EditText .main {
        /*color:red;*/
        width:100%;
    }
    #EditText .c-text {
        float:right;
        display: block;
        width:auto;
        min-width:250px;
        height: 32px;
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
    #EditText .valid-text {
        border: 1px solid #46a74e;
        color: #35b33f;
        background: #ddf9e1;
    }
    #EditText .icon{
        float:right;
        font-size:20px;
        color: #46a74e;
        margin-right:10px;
        margin-top: 7px;
    }
</style>
