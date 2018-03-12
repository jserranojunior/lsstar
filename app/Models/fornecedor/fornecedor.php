<?php

namespace App\Models\fornecedor;

use Illuminate\Database\Eloquent\Model;
use DB;


class fornecedor extends Model
{
    public function atualizar($request)
    {
        $id = $request->id;

        $dados = array(
            'fornecedor' => $request->nome,
            'cep' => $request->cep,
            'bairro' => $request->bairro,   
            'numero' => $request->numero,
            'cidade' => $request->cidade,
            'endereco' => $request->logradouro,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'celular' => $request->celular,
            'representante' => $request->representante,
            'ins_estadual' => $request->ins_estadual,
            'ins_municipal' => $request->ins_municipal,
            'banco' => $request->banco,
            'cnpj' => $request->cnpj,
            'agencia' => $request->agencia,
            'conta' => $request->conta,
            'operacao' => $request->operacao,            
        );



        DB::table('fornecedor_contas_a_pagar')
        ->where('id', $id)
        ->update($dados);
        
        
    }

    public function editar($id)
    {
        $select = DB::table('fornecedor_contas_a_pagar')
        ->where('id', $id)
        ->get();
        
        return($select);
    }

    public function listar(){
        $fornecedores = DB::table('fornecedor_contas_a_pagar')
        ->get();
        return($fornecedores);
    }    

    public function cadastrar($request){
        $dados = array(
            'fornecedor' => $request->nome,
            'cep' => $request->cep,
            'bairro' => $request->bairro,   
            'numero' => $request->numero,
            'cidade' => $request->cidade,
            'endereco' => $request->logradouro,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'celular' => $request->celular,
            'representante' => $request->representante,
            'ins_estadual' => $request->ins_estadual,
            'ins_municipal' => $request->ins_municipal,
            'banco' => $request->banco,
            'cnpj' => $request->cnpj,
            'agencia' => $request->agencia,
            'conta' => $request->conta,
            'operacao' => $request->operacao,            
        );
       try{
       DB::table('fornecedor_contas_a_pagar')
       ->insert($dados);

       }catch(\Excepetion $e){
           dd($e);
       }
    }
   
}
