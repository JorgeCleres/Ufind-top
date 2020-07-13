@extends('layouts.app')

@section('content')
<caixa>
    <div class="tituloAdicEditar">
      <p>Editar<p>
    </div>
    <div class="col-md-10 col-md-offset-3"> 
        <div id="formContent">
          <form class="form-horizontal" action="{{route('produtos.atualizar',$registro->id)}}" method="post" enctype="multipart/form-data">
            <div class="form-row">
              {{ csrf_field() }}
              <input type="hidden" name="_method" value="put">
              @include('produtos._form')
              <div class="form-group">
                <div class="col-md-6 col-md-offset-2" style="display: block; margin-left: auto;">
                  <button type="submit" class="btn btn-primary" style="width: 100px; height: 70px">
                      Salvar
                  </button>
                </div>
              </div>
            </diV>
          </form>
        </div>
    </div>
</caixa>

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
