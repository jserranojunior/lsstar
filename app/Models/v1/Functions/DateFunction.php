<?php

namespace App\Models\v1\Functions;

use Illuminate\Database\Eloquent\Model;

class DateFunction extends Model
{
    public function financeiroIndex($data, $diaInicial, $diaFinal){

        $mesAtual = date('m',strtotime($data));
        $mesAtualEscrito = $this->mesEscrito($mesAtual);
        $meses = $this->meses();
        $anos = $this->anos();

        $dados = [
            'mesAtual' => $mesAtual, 
            'anoAtual' => date('Y',strtotime($data)),  
            'diaInicial' =>$diaInicial,
            'diaFinal' => $diaFinal,
            'dataAnterior' => $this->dataAnterior = date("Y-m", strtotime(date("Y-m", strtotime($data)) . " -1 month")),
            'dataPosterior' => date("Y-m", strtotime(date("Y-m", strtotime($data)) . " +1 month")),
            'dataAtual' => $data,
            'mesAtualEscrito' => $mesAtualEscrito,
            'meses' => $meses,
            'anos' => $anos,
        ];
        return $dados;
        //dd("$data, $diaInicial, $diaFinal");
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

    public function meses(){
        $meses = array(       
            ['numero' => '01', 'nome' =>'Janeiro'],
            ['numero' => '02', 'nome' =>'Fevereiro'],
            ['numero' => '03', 'nome' =>'Março'],
            ['numero' => '04', 'nome' =>'Abril'],
            ['numero' => '05', 'nome' =>'Maio'],
            ['numero' => '06', 'nome' =>'Junho'],
            ['numero' => '07', 'nome' =>'Julho'],
            ['numero' => '08', 'nome' =>'Agosto'],
            ['numero' => '09', 'nome' =>'Setembro'],
            ['numero' => '10', 'nome' =>'Outubro'],
            ['numero' => '11', 'nome' =>'Novembro'],
            ['numero' => '12', 'nome' =>'Dezembro']
        ); 
        return $meses;
    }

    public function anos(){
        $anos = [
            ['numero' => 2017],
            ['numero' => 2018],
            ['numero' => 2019],
        ];
        return $anos;
    }
}
