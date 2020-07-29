<template>
    <div class="mapa">
        <form class="form-inline container">
            <input class="form-control mr-sm-10 buscar" type="search" placeholder="Buscar" aria-label="Buscar" required v-model="buscar">
        </form>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="titulo"></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body anuncio">
                        <div class="modal-body">
                            <img id="imagem" class="imagem" src="">
                        </div>
                        <div class="modal-body desc">
                            <p id="descricao" class="descricao"></p>
                            
 
                            <div class="modal-body">
                                <p id="preco" class="preco"></p>
                                <a class="btn btn-primary chat usuario_id" href="" id="usuario_id" role="button">Chat</a>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
        <GmapMap
            :center="center"
            :zoom= this.zoom
            map-type-id="terrain"
            style="width: 1000px; height: 500px"
            ref="map"
        >
            <GmapMarker
                :key="index"
                v-for="(marker, index) in filter"
                :position="markers[index]"
                :clickable="true"
                :draggable="true"
                @click="toggleInfoWindown(marker,index)"
            />
        </GmapMap>
    </div>
</template>

<script>
    export default {
        props: ['itens','users'],
        data () {
            return {
                markers: [],
                place: null,
                center: {
                    lat: -25.4408155,
                    lng: -49.1544761
                },
                zoom: 10,
                buscar: '',
           }
        },
        watch: {
            
        },
        computed: {
            filter() {
                return !this.buscar.length ? this.itens : this.itens.filter(item => item.titulo.toLowerCase().includes(this.buscar.toLowerCase().trim()))
            }
            
        },
        created() {
            this.itens.forEach(item => {
                this.center = {
                    lat: parseFloat(item.lat),
                    lng: parseFloat(item.lng)
                }
                this.markers.push({
                    lat: parseFloat(item.lat),
                    lng: parseFloat(item.lng),
                })
            })
        },
        methods: {
            toggleInfoWindown: function(marker, index) {
                $('#titulo').text(marker.titulo);
                $('.descricao').text(marker.descricao);
                $('.preco').text('R$' + marker.preco);
                $('.imagem').attr("src", marker.imagem);
                $('.usuario_id').attr("href", "chatify/" + marker.usuario_id);
                $('#myModal').modal();
            },
        }
    }
</script>

<style scoped>
    .mapa{
        margin: 100px 50px;
    }

    .buscar {
        margin: 0px -14px;
        width: 220px;
    }

    .modal-body {
        display: flex;
    }

    .modal-body img {
        width: 350px;
        border: 1px solid black;
        border-radius: 8px;
    }

    .desc {
        display: block;
        width: 355px;
        word-wrap: break-word;
        /*overflow: hidden;
        text-overflow: ellipsis;*/
    }

    #descricao {
        height: 250px;
        font-size: 20px;
        color: #5d5757;
    }

    #imagem {
        font-size: 30px;
        color: #2b2b2b;
    }

    #preco {
        font-size: 30px;
        color: #2b2b2b;
    }

    .btn {
        padding: 3px 10px;
        font-size: 20px;
        margin: 0px 30px;
        color: white;
        height: 40px;
    }
</style>