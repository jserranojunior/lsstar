<?php

namespace App\Models\cliente;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\tables\casas;

class cliente extends Model
{
   

    public function atualizarTipoCliente($id, $tipocliente){
        $clientes = DB::table('clientes')
        ->where('id', $id)
        ->update(["tipocliente" => $tipocliente]);     
    }

    public function atualizar($request){
        $id = $request->id;
        $nome = trim($request->nome);

        if($request->empreendimento > ""){
            $updateCasa =  DB::table('casas')
            ->where('id', $request->empreendimento)
            ->update(['cliente_id' => $id, 'status' => 'Vendida']); 

            $request->tipocliente = "proprietario";
        }

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

        $casas = DB::table('casas')->where('status', 'À venda')->orWhere('status', 'construção')->get();

        
        $agendamento = DB::table("agendamento")
        ->where("id_cliente", $id)
        ->get();

        foreach($agendamento as $agenda){
            $agenda->data = date("d/m/Y", strtotime($agenda->data));
        }
        
        $clientes = DB::table('clientes')
        ->where('id', $id)
        ->get();

        foreach($clientes as $cliente){
            if($cliente->tipocliente == "proprietario"){
                $selectMinhaCasa = DB::table('casas')->select('id','nome','numero')->take(1)->where('cliente_id', $cliente->id)->get();
                foreach($selectMinhaCasa as $minhaCasa){
                    $cliente->casa = $minhaCasa->id;
                    $cliente->casa_nome = $minhaCasa->nome;
                    $cliente->casa_numero = $minhaCasa->numero;
                }
            }else{
                $cliente->casa = '';
                    $cliente->casa_nome = '';

            }
        }
        

        $dados = array('dados' => $clientes,'agendamentos' => $agendamento, 'casas' => $casas);
        return($dados);

    }

    public function index($request){
       
        $clientes = DB::table('clientes')->orderBy('id', 'asc')->get();

        
        // Filtro
        if($request->tipocliente == 'proprietario'){
        $clientes = DB::table('clientes')
            ->where('tipocliente', $request->tipocliente)
            ->orderBy('id', 'asc')
            ->get();

            foreach($clientes as $cliente){
                $this->casas = new casas;
                $this->casas = $this->casas::where('cliente_id', $cliente->id)->get();

                // dd($this->casas);
                foreach($this->casas as $casa){

                    $cliente->nome_empreendimento = $casa->nome;
                    $cliente->numero_empreendimento = $casa->numero; 
                }
                
            }

            // dd($clientes);
        }else{
            $clientes = DB::table('clientes')
            ->where('tipocliente','<>', 'proprietario')
            ->orWhere('tipocliente', null)
            ->orderBy('id', 'asc')
            ->get();
        }

        

        $dados = array('dados' => $clientes,'tipocliente' => $request->tipocliente);
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
            'tipocliente' => "",
        
        );  

    
        DB::table('clientes')->insert($dados);    
   }
}
