<template>
    <div class="card-deck">
        <div class="card" v-for="(item, index) in itens" :key="index">
            <a class="btn btn-primary" href="route('chatify',  id)" role="button">Chat</a>
        </div>
    </div>
</template>


<script>
    export default {
       props: ['id']
    }
</script>

<style scoped>


</style>
