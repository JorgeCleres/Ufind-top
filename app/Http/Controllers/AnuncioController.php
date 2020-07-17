<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class AnuncioController extends Controller
{
    public function index()
    {
        $registros = Produto::all();
        //$registros = json_encode(Produto::all()); ->paginate(1)
        //$registros = Produto::select('id','titulo','descricao', 'imagem','preco')->paginate(1);
        return view('anuncios.index',compact('registros'));
    }

    public function info($id)
    {
        $registros = Produto::where('id','=',$id)->get();
        //$registros = Produto::all();
        //$registro = Produto::find($id);
        return view('anuncios.info',compact('registros'));
        //return dd($id);
    }
}
