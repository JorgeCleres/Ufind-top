<template>
    <div class="border">
        <slot></slot>
    </div>
</template>

<script>
    export default {
        
    }
</script>
<style scoped>
    .border {
        border: 1px solid black;
        border-radius: 14px;
        margin: 15px;
    }
</style>
