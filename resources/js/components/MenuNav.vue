<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
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
        height: 80px;
        box-shadow: 5px 5px 5px rgba(176,176,176,0.5);
        background-color: #fefcfc;
        z-index: 9;
    }
</style>

