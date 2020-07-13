@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <p>Anunciar<p>
        </div>
        <div class="col-md-10 col-md-offset-3"> 
            <div id="formContent">
                <form class="form-horizontal" action="{{route('produtos.salvar')}}" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        {{ csrf_field() }}
                        @include('produtos._form')
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2" style="display: block; margin-left: auto;">
                                <botao
                                    tipo="submit"
                                    classe="btn btn-success"
                                    name="Anunciar"
                                ></botao>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
