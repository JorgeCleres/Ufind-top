@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($registros as $registro)
        <border>
            <card-meu-produto
                titulo={{$registro->titulo}}
                imagem={{$registro->imagem}}
                descricao={{$registro->descricao}}
                preco={{$registro->preco}}
                >
                <link-botao
                    classe="btn btn-primary btn-lg active"
                    href="{{route('produtos.editar',['id' => $registro->id, 'usuario_id'=>$registro->usuario_id])}}"
                    name="Editar"
                ></link-botao>
                <link-botao
                    onclick="return confirm('Deseja mesmo Excluir?');"
                    classe="btn btn-danger btn-lg active"
                    href="{{route('produtos.deletar',['id' => $registro->id, 'usuario_id'=>$registro->usuario_id])}}"
                    name="Deletar"
                ></link-botao>
            </card-meu-produto>
        </border>
    @endforeach
</div>
@endsection
