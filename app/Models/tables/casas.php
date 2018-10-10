<?php

namespace App\Models\tables;

use Illuminate\Database\Eloquent\Model;
use DB;

class casas extends Model
{
    protected $table = "casas";
    

    public function store($request){

      

        $dados = [
            'nome' => $request->nome,
            'numero' => $request->numero,
            'logradouro' => $request->logradouro,
            'rgi' => $request->rgi,
            'status' => $request->status,
            'cliente_id' => $request->cliente_id,

            'numero_matricula' => $request->numero_matricula,
            'data_matricula' => $request->data_matricula,
            'cep' => $request->cep,
            'bairro' => $request->bairro,
            'numero_instalacao_luz' => $request->numero_instalacao_luz,
            'fornecedor_luz' => $request->fornecedor_luz,
            'numero_iptu' => $request->numero_iptu,
            'numero_habitese' => $request->numero_habitese,
            'data_habitese' => $request->data_habitese,
            'alvara' => $request->alvara,
            'data_alvara' => $request->data_alvara,

        ];
        try{
            DB::table($this->table)->insert($dados);
            $message = 'cadastrado';
        }catch(\Exception $error){
            $message = $error;
        }
        $retorno = ['casa' => $dados, 'message' => $message];        
        return($retorno);
    }

    public function edit($id){    
       $casa = DB::table($this->table)->where('id', $id)->get();
       $dados = ['casa' => $casa];
       return $dados;
    }

    public function atualizar($request, $id){
        $dados = [
            'nome' => $request->nome,
            'numero' => $request->numero,
            'logradouro' => $request->logradouro,
            'rgi' => $request->rgi,
            'status' => $request->status,
            'cliente_id' => $request->cliente_id,

            'numero_matricula' => $request->numero_matricula,
            'data_matricula' => $request->data_matricula,
            'cep' => $request->cep,
            'bairro' => $request->bairro,
            'numero_instalacao_luz' => $request->numero_instalacao_luz,
            'fornecedor_luz' => $request->fornecedor_luz,
            'numero_iptu' => $request->numero_iptu,
            'numero_habitese' => $request->numero_habitese,
            'data_habitese' => $request->data_habitese,
            'alvara' => $request->alvara,
            'data_alvara' => $request->data_alvara,
        ];

        try{
            $update = DB::table($this->table)->where('id', $id)->update($dados);            
            $message = 'Atualizado';
        }catch(\Exception $error){
            $message = $error;
        }
        $retorno = ['casa' => $dados, 'message' => $message];        
        return $retorno;

    }   
}
