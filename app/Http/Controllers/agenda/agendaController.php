<?php

namespace App\Http\Controllers\agenda;
use App\Models\agenda\agenda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class agendaController extends Controller
{

    public function calendarIndex()
    {

        return view('agenda/calendario_roxo');

        
        $data = date('d/m/Y');
        
        function dates_month($month, $year) {
            $num = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            $dates_month = array();
        
            for ($i = 1; $i <= $num; $i++) {
                $mktime = mktime(0, 0, 0, $month, $i, $year);
                $date = date("d-M-Y", $mktime);
                $dates_month[$i] = $date;
            }
        
            return $dates_month;
        }
        
        echo"<pre>"; 
        print_r(dates_month(2, 2012));
        echo"</pre>"; 

   
        return view('agenda/calendario_roxo');
    }



    public function store(Request $request){
           
      $cadastrar = new agenda();
       $cadastrar = $cadastrar->salvar($request);        
       return redirect()->route('agenda.index');
    }

    public function index(Request $request){
        $ano = $request->ano;
        $mes = $request->mes;

if($ano == "undefined" or $ano == "" or  $mes == "undefined" or $mes == ""){
    $ano = date('Y');
    $mes = date('m');
}      
        $listagem = new agenda();
        $listagem = $listagem->index($mes, $ano);
       
        $dados = array('dados' => $listagem['dados'], 'count' => 0, 'ano' => $listagem['ano'],'mes' => $listagem['mes'],
        'mesAnterior' => $listagem['mesAnterior'], 'anoAnterior' => $listagem['anoAnterior'],
        'mesPosterior' => $listagem['mesPosterior'], 'anoPosterior' => $listagem['anoPosterior'],
        'mesAtual' => $listagem['mesAtual'], 'anoAtual' => $listagem['anoAtual'],
        'mesEscrito' => $listagem['mesEscrito']
    );

        return view('agenda/listagem')->with($dados);
        
    }
    public function create(){

        $clientes = new agenda();
        $clientes = $clientes->criar();

        $dados = array("clientes" => $clientes);

        return view('agenda/criar')->with($dados);
    }

    public function edit($id){
        
                $clientes = new agenda();                
                $dados = $clientes->editar($id);
        
                $dados = array("dados" => $dados);
      
                return view('agenda/editar')->with($dados);
            }

            public function update(Request $request){                
                        $dados = new agenda();                
                        $dados = $dados->atualizar($request);
                        return redirect()->route('agenda.index');               
                        
                    }
}
