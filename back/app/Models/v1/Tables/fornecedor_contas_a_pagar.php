<?php

namespace App\Models\v1\Tables;

use Illuminate\Database\Eloquent\Model;

class fornecedor_contas_a_pagar extends Model
{
    protected $table = 'fornecedor_contas_a_pagar';
    protected $fillable = ['fornecedor', 'endereco', 'numero', 'bairro', 'cep', 'cidade', 'estado', 'cnpj',
    'ie', 'complemento', 'uf', 'email','telefone', 'celular', 'representante', 'banco', 'agencia', 'conta',
    'operacao', 'ins_municipal', 'ins_estadual', 'updated_at', 'created_at'];

    public function edit($id){
        try{
            $fornecedores = new fornecedor_contas_a_pagar;
        $fornecedores = $fornecedores->where('id', $id)->get();

        return response()->json([
            'data' => $fornecedores,
            'message' => 'Editando'  
        ]);
        }catch(Exception $e){
            return response()->json([
                'data' => '',
                'message' => $e,     
            ]);
            
            return $e;
        }

    }

    public function atualizar($request, $id){
        $fornecedores = new fornecedor_contas_a_pagar;
        $request = $request->input();

        $fornecedores->where('id', $id)
          ->update($request);

        //   $fornecedores->save();

          return response()->json([
            'data' => $fornecedores,
            'message' => 'atualizado'  
        ]);

    }

    public function index(){
        $fornecedores = new fornecedor_contas_a_pagar;
        $fornecedores = $fornecedores::all();
        return response()->json([
            'data' => $fornecedores   
        ]);
    }

    public function store($request){
        try{
            $fornecedores = new fornecedor_contas_a_pagar;
            $fornecedores->fill($request->input());
            $fornecedores->save();

            return response()->json([
                'data' => $fornecedores,
                'message' => 'cadastrado',     
            ]);
            
        }catch(Exception $e){
            return response()->json([
                'data' => '',
                'message' => $e,     
            ]);
            
            return $e;
        }
    }
}
