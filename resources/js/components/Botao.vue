<template>
    <v-app>
        <div class="my-2">
            <v-btn :color="color">{{name}}</v-btn>
        </div>
    </v-app>
</template>

<script>
    export default {
        props: ['name','color']
    }
</script>
