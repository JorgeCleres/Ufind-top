<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class EditarUserController extends Controller
{
    public function index()
    {
        //$id = Auth()->id();
       // $usuario = User::select('id')->where('id','=',$id)->get();
        return view('editarusuario.index');

    }

    public function update(Request $req, $id)
    {
        $req->all();
        $dados = $req->all();

        $id = Auth()->id();
        $rua = Auth()->user()->rua;
        $num = Auth()->user()->numero;
        $cidade = Auth()->user()->cidade;
        $address = $rua."+".$num."+".$cidade;
        $prepAddress = str_replace(' ','+',$address);
        $geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddress.'&key=AIzaSyAWAkZ64JH2YCr7z6-rhYi13K4Z3uy3Ow0');
        $output= json_decode($geocode);
        $lat = $output->results[0]->geometry->location->lat;
        $lng = $output->results[0]->geometry->location->lng;
        $dados['lat'] = $lat;
        $dados['lng'] = $lng;

        User::find($id)->update($dados);
        $registros = User::all();
        return view('home', compact('registros'));    

    }
}
