<template>
    <div>
        <!--<div id="mapid" style="width: 100%; height: 700px;"></div>-->

    </div>
</template>

<script>
    export default {
        name: "Test",
        data(){
            return {
                Data:'',
            }
        },mounted() {
            this.InitMap();
        },
        methods:{
            ch(d){
               console.log(d) ;
            },
           /* InitMap(){
                this.mymaps = L.map('mapid').setView({
                    lat: 35.708309,
                    lng: 51.380730
                }, 5);
                L.tileLayer('https://developers.parsijoo.ir/web-service/v1/map/?type=tile&x={x}&y={y}&z={z}&apikey=8094f78f11c44097816ebef3d6d08c9a', {
                    maxZoom: 21,
                }).addTo(this.mymaps);
            }*/
        }
    }
</script>

<style scoped>

</style>
