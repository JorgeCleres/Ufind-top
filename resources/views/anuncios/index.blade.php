@extends('layouts.app')

@section('content')
    <caixa>
            @foreach($registros as $registro)
            <column-two>
                <card-produto
                    titulo={{$registro->titulo}}
                    imagem={{asset($registro->imagem)}}
                    descricao={{$registro->descricao}}
                    preco={{$registro->preco}}>
                </card-produto>
            </column-two>
            @endforeach
            <div class="">
                {{$registros->links()}}
            </div>
    </caixa>
@endsection