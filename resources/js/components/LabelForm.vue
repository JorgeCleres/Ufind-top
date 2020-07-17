<template>
    <div>
        <label>{{name}}</label>
    </div>
</template>

<script>
    export default {
        props: ['name'],
    }
</script>

<style scoped>
    label {
        font-size: 20px;
    }
</style>
