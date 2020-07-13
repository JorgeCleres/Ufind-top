<template>
    <button :type="tipo" :class="classe">{{name}}</button>
</template>

<script>
    export default {
        props: ['classe','name','tipo']
    }
</script>
<style scoped>
    button {
        color: white;
    }
</style>
