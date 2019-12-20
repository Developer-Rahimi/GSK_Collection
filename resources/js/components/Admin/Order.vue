<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
    <div class="container">
        <b-table
                ref="selectableTable"
                selectable
                :select-mode="'single'"
                selected-variant="active"
                :fields="OrderFields"
                @row-selected="onRowSelected"
                striped hover :items="Orders" >
            <!--:fields="ContentFields" @row-selected="onRowSelected"-->
           <template v-slot:cell(id)="data">
                {{ data.index + 1 }}
            </template>
             <!--<template v-slot:cell(ContentStatus)="data">
                {{ data.item.ContentStatus.ContentStateTitle }}
            </template>-->
        </b-table>
    </div>
</template>

<script>
    export default {
        name: "Order",
        props:{
            UrlGetOrder: {
                type: String,
                required: true,
            },
        },
        data(){
            return{
                Orders:[],
                Order:{},
                OrderFields:[
                    { key: 'id', label: 'ردیف' },
                    { key: 'OrderID', label: 'کد سفارش' },
                    { key: 'DatePay', label: 'تاریخ' },
                ],

            }
        },
        mounted() {
            this. GetOrder();

        },
        methods:{
            GetOrder(){
                this.Loading=true;
                axios
                    .get(this.UrlGetOrder)
                    .then(response => {
                        var data=response.data;
                        console.log(data) ;
                        this.Orders=data;
                    }).finally(() => this.Loading = false)
            },
            onRowSelected(items){
                console.log(items[0]) ;
            }
        }
    }
</script>

<style scoped>

</style>