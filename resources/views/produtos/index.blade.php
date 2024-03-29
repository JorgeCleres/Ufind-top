@extends('layouts.app')

@section('content')
<div class="container">

    @if($errors->all())
        @foreach($errors->all() as $key => $value)
        <li>{{$value}}</li>
        @endforeach
    @endif

    <card-meu-produto
        v-bind:itens="{{json_encode($registros)}}"
        editar="/produtos/"
        deletar="/produtos/"
        token="{{ csrf_token() }}"
        modal="sim"
        >
    </card-meu-produto>
    <modal
        nome="editar"
        classe="modal-dialog modal-lg"
        titulo="Editar">
        <formulario
            css=""
            :action="'/produtos/' + $store.state.item.id"
            method="put"
            enctype="multipart/form-data"
            token="{{ csrf_token() }}"
            id="formEditar"
        >
            <div class="col-md-12 mb-2">
                <label-form name="Titulo"></label-form>
                <input type="text" name="titulo" id="titulo" v-model="$store.state.item.titulo" class="form-control" maxlength="30"  required/>
            </div>

            <div class="col-md-12 mb-2">
            <label-form name="Descrição"></label-form>
                <textarea type="text" name="descricao" id="descricao" class="form-control" v-model="$store.state.item.descricao" maxlength="200" required></textarea>
            </div>

            <div class="col-md-12 mb-2">
            <label-form name="Preço"></label-form>
                <input type="text" name="preco" id="preco" v-model="$store.state.item.preco" onKeyUp="mascaraMoeda(this, event)" class="form-control" maxlength="15" required/>
            </div>
            
            <div class="col-md-12 mb-4">
                <input type="file" class="form-control-file" name="imagem[]" multiple="multiple" id="addFotoGaleria">
            </div>

            <div class="imagem">
                <img style="width:100px; margin: 0 15px" :src="$store.state.item.imagem"/>
                <div class="galeria"></div>
            </div>

        </formulario>
        <span slot="botoes">
            <button form="formEditar" class="btn btn-primary btn-lg">Salvar</button>
        </span>

    </modal>

    <modal
        nome="detalhe"
        titulo="detalhe"
        classe="modal-dialog modal-lg">
        
            <p>@{{$store.state.item.titulo}}<p>
            <p>@{{$store.state.item.descricao}}<p>
            <p>@{{$store.state.item.preco}}<p>
            <img style="width:250px" :src="$store.state.item.imagem"/>
        
    </modal>
    
</div>

@endsection
