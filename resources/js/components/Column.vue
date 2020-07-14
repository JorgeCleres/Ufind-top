<template>
    <div class="row">
        <div class="classe">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['classe']
    }
</script>
