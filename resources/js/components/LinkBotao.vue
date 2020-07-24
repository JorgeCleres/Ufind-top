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
        background-color: #589ef5;
        border: 1px solid #589ef9;
        box-shadow: 2px 2px #888888;
        color: rgb(248, 248, 248);
        margin: -4px 7px;
    }
</style>