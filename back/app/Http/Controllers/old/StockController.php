<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models;
use App\Models\stock;
use Illuminate\Support\Facades\Redirect;

class StockController extends Controller {

    public function __construct() {
        
    }

    public function index() {
        $stock = new \App\Models\stock\stock();
        $dados = $stock->index();
        return view('stock.index')->with($dados);
    }

    public function create() {
        $categorys = new \App\Models\stock\stock();
       $categorys = $categorys->criar();
       
        return view('stock.create')->with($categorys);
    }

    public function destroy($id) {
        $stock = new \App\Models\stock\stock();
        $dados = $stock->remover($id);
        return Redirect::to('estoque');
    }

    public function edit($id) {
        $stock = new \App\Models\stock\stock();
        $dados = $stock->edit($id);
        return view('stock.edit')->with($dados);
    }

    public function update() {

        $dados = array(
            'id' => $_POST['id'],
            'tag' => $_POST['tag'],
            'product' => $_POST['product'],
            'inputNf' => $_POST['inputNf'],
            'numberSeries' => $_POST['numberSeries'],
            'value' => $_POST['value'],
            'purchaseDate' => $_POST['purchaseDate'],
            'entryDate' => $_POST['entryDate'],
            'exitNf' => $_POST['exitNf'],
            'exitDate' => $_POST['exitDate'],
            'exitValue' => $_POST['exitValue'],
            'discardDate' => $_POST['discardDate'],
            'reason' => $_POST['reason'],
            'category' => $_POST['category'],
            'amount' => $_POST['amount']
        );




        $stock = new \App\Models\stock\stock();
        $stock = $stock->atualizar($dados);

        return Redirect::to('estoque');
    }

    public function store() {
        $dados = array(
            'tag' => $_POST['tag'],
            'product' => $_POST['product'],
            'inputNf' => $_POST['inputNf'],
            'numberSeries' => $_POST['numberSeries'],
            'value' => $_POST['value'],
            'purchaseDate' => $_POST['purchaseDate'],
            'entryDate' => $_POST['entryDate'],
            'exitNf' => $_POST['exitNf'],
            'exitDate' => $_POST['exitDate'],
            'exitValue' => $_POST['exitValue'],
            'discardDate' => $_POST['discardDate'],
            'reason' => $_POST['reason'],
            'category' => $_POST['category'],
            'amount' => $_POST['amount']
        );
        $stock = new \App\Models\stock\stock();
        $stock = $stock->put($dados);

        return Redirect::to('estoque/criar');
    }

}
