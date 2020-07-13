<template>
    <div class="cardProduto">
        <div class="row no-gutters bg-light position-relative">
            <div class="col-md-6 mb-md-0 p-md-4">
                <img v-bind:src="imagem" class="w-100" alt="...">
            </div>
            <div class="col-md-6 position-static p-4 pl-md-0">
                <h5 class="mt-0">{{titulo}}</h5>
                <p>{{descricao}}</p>
                <p class="stretched-link"><spam>$ </spam>{{preco}}</p>
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
       props: ['titulo','imagem','descricao','preco','url']
    }
</script>

<style scoped>

</style>
