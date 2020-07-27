<template>
    <div class="mapa">
        <form class="form-inline container">
                    <input class="form-control mr-sm-10 buscar" type="search" placeholder="Buscar" aria-label="Buscar" v-model="buscar">
                    <button @click.prevent="generate">Buscar</button>
        </form>
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
                :position="markers[index]"
                :clickable="true"
                :draggable="true"
                @click="toggleInfoWindown(m.index)"
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
                   lat: '',
                   lng: ''
               },
               zoom: 10,
               buscar: ''
           }
       },
       watch: {
           markers(markers) {/*
               //console.log(this.markers)
               for(let m of markers){
                   //console.log(m.latLng)
               }
               *//*
               if (markers.length != 0){
                    console.log(this.markers)

                    

                   const bounds = new google.maps.LatLngBounds()
                   for (let m of markers) {
                       
                       bounds.extend(m.latLng)
                   }
                   this.$refs.map.fitBounds(bounds)
               }*/
           },
       },
        computed: {
           //lista:funtion está recebendo os itens
            marker:function(){
               console.log('ola')
               //res é uma variavel
               //filter é um filtro javascript
               return this.itens.filter(res => {
                //tranformando o res em um array de valores
                res = Object.values(res);
                //res pega o valor na posiçao 1 que é itens
                //indexOf retorna um valor negativo caso não encontre o valor da variavel res (caso res seja falso)
                for(let k = 0; k < res.length; k++){
                    //(res[k] + "") = transforma o valor recebido em javascript
                    if((res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0){
                        return true;
                    }
                }
                    return false;
               });


               //return this.itens;
           }
       },
       created(){
            this.itens.forEach(item => {
                this.center = {
                    lat: parseFloat(item.lat),
                    lng: parseFloat(item.lng)
                }
                this.markers.push({
                    lat: parseFloat(item.lat),
                    lng: parseFloat(item.lng)
                })
           })
       },
       methods: {
            generate() {
                /*this.zoom = 18;
                this.center = {
                    lat: parseFloat(item.lat),
                    lng: parseFloat(item.lng)
                }*/
                //alert(this.item);
                
                console.log(this.itens)
                this.itens.filter(res => {

                    for(let k = 0; k < res.length; k++){
                        if(data.descricao.indexOf(this.buscar) >= 0){
                            console.log(data.id);
                        }
                    }
                })
                
            }
       }
       
    }
</script>

<style scoped>
.mapa{
        margin: 100px 50px;
    }
</style>