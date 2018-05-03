<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class valor_contas_a_pagar extends Model
{
   protected $table = "valor_contas_a_pagar";

   public function valor(){
       return 15;
   }
}
