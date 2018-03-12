<?php
namespace App\Models\data;

class dataClass {
    public $dataatual;
    
    public function data_atual(){
    $dataatual = date('Y-m');
    return $dataatual;
    }
    
}
