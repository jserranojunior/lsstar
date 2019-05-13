<?php

namespace App\Http\Controllers\Api\v1\Clientes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\v1\Clientes\Clientes;

class ApiClientes extends Controller
{
    public function __construct(Clientes $clientes){
        $this->clientes = $clientes;
    }

    public function index()
    {
        dd($this->clientes::all());
    }


    public function create()
    {
        //
    }

    public function lasPalmas(){
                $this->clientes = $this->clientes::where('evento_palmas', 1)->get();
        return($this->clientes);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $this->clientes->cadastrar($request->all());
    }

 
    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
