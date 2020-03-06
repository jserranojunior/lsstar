<?php

namespace App\Http\Controllers\Api\v1\Empreendimentos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\v1\Tables\casas;
use DB;



class ApiEmpreendimentos extends Controller
{

    public function __construct(casas $casas){
        $this->casas = $casas;
    }

    public function index(Request $request)
    {
        $this->casas = $this->casas->index($request);
        return response()->json([
        'data' => $this->casas          
        ]);

    }

    public function edit($id)
    {        
        $casa = $this->casas->edit($id);        
        return response()->json([
            'data' => $casa          
            ]);
    }

    public function update(Request $request, $id)
    {       
        $atualizar = $this->casas->atualizar($request, $id);
        return $atualizar;
    }

     public function store(Request $request)
    {
        $cadastrar = $this->casas->store($request);
        // Precisa retornar o ID
        
        // return('Nova Casa Cadastrada');

        return $cadastrar;

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
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
       
    //     $atualizar = $this->casas->atualizar($request, $id);
    //     return $atualizar;
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
}
