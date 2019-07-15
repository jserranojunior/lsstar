<?php

namespace App\Models\v1\Tables;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\v1\Clientes\Clientes;

class casas extends Model
{
    protected $table = "casas";    

    public function index($request){
        $casas = self::all();
         // Filtro
         if($request->status == 'Todos'){
            $casas = $casas->where('id', '>', '')->sortBy('nome');             
        }
         elseif($request->status > ''){
            $casas = $casas->where('status', $request->status);
        }
        return $casas;

    }
    

    public function store($request){ 
        
        if($request->cliente_id > '' or $request->cliente_id > null)
        {
            $request['status'] = "Vendida";
        }

    

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

        if($request->cliente_id !== ''){
            $this->cliente = new Clientes;
            $this->cliente->atualizarTipoCliente($request->cliente_id, "proprietario");
        }

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

       foreach($casa as $item){
        $selectProprietario = DB::table('clientes')->where('id', $item->cliente_id)->get();
        foreach($selectProprietario as $proprietario){
            $item->cliente_nome = $proprietario->nome;
        }     
       }   

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

        $this->cliente = new Clientes;

        if($request->cliente_id !== ''){
            $this->cliente->atualizarTipoCliente($request->cliente_id, "proprietario");
        }else{
            $select = DB::table($this->table)->select('cliente_id')->where('id', $id)->take(1)->get();
            foreach($select as $item){
                $this->cliente->atualizarTipoCliente($item->cliente_id, "");
            }           
        }

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
