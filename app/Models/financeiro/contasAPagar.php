<?php

namespace App\Models\financeiro;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\financeiro\valorContasAPagar;

class contasAPagar extends Model
{
    protected $table = "contas_a_pagar";

    public function valorContasAPagar()
    {
        
        return $this->hasOne('App\Models\Financeiro\valorContasAPagar');
    }

    public function allBillsPay(){
        $this->bills = self::all(); 
        return($this->bills);
    }

    public function allPayMounth(){
        $this->bills = $this->allBillsPay();

        $this->bills = $this->bills->where('inicio_conta','>=','2017-06-01')        
                        ->where('inicio_conta','<=','2017-06-30');            
        $this->bills =  $this->bills->where('area','Jardim Asturias');

       echo $this->bills->id;

        return($this->bills);

    }
    

    



}
