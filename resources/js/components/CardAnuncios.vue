<template>
    <border>
        <form class="form-inline container">
            <input class="form-control mr-sm-10 buscar" type="search" placeholder="Buscar" aria-label="Buscar" v-model="buscar">
            <button class="btn btn-outline-primary my-2 my-sm-0" @click.prevent="generate">Buscar</button>
        </form>

    
        <nav class="navbar navbar-light bg-light"></nav>

        <div class="row row-cols-1 row-cols-md-4">
        <div class="card" v-for="(item, index) in lista" :key="index">
          <img  :src="item['imagem']" class="card-img-top" alt="imagem não carregou corretamente" style="width:100%; height:250px;">
            
            <div class="card-body">
                <h5 class="card-title titulo"><strong>{{item['titulo']}}</strong></h5>
                <p class="card-text text">{{item['descricao']}}</p>
                <p class="preco"><span>R$</span>{{item['preco']}}</p>
                <div class="col text-center">
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
           //lista:funtion está recebendo os itens
           lista:function(){
               
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
       }
    }
</script>



<style scoped>
   
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
       /* max-width: 375px;
        min-width: 375px;
        max-height: 217px;
        min-height: 217px;*/
        width: 100%;
        height: 217px;
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
