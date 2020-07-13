@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($registros as $registro)
        <border>
            <card-produto
                titulo={{$registro->titulo}}
                imagem={{$registro->imagem}}
                descricao={{$registro->descricao}}
                preco={{$registro->preco}}
                >
                <link-botao
                    href="{{route('produtos.editar',['id' => $registro->id, 'usuario_id'=>$registro->usuario_id])}}"
                    name="Editar"
                    classe="btn btn-primary btn-lg"
                ></link-botao>
                <link-botao
                    href="{{route('produtos.deletar',['id' => $registro->id, 'usuario_id'=>$registro->usuario_id])}}"
                    name="Deletar"
                    classe="btn btn-danger btn-lg"
                ></link-botao>
            </card-produto>
        </border>
    @endforeach
</div>
@endsection
