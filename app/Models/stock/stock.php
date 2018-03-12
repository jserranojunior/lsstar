<?php

namespace App\Models\stock;

use Illuminate\Database\Eloquent\Model;
use DB;
use Symfony\Component\HttpFoundation\Request;
class stock extends Model
{
    
    
    public function index(){
        $select = DB::table('stock')->get();
        $select  = array('dados' => $select);
        return($select);
        
    }
    
    public function criar(){
        $categorys = DB::table('stock_category')->get();
        $categorys  = array('categorys' =>$categorys);
        
         return($categorys);
    }
    
    public function edit($id){
        $select = DB::table('stock')->where('id', $id)->get();
        $categorys = DB::table('stock_category')->get();
        $select  = array('categorys' =>$categorys,'dados' => $select);
        return($select);
    }
    
    public function remover($id){
        $destroy = DB::table('stock')
                ->where('id', $id)
                ->delete();
    }
    
    
    
    public function atualizar($dados){
       
        $id = $dados['id'];
        $tag = $dados['tag'];
        $product = $dados['product'];
        $inputNf = $dados['inputNf'];
        $numberSeries = $dados['numberSeries'];
        $value = $dados['value'];
        $purchaseDate = $dados['purchaseDate'];
        $entryDate = $dados['entryDate'];
        $exitNf = $dados['exitNf'];
        $exitDate = $dados['exitDate'];
        $exitValue = $dados['exitValue'];
        $discardDate = $dados['discardDate'];
        $reason = $dados['reason'];
        $category = $dados['category'];
        $amount = $dados['amount'];
        
        $update = DB::table('stock')
                ->where('id', $id)
                ->update([
        'tag' => $tag,
        'product' => $product,
        'inputNf' => $inputNf,
        'numberSeries' => $numberSeries,
        'value' => $value,
        'purchaseDate' => $purchaseDate,
        'entryDate' => $entryDate,
        'exitNf' => $exitNf,
        'exitDate' => $exitDate,
        'exitValue' => $exitValue,
        'discardDate' => $discardDate,
        'reason' => $reason,
        'category' => $category,
                    'amount' => $amount
    ]);
        
        return('CADASTRADO COM SUCESSO');
}
    
    public function put($dados){
        
       $tag = $dados['tag'];
       $product = $dados['product'];
        $inputNf = $dados['inputNf'];
        $numberSeries = $dados['numberSeries'];
        $value = $dados['value'];
        $purchaseDate = $dados['purchaseDate'];
        $entryDate = $dados['entryDate'];
        $exitNf = $dados['exitNf'];
        $exitDate = $dados['exitDate'];
        $exitValue = $dados['exitValue'];
       $discardDate = $dados['discardDate'];
        $reason = $dados['reason'];
         $category = $dados['category'];
         $amount = $dados['amount'];
       
        
        
        
        $put = DB::table('stock')->insert(
                ['tag' => $tag,
                'product' => $product, 
                 'inputNf' => $inputNf,
                'numberSeries' => $numberSeries,
                'value' => $value,
                'purchaseDate' => $purchaseDate,
                'entryDate'=> $entryDate,
                'exitNf'=> $exitNf,
                'exitDate'=> $exitDate,
                'exitValue'=> $exitValue,
                'discardDate'=>$discardDate,
                'reason'=> $reason,
                    'amount' => $amount
                ,
        'category' => $category
                ]
                
                );
        return('CADASTRADO COM SUCESSO');
    }
    
    
}
