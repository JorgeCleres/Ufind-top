<div class="col-md-12 mb-2">
    <label>Titulo</label>
    <input type="text" name="titulo" class="form-control" required />
</div>

    <div class="col-md-12 mb-2">
        <label>Descrição</label>
        <input type="text" name="descricao" class="form-control" required />
    </div>

    <div class="col-md-12 mb-2">
        <label>Preço</label>
        <input type="text" name="preco" id="preco" class="form-control" required />
    </div>

    <div class="col-md-12 mb-2">
      <input type="file" class="form-control-file" multiple="multiple" name="imagem">
    </div>
    @if(isset($registro->imagem))
    <div class="imagem">
        <img style="width:150px" src="{{asset($registro->imagem)}}"/>
    </div>
    @endif
</div>
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