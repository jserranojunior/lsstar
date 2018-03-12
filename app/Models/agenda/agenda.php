<?php

namespace App\Models\agenda;
use DB;
use Illuminate\Database\Eloquent\Model;

class agenda extends Model
{

    public function atualizar($request){
        $id = $request->id;

        $dados_agenda = array(    
             "horario" => $request->horario,
            "imovel" => $request->imovel,
            "resultado" => $request->resultado,
            "expectativa" => $request->expectativa,
            "data" => $request->data,
            "referencia" => $request->referencia,    
    );

    $atualizar = DB::table('agendamento')    
    ->where('id', $id)
    ->update($dados_agenda);

    }


    public function editar($id){
        $agendamentos = DB::table('agendamento as A')
        ->select('C.nome', 'A.id as id', 'A.horario','A.id_cliente', 'A.imovel', 'A.resultado', 'A.expectativa', 'A.data','A.referencia')
                        ->leftJoin('clientes as C', 'A.id_cliente', '=', 'C.id')                      
                        
                        ->where('A.id', $id)
                        ->get();

                   
        return($agendamentos);                
    }

    public function salvar($request){

        $nome = trim($request->nome);

    $dados_usuario = array(
    "nome" => $request->nome,
    );    

    $select_cliente = DB::table('clientes')
    ->where("nome", $nome)
    ->count();

    if($select_cliente == 0){
        $dados = array("nome" => $nome);    
        
        DB::table('clientes')->insert($dados);
    }

    $select_cliente = DB::table('clientes')
    ->where("nome", $nome)
    ->get();

    foreach($select_cliente as $select){
    $id_cliente = $select->id;
    }
  

    $dados_agenda = array(   
            "id_cliente" => $id_cliente,     
             "horario" => $request->horario,
            "imovel" => $request->imovel,
            "resultado" => $request->resultado,
            "expectativa" => $request->expectativa,
            "data" => $request->data,
            "referencia" => $request->referencia,    
    );

    DB::table('agendamento')->insert($dados_agenda);

    }

    public function criar(){
        $select_clientes = DB::table('clientes')
        ->select("nome")
        ->get();

        return($select_clientes);
    }
  
    public function index($mes, $ano){

                $mesano = "$ano-$mes";
        $mesbusca = date("Y-m",strtotime($mesano));
        
        $mesanoanterior = date('Y-m',(strtotime('-1 month',strtotime(date($mesbusca)))));
        $mesanoposterior = date('Y-m',(strtotime('+1 month',strtotime(date($mesbusca)))));
        
        $mesAnterior = date('m', strtotime($mesanoanterior));
        $anoAnterior = date('Y', strtotime($mesanoanterior));

        $mesPosterior = date('m', strtotime($mesanoposterior));
        $anoPosterior = date('Y', strtotime($mesanoposterior));

        $mesAtual = date('m');
        $anoAtual = date('Y');

        
        if($mes == 1){
            $mesEscrito = "Janeiro";
        }
        if($mes == 2){
            $mesEscrito = "Fevereiro";
        }
        if($mes == 3){
            $mesEscrito = "Março";
        }
        if($mes == 4){
            $mesEscrito = "Abril";
        }
        if($mes == 5){
            $mesEscrito = "Maio";
        }
        if($mes == 6){
            $mesEscrito = "Junho";
        }
        if($mes == 7){
            $mesEscrito = "Julho";
        }
        if($mes == 8){
            $mesEscrito = "Agosto";
        }
        if($mes == 9){
            $mesEscrito = "Setembro";
        }
        if($mes == 10){
            $mesEscrito = "Outubro";
        }
        if($mes == 11){
            $mesEscrito = "Novembro";
        }
        if($mes == 12){
            $mesEscrito = "Dezembro";
        }

    

        $agendamentos = DB::table('agendamento as A')
        ->select('C.nome', 'A.id', 'A.horario','A.id_cliente', 'A.imovel', 'A.resultado', 'A.expectativa', 'A.data','A.referencia')
                        ->leftJoin('clientes as C', 'A.id_cliente', '=', 'C.id')                        
                        ->whereYear('A.data', $ano)
                        ->whereMonth('A.data', $mes)
                        ->get();

        foreach($agendamentos as $agenda){
            $agenda->data = date('d/m/Y', strtotime($agenda->data));
        }                

                     $dados = array('dados' => $agendamentos, 'ano' => $ano, 'mes' => $mes, 
                     'mesAnterior' => $mesAnterior, 'anoAnterior' => $anoAnterior,
                     'mesPosterior' => $mesPosterior, 'anoPosterior' => $anoPosterior,
                     'mesAtual' => $mesAtual, 'anoAtual' => $anoAtual,
                     'mesEscrito' => $mesEscrito
                    );
                        return($dados);
    }
}
