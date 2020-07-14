@extends('layouts.app')

@section('content')
<div class="container">
    <mapa
        @foreach($registros as $registro)
            :lat={{$registro->lat}}
            :lng={{$registro->lng}}
        @endforeach
    ></mapa>
</div>
@endsection
