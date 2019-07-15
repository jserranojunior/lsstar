<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class InicioController extends Controller
{
   public function Index(){       
       return view('home.bemvindo');
   }
   
    public function Teste($id = null){
            
       return($id);
       
   }
}
