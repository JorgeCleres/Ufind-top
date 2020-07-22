<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'titulo', 'descricao', 'imagem', 'preco', 'usuario_id'
    ];
}
