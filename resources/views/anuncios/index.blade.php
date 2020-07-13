@extends('layouts.app')

@section('content')
    <div class="container">
    <example></example>
        <border>
        @foreach($registros as $registro)
            <card-produto
                titulo={{$registro->titulo}}
                imagem={{$registro->imagem}}
                descricao={{$registro->descricao}}
                preco={{$registro->preco}}
                >
            </card-produto>
        @endforeach
        </border>
    </div>
@endsection