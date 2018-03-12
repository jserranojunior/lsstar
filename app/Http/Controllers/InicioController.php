<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class InicioController extends Controller
{
   public function Index(){
            
       
       return view('bemvindo');
   }
   
    public function Teste($id = null){
            
       return($id);
       
   }
}
