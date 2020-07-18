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
        //$imagens = ImagemProduto::where('produto_id','=','id')->get();
        $imagens = ImagemProduto::all();
        return view('produtos.index',compact('registros', 'imagens'));
    }

    public function anunciar() {
        return view('produtos.anunciar');
    }

    public function show($id)
    {
        return Produto::find($id);
    }

    public function salvar(Request $req)
    {
        
        $dados = $req->all();
        $req->all();

        /*
        $validacao = \Validator::make($dados,[
            "titulo" => "required",
            "descricao" => "required",
            "preco" => "required",
            "imagem" => "required"
            
        ]);

        if($validacao->fails()){
            return redirect()->back()->withErrors($validacao)->withInput();
        }
*/
        $usuario_id = Auth()->id();
        $dados['usuario_id'] = $usuario_id;

/*
        //verifica se tem uma imagem
        if($req->hasFile('imagem')){
            //variavel vai receber a imagem
            $imagem = $req->file('imagem');
            //criando um numero randomico
            $numRand = rand(1111,9999);
            //pegando o local para salvar a imagem
            $dir = "img/produtos/";
            //pegando a extensao da imagem
            $extensaoImage = $imagem->guessClientExtension();
            //salvando na variavel a imagem+numerorand+tipo da imagem
            $nomeImagem = "imagem_".$numRand.".".$extensaoImage;
            //pegando a imagem e movendo ela
                //passando como parametro o diretorio e o nome da imagem
            $imagem->move($dir, $nomeImagem);
            //salvando no banco de dados
            $dados['imagem'] = $dir."/".$nomeImagem;
        }
*/

        ///dd($req->all());

        $produto = new Produto();
        $produto->titulo = $req->titulo;
        $produto->descricao = $req->descricao;
        $produto->preco = $req->preco;
        $produto->usuario_id = $usuario_id;
        $produto->save();

        for($i = 0; $i < (count($req->allFiles()['imagem'])); $i++){
           
            $file = $req->allFiles()['imagem'][$i];

            $productImage = new ImagemProduto();
            //salvando o id do produto na tabela imagemProduto na campo produto_id
            $productImage->produto_id = $produto->id;
            //$productImage->foto = $file->store('produtos');
            $dir = "img/produtos/";
            $numRand = rand(1111,9999);
            $extensaoImage = $file->guessClientExtension();
            $nomeImagem = "imagem_".$numRand.".".$extensaoImage;
            $productImage->foto = $file->move($dir, $nomeImagem);
            $productImage->save();
            unset($productImage);

        }


        //Produto::create($dados);

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
        $dados = $req->all();
        $validacao = \Validator::make($dados,[
            "titulo" => "required",
            "descricao" => "required",
            "preco" => "required",
            "imagem" => "required"
            
        ]);

        if($validacao->fails()){
            return redirect()->back()->withErrors($validacao)->withInput();
        }

        $usuario_id = Auth()->id();
        $dados['usuario_id'] = $usuario_id;

        //verifica se tem uma imagem
        if($req->hasFile('imagem')){
            //variavel vai receber a imagem
            $imagem = $req->file('imagem');
            //criando um numero randomico
            $numRand = rand(1111,9999);
            //pegando o local para salvar a imagem
            $dir = "img/produtos/";
            //pegando a extensao da imagem
            $extensaoImage = $imagem->guessClientExtension();
            //salvando na variavel a imagem+numerorand+tipo da imagem
            $nomeImagem = "imagem_".$numRand.".".$extensaoImage;
            //pegando a imagem e movendo ela
                //passando como parametro o diretorio e o nome da imagem
            $imagem->move($dir, $nomeImagem);
            //salvando no banco de dados
            $dados['imagem'] = $dir."/".$nomeImagem;
        }

        Produto::find($id)->update($dados);

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
