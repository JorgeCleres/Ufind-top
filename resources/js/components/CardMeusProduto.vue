<template>
    <div class="cardProduto">
        <div class="form-inline">
            <modal-link tipo="button" nome="adicionar" titulo="Anunciar" classe="btn btn-success" ></modal-link>
        </div>

        <div class="card mb-3" style="max-width: 940px;" v-for="(item, index) in itens" :key="index">
            <div class="row no-gutters">
                <div class="col-md-3">

                    <slot></slot>
                    <!--<img v-bind:src="item['imagem']" class="card-img" alt="...">-->


                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{item['titulo']}}</h5>
                        <p class="card-text">{{item['descricao']}}</p>
                        <p class="card-text"><small class="text-muted"><span>$ </span>{{item['preco']}}</small></p>
                        
                        <div v-if="detalhe || editar || deletar">
                            <form  v-bind:id="index" v-if="deletar && token" :action="deletar + item.id" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" :value="token">

                                <modal-link 
                                    :item="item" 
                                    :url="editar" 
                                    css="btn btn-primary"
                                    tipo="button" 
                                    nome="editar" 
                                    titulo="Editar" 
                                    
                                    ></modal-link>

                                <button type="button" class="btn btn-danger" style="color:white" v-on:click="executaForm(index)">Excluir</button>

                                <a v-if="detalhe && !modal" :href="detalhe">Detalhe</a>
                                <modal-link v-if="detalhe && modal" :item="item" :url="detalhe" tipo="button" nome="detalhe" titulo="Detalhe" css="" ></modal-link>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
       props: ['itens','criar','detalhe','editar','deletar','token','modal'],
       methods: {
           executaForm: function(index) {
               var resp = confirm('Deseja realmente excluir?');

               if(resp == true){
                    document.getElementById(index).submit();
               }
           }
       }
    }
</script>

<style scoped>

    .cardProduto{
        margin: 80px 0;
    }
    .card-img {
        max-width: 240px;
        min-width: 200px;
        max-height: 140px;
        min-height: 186px;
    }

    .no-gutters {
        background: #f8f4f4;
    }
</style>