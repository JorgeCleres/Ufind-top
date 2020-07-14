@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($registros as $registro)
            <border>
                <column
                    classe="col-2"
                >
                    <card-anuncio
                        titulo={{$registro->titulo}}
                        imagem={{$registro->imagem}}
                        descricao={{$registro->descricao}}
                        preco={{$registro->preco}}
                        >
                    </card-anuncio>
                </column>
            </border>
        @endforeach
    </div>
@endsection