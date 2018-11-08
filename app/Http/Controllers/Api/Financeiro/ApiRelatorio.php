<?php

namespace App\Http\Controllers\Api\Financeiro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\financeiro\relatorios;

class ApiRelatorio extends Controller
{

    public function __construct(relatorios $relatorios){
        $this->relatorios = $relatorios;
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function anual()
    {
        $ano = 2018;
        $contas = $this->relatorios->contasAnuais($ano);
        $dadosAnuais = array('dados' => $contas);
        $dados = array('dadosAnuais' => $dadosAnuais, 'ano' => $ano);
        return($dados);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
