<template>
    <div class="panel panel-primary">
        <div class="panel-heading">{{titulo}}</div>
            <div class="panel-body">
                <slot></slot>
            </div>
    </div>
</template>

<script>
    export default {
        props: ['titulo']
    }
</script>
<style scoped>
    .row {
        margin-left: 50px;
    }
    .border {
        border: 8px solid black;
        border-radius: 14px;
        margin: 1px;
    }
</style>
