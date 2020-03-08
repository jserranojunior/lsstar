<?php

namespace App\Http\Controllers\v1\Financeiro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\v1\Financeiro\ApiContasAPagarController;

class ContasAPagarController extends Controller
{
    public function __construct(ApiContasAPagarController $ApiContasAPagar){
        $this->ApiContasAPagar = $ApiContasAPagar;
    }

    public function index(Request $request){
        
    }
}
