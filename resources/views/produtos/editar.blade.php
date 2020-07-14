@extends('layouts.app')

@section('content')
<div class="container">
  <border>
    <div class="tituloAdicEditar">
      <p>Editar<p>
    </div>
    <div class="col-md-10 col-md-offset-3"> 
        <div id="formContent">
          <form class="needs-validation" novalidate action="{{route('produtos.atualizar',$registro->id)}}" method="post" enctype="multipart/form-data">
            <div class="form-row">
              {{ csrf_field() }}
              <input type="hidden" name="_method" value="put">
              @include('produtos._form')
              <div class="form-group">
                <div class="col-md-6 col-md-offset-2" style="display: block; margin-left: auto;">
                  <botao
                    classe="btn btn-primary btn-lg"
                    name="Salvar"
                    tipo="submit"
                  ></botao>
                </div>
              </div>
            </diV>
          </form>
        </div>
    </div>
</border>
</div>
<style>
    p{
        text-align: center !important;
        font-size: 50px !important;
    }

    .col-md-8 {
      display: block;
      margin-left: auto;
    }
    
</style>

@endsection
