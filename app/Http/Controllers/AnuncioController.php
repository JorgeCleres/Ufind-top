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
        $registros = Produto::where('usuario_id', '!=', $id)->get();
        $imagens = ImagemProduto::all();
        $user = User::select('tel')->where('id','=',$id)->get();
        

        return view('anuncios.index',compact('registros','user', 'imagens'));
    }

    public function info($id)
    {
        $registros = Produto::where('id','=',$id)->get(); 
        return view('anuncios.info',compact('registros'));

    }
}
