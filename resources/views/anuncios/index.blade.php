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
               
                @foreach($imagens as $imagem)
               
                    <img class="card-img"  widith="160px" height="220px" src="{{$imagem->foto}}">
                    <br> <br> <br>
                } 
                @endforeach
              
                <img :src="$store.state.item.imagem" widith="160px" height="220px" class="card-img" alt="..." >
                
                </div>
                <div class="col-4">
                <div class="card-body">
                    <h3 class="card-title"><strong>@{{$store.state.item.titulo}}</strong></h3>
                    </br>
                    <h5><strong>Descrição:</strong></h5>
                    <h4 class="card-text">@{{$store.state.item.descricao}}</h4>
                    </br>
                    <h5><strong>Preço:</strong></h5>
                    <h4 class="card-text"><span>R$ </span>@{{$store.state.item.preco}}</h4>
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