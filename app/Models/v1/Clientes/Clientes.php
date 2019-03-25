<?php

namespace App\Models\v1\Clientes;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
   public $table = "clientes";

   protected $fillable = ['nome', 'email', 'telefone', 'profissao', 'idade', 'empresa',
   'cep', 'bairro','logradouro', 'tipomoradia','numero','cidade'
];

   public function cadastrar($request){
       $clientes = new clientes;
    $clientes->fill($request);      
    $clientes->save();
   }
}
