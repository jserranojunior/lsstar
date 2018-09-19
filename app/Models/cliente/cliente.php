<?php

namespace App\Models\cliente;

use Illuminate\Database\Eloquent\Model;
use DB;

class cliente extends Model
{
    public function atualizar($request){
        $id = $request->id;
        $nome = trim($request->nome);

        $dados = array(        
        'nome' => $nome,
        'idade' => $request->idade,
        'email' =>$request->email,
        'telefone' => $request->telefone,
        'profissao' => $request->profissao,
        'empresa' => $request->empresa,

        'segundonome' => $request->segundonome,
        'segundoemail' =>$request->segundoemail,
        'segundotelefone' => $request->segundotelefone,
        'segundoprofissao' => $request->segundoprofissao,
        'segundoempresa' => $request->segundoempresa,

        'terceironome' => $request->terceironome,
        'terceiroemail' =>$request->terceiroemail,
        'terceirotelefone' => $request->terceirotelefone,
        'terceiroprofissao' => $request->terceiroprofissao,
        'terceiroempresa' => $request->terceiroempresa,

        'cep' => $request->cep,
        'bairro' => $request->bairro,
        'logradouro' => $request->logradouro,
        'tipomoradia' => $request->tipomoradia,
        'numero' => $request->numero,       
        'cidade' => $request->cidade,  
        'casainteresse' => $request->casainteresse,
        'renda' => $request->renda,
        
        'sinal' => $request->sinal,
        'poupanca' => $request->poupanca,
        'fgts' => $request->fgts,
        'valorentrada' => $request->valorentrada,
        'financiado' => $request->financiado,
        'prestacao' => $request->prestacao,

        'valorprestacao' => $request->valorprestacao,
        'informacao' => $request->informacao,

        'observacao' => $request->observacao,
        'tipocliente' => $request->tipocliente,
      
        );  

    
        DB::table('clientes')
            ->where('id', $id)
            ->update($dados);    
        
    }

    public function editar($id){

        $agendamento = DB::table("agendamento")
        ->where("id_cliente", $id)
        ->get();

        foreach($agendamento as $agenda){
            $agenda->data = date("d/m/Y", strtotime($agenda->data));
        }
        
        $clientes = DB::table('clientes')
        ->where('id', $id)
        ->get();
        $dados = array('dados' => $clientes,'agendamentos' => $agendamento);
        return($dados);

    }

    public function index($request){
       
        $clientes = DB::table('clientes')->get();

        // Filtro
        if($request->tipocliente > ''){
            $clientes = DB::table('clientes')
            ->where('tipocliente', $request->tipocliente)
            ->get();
        }

        $dados = array('dados' => $clientes);
        return($dados);
    }

   public function salvar($request){

   
        $nome = trim($request->nome);
        
        $dados = array(
            'nome' => $nome,
            'idade' => $request->idade,
            'email' =>$request->email,
            'telefone' => $request->telefone,
            'profissao' => $request->profissao,
            'empresa' => $request->empresa,
            'segundonome' => $request->segundonome,
            'segundoemail' =>$request->segundoemail,
            'segundotelefone' => $request->segundotelefone,
            'segundoprofissao' => $request->segundoprofissao,
            'segundoempresa' => $request->segundoempresa,
            'terceironome' => $request->terceironome,
            'terceiroemail' =>$request->terceiroemail,
            'terceirotelefone' => $request->terceirotelefone,
            'terceiroprofissao' => $request->terceiroprofissao,
            'terceiroempresa' => $request->terceiroempresa,
            'cep' => $request->cep,
            'bairro' => $request->bairro,
            'logradouro' => $request->logradouro,
            'tipomoradia' => $request->tipomoradia,
            'numero' => $request->numero,       
            'cidade' => $request->cidade,  
            'casainteresse' => $request->casainteresse,
            'renda' => $request->renda,            
            'sinal' => $request->sinal,
            'poupanca' => $request->poupanca,
            'fgts' => $request->fgts,
            'valorentrada' => $request->valorentrada,
            'financiado' => $request->financiado,
            'prestacao' => $request->prestacao,
            'valorprestacao' => $request->valorprestacao,
            'informacao' => $request->informacao,
            'observacao' => $request->observacao,
            'tipocliente' => $request->tipocliente,
        
        );  

    
        DB::table('clientes')->insert($dados);    
   }
}
