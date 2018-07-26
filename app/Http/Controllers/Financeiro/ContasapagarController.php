<?php

namespace App\Http\Controllers\Financeiro;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\financeiro\financeiro;
use App\Models\financeiro\contasAPagar;
use App\Models\data\dataClass;
use App\Http\Controllers\Controller;
use App\Models\tables\valor_contas_a_pagar;

class ContasapagarController extends Controller {

    public function __construct(contasAPagar $contasAPagar, valor_contas_a_pagar $valorContasAPagar){
        $this->billsToPay = $contasAPagar;
        $this->valorContasAPagar = $valorContasAPagar;
    }

    function apiContas(){
        $billsToPay = $this->billsToPay->allPayMounth("2018-05");
        $dados = ['contas' => $billsToPay];
       
    return view('financeiro.Newcontasapagar')->with($dados);
        

    }

    function Index() {

      
      

     
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


        if(!isset($_POST['diaInicial'])){
            $diaInicial = 01;
        }else {        
            $diaInicial = (int) $_POST['diaInicial'];               
        }
   
        if(!isset($_POST['diaFinal'])){
            $diaFinal = 31;              
         }else {        
            $diaFinal = (int) $_POST['diaFinal'];   
            
        }
        

    

        $datas = array('data' => $data,'mes' => $mes,'ano' => $ano);
        
        $contas = new financeiro(); 
        
        $dados = $contas->Index($datas,$filtroOrdenacao,$filtroArea,$filtroConta,$pagadorfiltro, $diaInicial, $diaFinal);
     
       
       return view('financeiro.contasapagar')->with($dados);
    }


    function pagamento($data){
        $conta = new financeiro();
        $dados = $conta->pagamento($data);
        return view('financeiro.pagamentos')->with($dados);
    }

    
    function create($data){
        $conta = new financeiro();
        $dados = $conta->criar($data);
        return view('financeiro.criar')->with($dados);
    }
    
    function edit($id,$data){
        
        $conta = new financeiro();
       $dados = $conta->editar($id,$data);
      
       return view('financeiro.editar')->with($dados);

    }
    
    function update(Request $request){
        $dados = $request->all();
        $conta = new financeiro();
        $dados = $conta->atualizar($dados);
        return('<script>opener.location.reload(); window.close();</script>');
    }
    
    
    function store(Request $request){
       
        $dados = $request->all();
        $financeiro = new financeiro();
        $financeiro->salvar($dados);
        return('<script>opener.location.reload(); window.close();</script>');

    }
    
    function destroy($id){
        $finaceiro = new financeiro();
        $finaceiro->apagar($id);
        return('<script>opener.location.reload(); window.close();</script>');
    }
    
    function emitirpagamento(Request $request){
        $emitir = new financeiro();
        $dados = $emitir->emitirpagamento($request);
     
        return view('financeiro.emitirpagamento')->with($dados);
    }

    function salvarpagamento(Request $request){
        $salvaremitir = new financeiro();
        $dados = $salvaremitir->salvarpagamento($request);
        
        return('<script>opener.location.reload(); window.close();</script>');;
        
    }

}
