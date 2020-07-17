<template>
    <div class="modal fade" :id="nome" tabindex="-1" role="dialog" :aria-labelledby="nome" aria-hidden="true">
        <div :class="classe">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" :id="nome">{{titulo}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <slot></slot>
            </div>
            <div class="modal-footer">
                <slot name="botoes"></slot>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['nome','titulo', 'classe']
    }
</script>

<style scoped>
    .modal-title {
        font-size: 20px;
    }
</style>
