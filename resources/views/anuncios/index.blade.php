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
        <center>
        <div class="card  " style="max-width: 800px;">
            <div class="row ">
                <div class="col-8">
                <img :src="$store.state.item.imagem" class="card-img" alt="..." >
                </div>
                <div class="col-4">
                <div class="card-body">
                    <h3 class="card-title"><strong>@{{$store.state.item.titulo}}</strong></h3>
                    </br>
                    <h5><strong>Descrição:</strong></h5>
                    <h4 class="card-text">@{{$store.state.item.descricao}}</h4>
                    </br>
                    <h5><strong>Preço:</strong></h5>
                    <h4 class="card-text"><span>$ </span>@{{$store.state.item.preco}}</h4>
                    <whats
                        :itens="{{json_encode($user)}}"
                    ></whats>
                </div>
                </div>
            </div>
        </div>
        </center>
    </modal>
</div>
@endsection