<?php

namespace App\Models\v1\Clientes;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\tables\casas;

class Clientes extends Model
{
   public $table = "clientes";

   protected $fillable = ['nome', 'email', 'telefone', 'idade', 'profissao',  'empresa', 'rg', 'cpf',
   'segundonome', 'segundoemail', 'segundotelefone', 'segundoidade', 'segundoprofissao',  'segundoempresa',
   'terceironome', 'terceiroemail', 'terceirotelefone', 'terceiroidade', 'terceiroprofissao',  'terceiroempresa', 
   'cep', 'bairro','logradouro', 'tipomoradia','numero','cidade', 'evento_palmas', 'data_visita', 'indicacao',
  'casainteresse', 'renda', 'sinal', 'poupanca', 'fgts', 'valorentrada', 'financiado', 'prestacao',
'observacao', 'valorprestacao','informacao', 'tipocliente', 'cpf', 'rg'
];

public function lasPalmasIndex(){
    $clientes = DB::table('clientes')->where('evento_palmas', 1)->get();

    foreach($clientes as $cliente){
        
        $agendamentos = DB::table('agendamento')->where('id_cliente', $cliente->id)->get();

        foreach($agendamentos as $agenda){             
            if($agenda > ''){
                $cliente->data_agenda = $agenda->data;
            }else{
                $cliente->data_agenda = '';
            }
        }
        
       
       
    }

    return $clientes;
}

public function Todos($request){
   $clientes = DB::table('clientes')->orderBy('id', 'asc')->get();  
   $clientes = DB::table('clientes')      
       ->orderBy('id', 'asc')
       ->get();
       foreach($clientes as $cliente){
           $this->casas = new casas;
           $this->casas = $this->casas::where('cliente_id', $cliente->id)->get();
           foreach($this->casas as $casa){
               $cliente->nome_empreendimento = $casa->nome;
               $cliente->numero_empreendimento = $casa->numero; 
           }           
       }       
       if($request->tipocliente == 'proprietarios'){
         $clientes = $clientes->where('tipocliente','=', 'proprietario');
       }elseif($request->tipocliente == 'clientes'){
         $clientes = $clientes->where('tipocliente','!=', 'proprietario');
       }elseif($request->tipocliente == 'todos'){         
         $clientes = $clientes->sortBy('nome');            
       }

   return($clientes);
}

   public function cadastrar($request){
       $clientes = new clientes;
    $clientes->fill($request);      
    $clientes->save();
    return $clientes;
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

            'cpf' => $request->cpf,
            'rg' => $request->rg,
    
        );  

        $atualizar = DB::table('clientes')
            ->where('id', $id)
            ->update($dados);  
            return($atualizar);
    }

    public function atualizarTipoCliente($id, $tipocliente){
        $clientes = DB::table('clientes')
        ->where('id', $id)
        ->update(["tipocliente" => $tipocliente]);     
    }
}
