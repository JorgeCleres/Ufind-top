<template>
    <div class="row">
        <div class="col-md-10">
            <div class="border">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        
    }
</script>
<style scoped>
    .row {
        margin-left: 50px;
    }
    .border {
        border: 2px solid black;
        border-radius: 14px;
        margin: 1px;
    }
</style>
