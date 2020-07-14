<template>
    <div class="mapa">
        <button @click="generate">gerar</button>
        <GmapMap
            :center="{lat:lat, lng:lng}"
            :zoom="10"
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
                :position="marker.latLng"
                :clickable="true"
                :draggable="true"
                @click="toggleInfoWindown(m.i)"
            />
        </GmapMap>
    </div>
</template>

<script>
    export default {
       props: ['lat','lng'],
       data () {
           return {
               markers: [],
               place: null,
           }
       },
       watch: {
           markers(markers) {
               if (markers.length > 2){
                   const bounds = new google.maps.LatLngBounds()
                   for (let m of markers) {
                       bounds.extend(m.latLng)
                   }
                   this.$refs.map.fitBounds(bounds)
               }
           },
           markers(markers) {
               if (markers.length > 2){
                   const bounds = new google.maps.LatLngBounds()
                   for (let m of markers) {
                       bounds.extend(m.latLng)
                   }
                   this.$refs.map.fitBounds(bounds)
               }
           }
       },
       created(){
           
                this.markers = _.range(1)
                .map(m => ({
                    latLng: {
                        lat: this.lat,
                        lng: this.lng

                    }
                }))
           
       },
       methods: {
           generate() {
               const spread = Math.random() + 0.001

               this.center = {
                   lat : 1.38 + (Math.random() - 0.5) * spread,
                   lng: 103.8 + (Math.random() -0.5) * spread
               }

               this.markers = _.range(30)
                .map(m => ({
                    latLng: {
                        lat: this.lat,
                        lng: this.lng

                    }
                }))
           }
       }
       
    }
</script>

<style scoped>
.mapa{
        margin: 20px 50px;
    }
</style>