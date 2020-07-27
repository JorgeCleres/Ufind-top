<template>
    <div class="mapa">
        <button @click="generate">gerar</button>
        <GmapMap
            :center="center"
            :zoom= this.zoom
            map-type-id="terrain"
            style="width: 1000px; height: 500px"
            ref="map"
            >
            <!--
            <gmap-info-window
                :options="infoOptions"
                :position="infoWindowPos"
                :opened="infoWindOpen"
                @closeclick="infoWinOpen=false"
            ></gmap-info-window>
            -->
            <GmapMarker
                :key="index"
                v-for="(marker, index) in markers"
                :position="markers"
                :clickable="true"
                :draggable="true"
                @click="toggleInfoWindown(m.i)"
            />
        </GmapMap>
    </div>
</template>

<script>
    export default {
       props: ['itens'],
       data () {
           return {
               markers: [],
               place: null,
               center: {
                   lat: -25.4832394,
                   lng: -49.2170207
               },
               zoom: 10,
           }
       },
       watch: {
           markers(markers) {/*
               //console.log(this.markers)
               for(let m of markers){
                   //console.log(m.latLng)
               }
               */
               if (markers.length != 0){
                    console.log(this.markers)

                    

                   const bounds = new google.maps.LatLngBounds()
                   for (let m of markers) {
                       
                       bounds.extend(m.latLng)
                   }
                   this.$refs.map.fitBounds(bounds)
               }
           },/*
           markers(markers) {
               if (markers.length > 2){
                   const bounds = new google.maps.LatLngBounds()
                   for (let m of markers) {
                       bounds.extend(m.latLng)
                   }
                   this.$refs.map.fitBounds(bounds)
               }
           }*/
       },
       created(){
            this.itens.forEach(item => {
                this.markers = {
                    lat: parseFloat(item.lat),
                    lng: parseFloat(item.lng)
                }
                //this.markers.push({ position: marker });
                //console.log(this.markers);
           })


            /*
            this.itens.forEach(item => {
                this.markers = _.range(1).map(m => ({
                    latLng: {
                        lat: parseFloat(item.lat),
                        lng: parseFloat(item.lng)
                    }
                }))
                //console.log(this.markers)
            });
            console.log(this.markers)*/
       },
       methods: {
           generate() {
               //const spread = Math.random() + 0.001
                this.zoom = 18;
                this.center = {
                    lat: parseFloat(item.lat),
                    lng: parseFloat(item.lng)
                }
                alert(item.lat)

                this.markers = _.range(30)
                .map(m => ({
                    latLng: {
                        lat: parseFloat(item.lat),
                        lng: parseFloat(item.lng)

                    }
                }))
           }
       }
       
    }
</script>

<style scoped>
.mapa{
        margin: 100px 50px;
    }
</style>