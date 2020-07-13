<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class AnuncioController extends Controller
{
    public function index()
    {
        $registros = Produto::paginate(2);
        return view('anuncios.index',compact('registros'));
    }
}
