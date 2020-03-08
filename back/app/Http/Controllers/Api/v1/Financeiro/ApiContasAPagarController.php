<?php

namespace App\Http\Controllers\Api\v1\Financeiro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\v1\Financeiro\ContasAPagar;


class ApiContasAPagarController extends Controller
{  
        public function __construct(ContasAPagar $ContasAPagar){
            $this->ContasAPagar = $ContasAPagar;
        }
    
        public function index(Request $request)
        {        
            
            try{
                $this->ContasAPagar = $this->ContasAPagar->index($request);
        
            return response()->json([
                'data' => $this->ContasAPagar         
            ]);
            
            }catch(Exception $e){
                return response()->json([
                    'data' => $e,  
                ]);
            }
        }
  
}
