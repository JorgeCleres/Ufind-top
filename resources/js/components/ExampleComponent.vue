<template>
    <div>
        <button 
        v-if="teste"
        v-on:click="alerta()">{{name}}</button>
    </div>
</template>

<script>
    export default {
        props: ['name','teste'],
        methods: {
            alerta() {
                alert("olha eu ");
                return this.teste = false

            }
        }
    }
</script>
