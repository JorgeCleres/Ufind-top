<template>
    <div class="cardProduto">
        <div class="imagem">
            <img v-bind:src="imagem" class="card-img-top" alt="">
        </div>
            
        <div class="infos">
            <h3 class="titulo card-title">{{titulo}}</h3>
            <p class="descricao card-text">{{descricao}}</p>
            <p class="preco card-text"><spam>$ </spam>{{preco}}</p>
            
            <slot></slot>
        </div>
    </div>

</template>

<script>
    export default {
       props: ['titulo','imagem','descricao','preco','url']
    }
</script>

<style scoped>

    .cardProduto {
        display: flex;
    }
    
   .imagem {
       width: 40%;
       border-radius: 10px;
   }

   .imagem img {
       height: 225px;
       width: 190px;
   }

   .infos {
       width: 60%;
       margin-left: 10px;
       border-radius: 15px;
   }

   .titulo{
       font-size: 30px;
       color: blue;
   }

   .descricao {
       font-size: 20px;
   }

   .preco {
       color: green;
       font-size: 20px;
   }

</style>
