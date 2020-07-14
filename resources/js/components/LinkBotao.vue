<template>
    <a :href="href" :class="classe" role="button">{{name}}</a>
</template>

<script>
    export default {
        props: ['classe','name','href','alerta'],
        methods: {
            deletar() {
                alert("olá");
            }
        }
        
    }
</script>

<style scoped>
    a {
        color: white;
    }
</style>