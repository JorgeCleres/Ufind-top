<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagemProduto extends Model
{
    protected $fillable = [
        'produto_id', 'foto'
    ];
}
