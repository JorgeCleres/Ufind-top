<div class="form-group col-md-8">
        <input type="text" name="titulo" value="{{isset($registro->titulo) ? $registro->titulo : ''}}" class="form-control" placeholder="Titulo"/>
    </div>
</div>

    <div class="form-row">
        <div class="form-group col-md-8">
            <input type="text" name="descricao" value="{{isset($registro->descricao) ? $registro->descricao : ''}}" class="form-control" placeholder="Descrição"/>
        </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-2">
          <input type="text" name="preco" id="preco" value="{{isset($registro->preco) ? $registro->preco : ''}}" class="form-control" placeholder="Preço"/>
        </div>
    </div>

    <div class="form-group">
      <input type="file" class="form-control-file" name="imagem">
    </div>
    @if(isset($registro->imagem))
    <div class="imagem">
        <img style="width:150px" src="{{asset($registro->imagem)}}"/>
    </div>
    @endif
<script>

    var mask = {
        money: function() {
            var el = this
            ,exec = function(v) {
                v = v.replace(/\D/g,"");
                v = new String(Number(v));
                var len = v.length;
                if (1== len)
                v = v.replace(/(\d)/,"0.0$1");
                else if (2 == len)
                v = v.replace(/(\d)/,"0.$1");
                else if (len > 2) {
                v = v.replace(/(\d{2})$/,'.$1');
            }
            return v;
            };

            setTimeout(function(){
            el.value = exec(el.value);
            },1);
        }
    }

    $(function(){
        $('#preco').bind('keypress',mask.money)
    });
</script> 