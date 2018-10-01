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
            'endereco' => $request->endereco,
            'rgi' => $request->rgi,
            'status' => $request->status,
            'cliente_id' => $request->cliente_id,
        ];
        try{
            DB::table($this->table)->insert($dados);
            $message = 'cadastrado';
        }catch(\Exception $error){
            $message = $error;
        }
        $retorno = ['casa' => $dados, 'message' => $message];        
        return $retorno;
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
            'endereco' => $request->endereco,
            'rgi' => $request->rgi,
            'status' => $request->status,
            'cliente_id' => $request->cliente_id,
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
