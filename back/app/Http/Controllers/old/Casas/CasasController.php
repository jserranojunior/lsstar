<?php

namespace App\Http\Controllers\Casas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiCasa;
use App\Http\Controllers\Api\ApiCliente;
use DB;

class CasasController extends Controller
{

    public function __construct(ApiCasa $casa, ApiCliente $cliente){
        $this->casa = $casa;
        $this->cliente = $cliente;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $dados = $this->casa->index($request);
        return view('casas.index')->with($dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $clientes = DB::table('clientes')
        ->where('tipocliente','<>','proprietario')
        ->orWhere('tipocliente','=', null)
        ->orderBy('nome', 'asc')->get(); 

        $data = ['clientes' => $clientes];
         // dd($cliente);
        return view('casas.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = $this->casa->store($request);
        // dd($store);
        return redirect('casa');
        
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
    public function edit(Request $request, $id)
    {
    
        $clientes = DB::table('clientes')
        ->where('tipocliente','<>','proprietario')
        ->orWhere('tipocliente','=', null)
        ->orderBy('nome', 'asc')->get(); 
              
      
        
            // foreach($this->cliente as $cliente){
            //     $clientes = $cliente;
            // }

            $casa = $this->casa->edit($id);
                            

            $data = ['clientes' => $clientes, 'casa' => $casa];

        return view('casas.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $update = $this->casa->update($request,$id );
        return redirect('casa');
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
