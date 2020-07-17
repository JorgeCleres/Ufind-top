@extends('layouts.app')

@section('content')
<div class="container">
        <border>
            <card-anuncio
                v-bind:itens="{{json_encode($registros)}}"
                >
            </card-anuncio>
        </border>
</div>
@endsection