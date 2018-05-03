<?php

namespace App\Http\Controllers;
use App\Models\areas;
use Illuminate\Http\Request;

class areasController extends Controller
{
    public function __construct(areas $areas){
        $this->areas = $areas;
    }
    public function allAreas(){
        $this->areas = $this->areas->all();
        $dados = array('dados' => $this->areas);
        return view('areas.listagem')->with($dados);
    }

    public function editArea($id){
        $this->areas = $this->areas::where('id', $id)->get();


        $dados = array('areas' => $this->areas);
        return view('areas.editar')->with($dados);
    }
}
