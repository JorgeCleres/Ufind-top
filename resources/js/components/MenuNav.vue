<template>
    <nav class="navbar navbar-expand-md navbar navbar-dark bg-primary">
        <slot></slot>
    </nav>
</template>

<script>
    export default {
        
    }
</script>

<style scoped>
    .navbar {
        position: fixed;
        width: 100%;
        height: 70px;
        box-shadow: 5px 5px 5px rgba(176,176,176,0.5);
        background-color: #fcfefc;
        z-index: 9;
        
    }
</style>

