<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
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
        $registros = Produto::all();
        //$registros = json_encode(Produto::all()); ->paginate(1)
        //$registros = Produto::select('id','titulo','descricao', 'imagem','preco')->paginate(1);
        //$user = User::table('tel')->select('id','=',$id)->get();
        $user = User::select('tel')->where('id','=',$id)->get();

        return view('anuncios.index',compact('registros','user'));
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
