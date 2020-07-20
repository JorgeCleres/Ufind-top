<div class="col-md-12 mb-2">
    <label>Titulo</label>
    <input type="text" name="titulo" class="form-control" maxlength="30" required/>
</div>

    <div class="col-md-12 mb-2">
        <label>Descrição</label>
        <textarea type="text" name="descricao" id="descricao" class="form-control" maxlength="200" required></textarea>
    </div>

    <div class="col-md-12 mb-2">
        <label>Preço</label>
        <input type="text" name="preco" id="preco" class="form-control" maxlength="15" required/>
    </div>

    <div class="col-md-12 mb-2">
      <input type="file" class="form-control-file" multiple="multiple" name="imagem[]" id="addFotoGaleria" required>
        <div class="galeria"></div>
    </div>
</div>
