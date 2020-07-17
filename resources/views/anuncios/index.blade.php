@extends('layouts.app')

@section('content')
<div class="container">
    <border>
        <card-anuncio
            v-bind:itens="{{json_encode($registros)}}"
            detalhe="/produtos/"
            modal="sim"
            >
        </card-anuncio>
    </border>
    <modal
        nome="detalhe"
        titulo="Detalhe"
        classe="modal-dialog modal-xl">

        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-8">
                <img :src="$store.state.item.imagem" class="card-img" alt="..." >
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><strong>@{{$store.state.item.titulo}}</strong></h5>
                    <p class="card-text">@{{$store.state.item.descricao}}</p>
                    <p class="card-text"><span>$ </span>@{{$store.state.item.preco}}</p>
                </div>
                </div>
            </div>
        </div>

        
        
</div>
@endsection