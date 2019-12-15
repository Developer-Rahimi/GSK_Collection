<template>
    <div class="container">
        <div id="Dashboard">
            <h1>مدیریت سایت</h1>
            <div class="card">
                <div class="card-header">
                    <h3>صفحه اصلی</h3>
                </div>
                <div class="card-body">
                    <ul>
                        <li v-for="Menu in Menues">
                            <a v-bind:href="Menu.Link" v-bind:title="Menu.Name"><span v-text="Menu.Name"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div v-if="Statics">
                <apexchart width="500" type="bar" :options="options" :series="series"></apexchart>
                <apexchart width="500" type="line" :options="options" :series="series"></apexchart>
            </div>
        </div>

    </div>
</template>

<script>
    import VueApexCharts from 'vue-apexcharts'

    Vue.component('apexchart', VueApexCharts)
    export default {
        name: "Admin",
        props:{
            UrlStatistics: {
                type: String,
                required: true,
            },
        },
        data(){
            return {
                Menues:[
                    {Name:"محتوا",Link:"/Admin/Content",icon:""},
                    {Name:"کاربران",Link:"/Admin/User",icon:"user"},
                    {Name:"سفارش ها",Link:"/Admin/Order",icon:"user"},
                    {Name:"محصولات",Link:"/Admin/Product",icon:"user"},
                    {Name:"انبار",Link:"/Admin/Store",icon:"user"},
                ],
                Statistics:{},
                Loading:false,
                options: {
                    chart: {
                        id: 'vuechart-example'
                    },
                    xaxis: {
                        categories: ['', '', '', '', '', '', '']
                    }
                },
                series: [{
                    name: 'series-1',
                    data: [0, 0, 10, 0, 0, 0, 5]
                }]
            }
        },
        beforeMount(){
            this.GetStatistics();
        },
        mounted() {


        },
        methods:{

            GetStatistics(){
                this.Loading=true;
                axios
                    .get(this.UrlStatistics)
                    .then(response => {
                        var data=response.data;
                        console.log(data) ;
                        this.Statistics=data;
                        this.Statics();
                    }).finally(()=>{
                    this.Loading=false;
                });
            },
            Statics(){
                /*for(var i=0;i<7;i++){*/
                    /*this.series[0].data[0]=this.Statistics.data.day7;
                    this.series[0].data[1]=this.Statistics.data.day6;
                    this.series[0].data[2]=this.Statistics.data.day5;
                    this.series[0].data[3]=this.Statistics.data.day4;
                    this.series[0].data[4]=this.Statistics.data.day3;
                    this.series[0].data[5]=this.Statistics.data.day2;
                    this.series[0].data[6]=this.Statistics.data.day1;*/
                    this.series[0].data[0]=11;
                /*}*/
                console.log(this.Statistics.data.day1);
                console.log(this.series);
               // this.VueApexCharts.updated();

            }
        }
    }
</script>

<style scoped>

</style>
