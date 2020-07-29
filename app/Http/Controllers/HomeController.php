<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Produto;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth()->id();
        $registros = Produto::where('usuario_id','!=',$id)->get();
        //$registros = Produto::select('lat','lng')->where('usuario_id','=',$id)->get();
        $users = User::where('id','!=',$id)->get();
        
        return view('home',compact('registros','users'));
    }
}
