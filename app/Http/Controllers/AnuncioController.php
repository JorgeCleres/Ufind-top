<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\ImagemProduto;
use App\User;

class AnuncioController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }
    public function index()
    {
        $id = Auth()->id();
        $registros = Produto::all()->where('id', '!=', $id);
        $imagens = ImagemProduto::all();
        $user = User::select('tel')->where('id','=',$id)->get();
        

        return view('anuncios.index',compact('registros','user', 'imagens'));
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
