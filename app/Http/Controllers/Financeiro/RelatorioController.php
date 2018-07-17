<?php

namespace App\Http\Controllers\financeiro;
use DB;
use App\Models\financeiro\financeiro;
use App\Models\data\dataClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\financeiro\contasAPagar;


class RelatorioController extends Controller
{

    
    public function relatorioArea(contasAPagar $contasAPagar, request $request){

       
        //dd($request->area);
        $dados = $contasAPagar->relatorioPorUnidade($request);

        $dados = array('dados' =>  $dados);
   
        return view('financeiro.relatorioarea')->with($dados);    
    }




    public function consolidado(){
        $financeiro = new financeiro();
        $valores = $financeiro->relatorioConsolidado();
       $dados = array('dados' => $valores, 'count' => 1);

       
        return view('financeiro.relatorioconsolidado')->with($dados);
    }

    public function anual(Request $request){
        if($request->ano == null){
            $request->ano = date('Y');
        }
       // dd($request->ano);
        
        $financeiro = new financeiro();
        //$dados2017 = $financeiro->anual(2017);
        $dados = $financeiro->anual($request->ano);

    $dadosAnuais = array('dados' => $dados/*, 'dados2017' => $dados2017*/);
        $dados = array('dadosAnuais' => $dadosAnuais, 'ano' => $request->ano );
       
        return view('financeiro.relatorioanual')->with($dados);
      
    }

    public function mensal(){
        if(!isset($_POST['areafiltro'])){
            $filtroArea = 'Todos';
        }else {
            $filtroArea = $_POST['areafiltro'];
        }
        if(!isset($_POST['contafiltro'])){
            $filtroConta = 'Todos';
        }else {
            $filtroConta = $_POST['contafiltro'];
        }
        if(!isset($_POST['ordenacao'])){
            $filtroOrdenacao = 'favorecido';
        }else {
            $filtroOrdenacao = $_POST['ordenacao'];
        }   
        
        if(!isset($_POST['pagadorfiltro'])){
            $pagadorfiltro = 'Todos';
        }else {
            $pagadorfiltro = $_POST['pagadorfiltro'];
        }

        if(!isset($_POST['mes'])){
            $data = date('Y-m');
            $mes = date('m');
            $ano = date('Y');
        }else{
        $mes = $_POST['mes'];
        $ano = $_POST['ano'];
        $data = date('Y-m', strtotime("$ano-$mes"));
        }
           $datas = array('data' => $data,'mes' => $mes,'ano' => $ano);        
        $contas = new financeiro();         
        $dados = $contas->Index($datas,$filtroOrdenacao,$filtroArea,$filtroConta,$pagadorfiltro);   
          return view('financeiro.relatoriomensal')->with($dados);
    }
}
