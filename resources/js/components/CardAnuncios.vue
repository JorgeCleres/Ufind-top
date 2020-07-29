<template>
    <border>
        <form class="form-inline container">
            <input class="form-control mr-sm-10 buscar" type="search" placeholder="Buscar" aria-label="Buscar" v-model="buscar">
        </form>

        <nav class="navbar navbar-light bg-light"></nav>

        <div class="row row-cols-1 row-cols-md-4">
        <div class="card" v-for="(item, index) in lista" :key="index">
          <img  :src="item['imagem']" class="card-img-top" alt="imagem não carregou corretamente" style="width:220px;">
            
            <div class="card-body">
                <h5 class="card-title titulo"><strong>{{item['titulo']}}</strong></h5>
                <p class="card-text text">{{item['descricao']}}</p>
                <p class="preco"><span>R$</span>{{item['preco']}}</p>
                <div>
                    <a class="btn btn-lg chat" v-bind:href="'chatify/' + item['usuario_id'] ">Chat do anunciante</a>
                    <modal-link  
                        :item="item"
                        :url="detalhe"
                        tipo="button"
                        nome="detalhe"
                        titulo="Ver mais"
                        css="btn btn-lg" 
                    ></modal-link>
                </div>
            </div>
        </div>
    </div>
    </border>
</template>


<script>
    export default {
       props: ['itens','detalhe','modal'],
       data: function() {
           return {
               buscar: ''
           }
       },
       computed: {
           lista:function(){
               return this.itens.filter(res => {
                res = Object.values(res);
                for(let k = 0; k < res.length; k++){
                    if((res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0){
                        return true;
                    }
                }
                    return false;
               });
           }
       }
    }
</script>



<style scoped>
    .buscar {
        font-size: 20px;
        width: 350px;
        padding: 20px 10px;
        border: 1px solid blue;
        align-content: center;
    }
    .titulo {
        font-size: 30px;
    }

    .text {
        font-size: 20px;
        color: grey;
    }
    .preco {
        font-size: 25px;
        color: grey;
    }
    span {
        font-size: 18px;
        color: green;
        margin: 0 3px
    }

    .chat {
        background-color: #589ef5;
        border: 1px solid #589ef9;
        color: rgb(248, 248, 248);
    }
    .form-inline {
        margin: 75px 0px 0px 40px;
        align-items: center;
    }
    .card{
        margin: 15px 0;
        margin-right: 0px;
        margin-left: 0px;
    }
    .card-img-top {
        max-width: 375px;
        min-width: 375px;
        max-height: 217px;
        min-height: 217px;
        align-self: center;
    }

    .card-text {
        display: block;
        width: 320px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;

    }

</style>
