<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\ImagemProduto;
use App\User;

class ProdutoController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }
    public function index()
    {
        $id = Auth()->id();
        $registros = Produto::where('usuario_id','=', $id)->get();
        $produto_id = Produto::where('usuario_id','=', $id)->get();
        $imagens = ImagemProduto::all();
        return view('produtos.index',compact('registros', 'imagens', 'produto_id'));
    }

    public function anunciar()
    {
        return view('produtos.anunciar');
    }

    public function show($id)
    {
        return Produto::find($id);
    }

    public function salvar(Request $req)
    {
        $usuario_id = Auth()->id();
        $req->all();
        $dados =$req->all();
        $id = Auth()->id();

        $validacao = \Validator::make($dados,[
            "titulo" => "required",
            "descricao" => "required",
            "preco" => "required",
            "imagem" => "required"
        ]);

        if($validacao->fails()){
            return redirect()->back()->withErrors($validacao)->withInput();
        }

        $produto = new Produto();
        $produto->titulo = $req->titulo;
        $produto->descricao = $req->descricao;
        $produto->preco = $req->preco;
        $produto->usuario_id = $usuario_id;

        //transformando endereço em lat e long
        $rua = Auth()->user()->rua;
        $num = Auth()->user()->numero;
        $cidade = Auth()->user()->cidade;
        $address = $rua."+".$num."+".$cidade;
        $prepAddress = str_replace(' ','+',$address);
        $geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddress.'&key=AIzaSyAWAkZ64JH2YCr7z6-rhYi13K4Z3uy3Ow0');
        $output= json_decode($geocode);
        $lat = $output->results[0]->geometry->location->lat;
        $lng = $output->results[0]->geometry->location->lng;
        $produto->lat = $lat;
        $produto->lng = $lng;

        

        $imagem = $req->imagem[0];
        $dir = "img/produtos/";
        $numRand = rand(1111,9999);
        $extensaoImage = $imagem->guessClientExtension();
        $nomeImagem = "imagem_".$numRand.".".$extensaoImage;
        $produto->imagem = $imagem->move($dir, $nomeImagem);
        $produto->save();

        for($i = 1; $i < count($req->allFiles()['imagem']); $i++){
           
            $file = $req->allFiles()['imagem'][$i];
            $productImage = new ImagemProduto();
            $productImage->produto_id = $produto->id;
            $dir = "img/produtos/";
            $numRand = rand(1111,9999);
            $extensaoImage = $file->guessClientExtension();
            $nomeImagem = "imagem_".$numRand.".".$extensaoImage;
            $productImage->foto = $file->move($dir, $nomeImagem);
            $productImage->save();
            unset($productImage);
        }
        

        return redirect()->route('produtos');
    }

    public function editar($id, $usuario)
    {
        $usuario = $usuario;
        $usuario_id = Auth()->id();

        if ($usuario_id == $usuario) {
            $registro = Produto::find($id);
            return view('produtos.editar',compact('registro'));
        }else{
            return redirect()->route('admin.produtos');
        }
    }

    public function update (Request $req, $id)
    {
        $usuario_id = Auth()->id();
        $req->all();
        $dados = $req->all();
        
        $produto = new Produto();
        $teste = $id;

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

        if($req->hasFile('imagem')){
            $imagem = $req->imagem[0];
            $dir = "img/produtos/";
            $numRand = rand(1111,9999);
            $extensaoImage = $imagem->guessClientExtension();
            $nomeImagem = "imagem_".$numRand.".".$extensaoImage;
            $dados['imagem'] = $imagem->move($dir, $nomeImagem);
        }
        Produto::find($id)->update($dados);

        
        ImagemProduto::where('produto_id','=', $teste)->delete();

        
        if($req->hasFile('imagem')){
            for($i = 1; $i < count($req->allFiles()['imagem']); $i++){
                $file = $req->allFiles()['imagem'][$i];
                $productImage = new ImagemProduto();
                //salvando o id do produto na tabela imagemProduto na campo produto_id
                $productImage->produto_id = $teste;
                //dd($productImage->produto_id);
                //$productImage->foto = $file->store('produtos');
                $dir = "img/produtos/";
                $numRand = rand(1111,9999);
                $extensaoImage = $file->guessClientExtension();
                $nomeImagem = "imagem_".$numRand.".".$extensaoImage;
                $productImage->foto = $file->move($dir, $nomeImagem);
                $productImage->save();
                unset($productImage);
            }
        }
        
        return redirect()->route('produtos');
    }


    public function deletar($id, $usuario)
    {
        //pega o id od usuario que está no banco de dados
        $usuario = $usuario;
        //pega o id do usuario que esta logado
        $usuario_id = Auth()->id();

        if ($usuario_id == $usuario) {
            Produto::find($id)->delete();
        }
        return redirect()->route('produtos');
        
    }

    public function destroy($id)
    {
        Produto::find($id)->delete();
        return redirect()->route('produtos');
    }
}
