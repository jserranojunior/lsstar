<?php

namespace App\Http\Controllers\Fornecedor;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\fornecedor\fornecedor;
use App\Http\Controllers\Controller;



class fornecedorController extends Controller
{
    public function update(Request $request)
    {
        $atualizar = new fornecedor();
        $atualizar = $atualizar->atualizar($request);
        return redirect('/fornecedor');
    }
    public function edit($id){
        
        $dados = new fornecedor();
        $dados = $dados->editar($id);
        $dados = array('dados' => $dados);
        return view('fornecedor/editar')->with($dados);
    }


   public function Index(){
       $dados = new fornecedor();
       $dados = $dados->listar();
        $dados = array('dados' => $dados);
       return view('fornecedor.listar')->with($dados);

    }

    public function Create(){        
        return view('fornecedor.criar');
    }
    
    public function Store(Request $request){  
        $dados = $request;      
        $fornecedor = new fornecedor();
        $cadastrar = $fornecedor->cadastrar($dados);
        return redirect('/fornecedor');
    }
}
