<?php

namespace App\Http\Controllers\wiki;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FazerController extends Controller
{
    public function index(){
        return view('wiki/fazer');
    }
}
