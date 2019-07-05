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
}
