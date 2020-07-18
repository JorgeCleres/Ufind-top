<template>
    <div class="">
        <div class="whats" v-for="(item, index) in itens" :key="index">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
            <a :href="'https://wa.me/55' + item.tel + '?text=Olá%20gostaria%20de%20fazer%20um%20orçamento!'" target="_blank">
            <i style="margin-top:16px" class="fa fa-whatsapp"></i>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['itens']
    }
</script>

<style scoped>

    .whats {
        display: grid;
    }
    .whats a {
        background-repeat: no-repeat;
        width: 41px;
        height: 42px;
        bottom: 30px;
        right: 0px;
        background-color: #25d366;
        color: #FFF;
        border-radius: 160px;
        text-align: center;
        /* font-size: 23px; */
        box-shadow: 0px 1px 2px #888;
    }
</style>
