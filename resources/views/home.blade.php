@extends('layouts.app')

@section('content')
<div class="container">
    <mapa
        :itens="{{json_encode($registros)}}"
        
    ></mapa>
</div>
@endsection
