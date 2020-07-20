<template>
    <div class="card-deck">
        <div class="card" v-for="(item, index) in itens" :key="index">
            
          <!--  <img  :src="item['imagem']" class="card-img-top" alt="imagem não carregou corretamente" style="width:220px"> -->

            <div class="card-body">
                <h5 class="card-title">{{item['titulo']}}</h5>
                <p class="card-text">{{item['descricao']}}</p>
                <p class=""><span>$ </span>{{item['preco']}}</p>
                
                <div>
                    <modal-link
                        :item="item"
                        :url="detalhe"
                        tipo="button"
                        nome="detalhe"
                        titulo="Ver mais"
                        css="btn btn-primary" 
                    ></modal-link>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
       props: ['itens','detalhe','modal']
    }
</script>

<style scoped>

    .card-deck{
        margin: 80px 0;
    }
    .card-img-top {
        max-width: 266px;
        min-width: 50px;
        max-height: 245px;
        min-height: 50px;
    }

    .card-text {
        display: block;
        width: 320px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;

    }

</style>
