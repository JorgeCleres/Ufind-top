<template>
    <a :href="href" :class="classe" role="button" aria-pressed="true">{{name}}</a>
</template>

<script>
    export default {
        props: ['classe','name','href']
    }
</script>

<style scoped>
    a {
        color: white;
    }
</style>