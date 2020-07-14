<template>
    <div class="card" style="width: 18rem;">
        <img v-bind:src="imagem" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{titulo}}</h5>
            <p class="card-text">{{descricao}}</p>
            <p class=""><spam>$ </spam>{{preco}}</p>
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
