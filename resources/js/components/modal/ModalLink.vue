<template>
    <span>
        <span>
            <button v-on:click="preencheFormulario" v-if="tipo == 'button'" type="button" :class="css" data-toggle="modal" :data-target="'#' + nome">{{titulo}}</button>
            <a v-on:click="preencheFormulario" v-if="tipo == 'link'" href="#" :class="classe" :data-target="'#' + nome">{{titulo}}</a>
        </span>
        <!--
        <span v-if="!item">
            <button v-if="tipo == 'button'" type="button" :class="classe" data-toggle="modal" :data-target="'#' + nome">{{titulo}}</button>
            <a v-if="tipo == 'link'" href="#" :class="classe" data-toggle="modal" :data-target="'#' + nome">{{titulo}}</a>
        </span>
        -->
    </span>
</template>

<script>
    export default {
        props: ['tipo','nome','titulo','css','item','url'],
        methods: {
            preencheFormulario: function(){
                axios.get(this.url + this.item.id).then(res => {
                    this.$store.commit('setItem',res.data)
                });
                this.$store.commit('setItem',this.item)
            }   
        }
    }
</script>

<style scoped>
    button {
        color: white
    }
</style>
