<?php
namespace App\Models\data;

class dataClass {
    public $dataatual;
    
    public function data_atual(){
    $dataatual = date('Y-m');
    return $dataatual;
    }

    public function mesEscrito($mes){
        switch ($mes){
            case 1: $mesEscrito = "Janeiro"; break;
            case 2: $mesEscrito = "Fevereiro"; break;
            case 3: $mesEscrito = "Março"; break;
            case 4: $mesEscrito = "Abril"; break;
            case 5: $mesEscrito = "Maio"; break;
            case 6: $mesEscrito = "Junho"; break;
            case 7: $mesEscrito = "Julho"; break;
            case 8: $mesEscrito = "Agosto"; break;
            case 9: $mesEscrito = "Setembro"; break;
            case 10: $mesEscrito = "Outubro"; break;
            case 11: $mesEscrito = "Novembro"; break;
            case 12: $mesEscrito = "Dezembro"; break;            
            }    
        return $mesEscrito;
    }
    
}
