@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @foreach($registros as $registro)
            <border>
                <card-produto
                    titulo={{$registro->titulo}}
                    imagem={{$registro->imagem}}
                    descricao={{$registro->descricao}}
                    preco={{$registro->preco}}
                    >
                    <a href="{{route('produtos.editar',['id' => $registro->id, 'usuario_id'=>$registro->usuario_id])}}" alt="">Editar</a>
                    <a href="{{route('produtos.deletar',['id' => $registro->id, 'usuario_id'=>$registro->usuario_id])}}" alt="">Deletar</a>
                </card-produto>
            </border>
        @endforeach
        </div>
    </div>
</div>
@endsection
