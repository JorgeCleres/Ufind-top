@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Cadastro</div>

                <div class="card-body">
                <form action="{{route('editarusuario.update', 1)}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="put"></inpunt>
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" required placeholder="Nome" name="name"  value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
   
                            <input type="text" class="form-control" class="tel" name="tel" id="tel" required placeholder="Telefone"  maxlength="15"/>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="cep" name="cep" size="10" maxlength="9" onblur="pesquisacep(this.value);" pattern="^[0-9]+$" required placeholder="CEP"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="rua" name="rua" required placeholder="Rua dos Bobos, nº 0" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="numero"  name="numero" pattern="^[a-zA-Z 0-9]+$" required placeholder="nº 0">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="cidade" name="cidade" pattern="^[ a-zA-Z]+$" required placeholder="Cidade" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control"  id="uf" name="uf" pattern="^[ a-zA-Z]+$" required placeholder="Estado" readonly>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="bairro" name="bairro" pattern="^[ a-zA-Z]+$" required placeholder="Bairro" readonly>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Salvar') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
      $('#tel').mask('(00) 0000-0000');
      });   

    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            //document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            //document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                //document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

</script>
@endsection
