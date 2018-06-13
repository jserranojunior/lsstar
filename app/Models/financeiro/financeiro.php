<?php

namespace App\Models\financeiro;

use Illuminate\Database\Eloquent\Model;
use DB;


class financeiro extends Model {

    public $dados;
    public $data;
    public $dataAnterior;
    public $mes;
    public $ano;
    public $dataPosterior;
    public $dataMenosDois;
    public $nomeMes;
    public $aprovados;
    public $somaextra;
    public $somaatual;
    public $estimadonaolancado;
    public $totalpago;
    public $porcentagemconta;
    public $contas;

    public function relatorioConsolidado(){
            $dados = array();
            $ValoresUnidades = array();
            $dadosUnidades = array();
            $valorTotalAno = 0;

            $unidades = DB::table('area')
            ->select('nome','id')
            ->orderBy('ordem', 'asc')
            ->get(); 

            $totalTudo = 0;
            $valorAno = 0;

            foreach($unidades as $unidade){  
                $id = $unidade->id;
                $unidade = $unidade->nome;
            

                $anoFinal = date('Y', strtotime('+1 year'));

                $valorSoma = 0;
                $arrayTotalAno = array();
                
                for($ano = 2017; $ano < $anoFinal; $ano++){   

                    $valor = $this->somaTotalPorUnidade($ano, $unidade);
                    $valorAnual[$ano] = number_format($valor, 2,',','.');  
                    $valorSoma += $valor; 
                    
                }

            
                $totalTudo +=  $valorSoma;

                $valorSoma = number_format($valorSoma, 2,',','.');
        
                $dadosUnidades['unidades'][$unidade]['soma'] = $valorSoma; 
                $dadosUnidades['unidades'][$unidade]['nomeUnidade']  = $unidade;
                $dadosUnidades['unidades'][$unidade]['valores']  = $valorAnual;
            }

        $unidades =  $dadosUnidades['unidades'];
        
        $somaTotalAnoArray = array(); 

        for($ano = 2017; $ano < $anoFinal; $ano++){
            $somaTotalAno = 0; 
            foreach($unidades as $da){ 
                foreach($da['valores'] as $key => $valor){ 
                        if($key == $ano){   
                            $valorSemVirgula = str_ireplace(".","",$valor); //remove o separador de milhares
                            $valorSemVirgula = str_ireplace(",",".",$valorSemVirgula); //substitui a virgula por ponto 
                            $somaTotalAno += $valorSemVirgula;                                        
                        }  
                }      
            }
            $somaTotalAnoArray[$ano] = number_format($somaTotalAno, 2,',','.'); 
        }    


        $somaTotalAnoArray['totalTudo'] = number_format($totalTudo, 2,',','.');

    

        $dadosUnidades['total'] = $somaTotalAnoArray;
        

        //echo("<pre>$somaTotalAno</pre>");
    
        return($dadosUnidades);

    }
       
    public function somaTotalPorUnidade($ano, $unidade){
            $valor = 0;          
            $mes = 01;         
            $valorAnual = 0;  
            //$ano = 2017;
           // $unidade = "Administração";
            
            $datePrev = date("Y-m");
            //
            
            

        for($mes = 1; $mes <= 12; $mes++){  
            $valorMensal = 0;

                $this->data = "$ano-$mes";   
               $dataAtual = $this->data;
               $this->data = date("Y-m", strtotime($dataAtual));
                $this->dataAnterior = date("Y-m", strtotime(date("Y-m", strtotime($this->data)) . " -1 month"));

                

           $select_valores = DB::table('contas_a_pagar as c')
            ->select('c.id','a.valor','c.inicio_conta as data')
                ->leftjoin('valor_contas_a_pagar as a', function($anterior) {
                    $anterior->on('c.id', '=', 'a.codigo');                                         
                })           
            ->where(DB::raw("SUBSTRING(c.inicio_conta,1,7)"), '<=', $this->data)
            ->where(DB::raw("SUBSTRING(c.fim_conta,1,7)"), '>=', $this->data)
            ->where('c.area','=', $unidade)
            ->distinct()
            ->get();  
            
            foreach($select_valores as $valores){                 

                if($this->data > $datePrev){
                    $valores->valor = 0; 
                    $valorSemVirgula  = 0;                        
                }else{                    
                    $valor = $valores->valor;
                    $valorSemVirgula = str_ireplace(".","",$valor); //remove o separador de milhares
                    $valorSemVirgula = str_ireplace(",",".",$valorSemVirgula); //substitui a virgula por ponto 
                }
              
                $valorMensal +=  $valorSemVirgula;  
            }
            $valorAnual += $valorMensal;    
        }                    
        return($valorAnual);   
    }

    public function anual($ano){
       
        
        $unidades = DB::table('area')
        ->select('nome','id')
        ->orderBy('ordem', 'asc')
        ->get(); 
        
        

        $totalAno = 0;      
        $arrayMes = array('ano' => $ano);
        $arrayUnidade = array();
        $arrayValor = array();
        $arrayValorUnidade = array();    
        $arrayMeses = array(); 
       
        // $valorTotalMes = $this->totalmensal($mesano,$mesanoanterior);
       
        foreach($unidades as $unidade){  
            $id = $unidade->id;
            $unidade = $unidade->nome;
            $valorTotal = 0;
            $arrayMes = array(); 
            $arrayTotal = array(); 
            $arrayTotalMes = array();
            

            for($mes = 1; $mes <= 12; $mes++){   

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

                $mesano = "$ano-$mes";
                $mesbusca = date("Y-m",strtotime($mesano));
                $mesanoanterior = date($mesbusca,strtotime( "-1 month" ));
               
            $valor = $this->valormensal($mesbusca, $mesanoanterior, $unidade); 
            
            
            $valorSemVirgula = str_ireplace(".","",$valor); //remove o separador de milhares
            $valorSemVirgula = str_ireplace(",",".",$valorSemVirgula); //substitui a virgula por ponto 
            


            $dataatual = date('Y-m');            
            if($mesbusca > $dataatual){
                
                $valorSemVirgula = 0.00;
                $valorTotalMes = "0,00";
                $valor = "0,00";                
            }else{

                $valorTotal = $valorTotal + $valorSemVirgula;

                $valorTotalMes = $this->totalmensal($mesbusca,$mesanoanterior);

            }

            
              array_push($arrayTotalMes,array('valorTotal' => $valorTotalMes, 'mes' => $mes)); 
              
                     
                array_push($arrayMes,array('valor' => $valor, 'mes' => $mes, 'unidade' => $unidade));     

                  array_push($arrayMeses, $mes);
                    
            }     
          
            $totalAno += $valorTotal;
        
            $valorTotal  = number_format($valorTotal ,2,',','.');           
             
                 array_push($arrayTotal, $valorTotal);
              
            
            $arrayDados['unidades'][$unidade]['unidade'] = $unidade;
            $arrayDados['unidades'][$unidade]['valor'] = $arrayMes;
            $arrayDados['unidades'][$unidade]['total'] = $arrayTotal;
           

            $arrayunidade[$unidade] = $arrayMes;

             $unidades->id = $arrayMes;
             
          //$arrayUnidade['unidades']= $unidades;             
        }     
        $totalAno = number_format($totalAno ,2,',','.');
        $arrayDados['totalano'] = $totalAno;
        $arrayDados['anoContas'] = $ano;

        $arrayDados['valores']['totalmes'] = $arrayTotalMes;
        
        $arrayDados = collect($arrayDados);
        $dados = $arrayDados;
        
        return($dados);     
    
    }

    function totalmensal($mesano, $mesanoanterior){ 
        
        $valortotal = 0;    
        $this->data = $mesano;
        $this->dataAnterior = $mesanoanterior;
        /* ############# FAZ A CONSULTA NO BANCO NO VALOR ANTERIOR E ATUAL ################ */
                $valores = DB::table('contas_a_pagar as c')
                        ->select('c.id', 'p.tipo_pagamento', 'a.valor as valor_anterior', 'c.tipo',
                        'c.area as area', 'v.codigo', 'v.ccustos', 'c.sete', 'c.contas', 'c.parcelas', 
                        'c.tipo_parcela', 'v.favorecido', 'v.valor', 'v.observacoes', 'v.item',
                        'v.inicio_mes as dia', 'c.pagador as pagador', 'p.numero_cheque' , 
                        'c.inicio_conta', 'c.fim_conta')
                        ->leftjoin('valor_contas_a_pagar as v', function($join) {
                            $join->on('c.id', '=', 'v.codigo')
                            ->where(DB::raw("SUBSTRING(v.inicio_mes,1,7)"), '=', $this->data)
                            ;
                        })
                        ->leftjoin('financeiro_pagamentos_feitos as p', function($pago) {
                            $pago->on('c.id', '=', 'p.id_conta')
                            ->where(DB::raw("SUBSTRING(p.mes_referencia,1,7)"), '=', $this->data)
                            ->where('p.numero_cheque', '>', '');
                        })
                        ->leftjoin('valor_contas_a_pagar as a', function($anterior) {
                            $anterior->on('c.id', '=', 'a.codigo')
                            ->where(DB::raw("SUBSTRING(a.inicio_mes,1,7)"), '=', $this->dataAnterior);
                        })
                        ->where(DB::raw("SUBSTRING(c.inicio_conta,1,7)"), '<=', $this->data)
                        ->where(DB::raw("SUBSTRING(c.fim_conta,1,7)"), '>=', $this->data)
                        ->orwhere(DB::raw("SUBSTRING(c.inicio_conta, 1,7)"), '<=', $this->data)
                        ->where(DB::raw("SUBSTRING(c.fim_conta,1,7)"), '=', '')
                        ->where('area','=', '$unidade')
                        ->distinct()
                        ->get();       
                        
                    
            foreach($valores as $valor){
            /* ############# VERIFICA SE O VALOR ATUAL É VAZIO E ATRIBUI O ÚLTIMO VALOR ################ */
            if ($valor->valor == "" or $valor->valor == "NULL") {
                $this->selectValorVazioParcelado($valor->id);
                foreach ($this->valorVazioParcelado as $valorVazioParcela) {
                    $valor->valor = $valorVazioParcela->valor;
            }
        }
        $valor = $valor->valor;
        $valor = str_ireplace(".","",$valor); //remove o separador de milhares
        $valor = str_ireplace(",",".",$valor); //substitui a virgula por ponto    
        $valortotal = $valortotal + $valor;
        }
        $valortotal = number_format($valortotal, 2,',','.');

        return($valortotal);
    }

    function valormensal($mesano, $mesanoanterior, $unidade){ 
        
        $valortotal = 0;    
        $this->data = $mesano;
        $this->dataAnterior = $mesanoanterior;
        /* ############# FAZ A CONSULTA NO BANCO NO VALOR ANTERIOR E ATUAL ################ */
                $valores = DB::table('contas_a_pagar as c')
                        ->select('c.id', 'p.tipo_pagamento', 'a.valor as valor_anterior', 'c.tipo',
                        'c.area as area', 'v.codigo', 'v.ccustos', 'c.sete', 'c.contas', 'c.parcelas', 
                        'c.tipo_parcela', 'v.favorecido', 'v.valor', 'v.observacoes', 'v.item',
                        'v.inicio_mes as dia', 'c.pagador as pagador', 'p.numero_cheque' , 
                        'c.inicio_conta', 'c.fim_conta')
                        ->leftjoin('valor_contas_a_pagar as v', function($join) {
                            $join->on('c.id', '=', 'v.codigo')
                            ->where(DB::raw("SUBSTRING(v.inicio_mes,1,7)"), '=', $this->data)
                            ;
                        })
                        ->leftjoin('financeiro_pagamentos_feitos as p', function($pago) {
                            $pago->on('c.id', '=', 'p.id_conta')
                            ->where(DB::raw("SUBSTRING(p.mes_referencia,1,7)"), '=', $this->data)
                            ->where('p.numero_cheque', '>', '');
                        })
                        ->leftjoin('valor_contas_a_pagar as a', function($anterior) {
                            $anterior->on('c.id', '=', 'a.codigo')
                            ->where(DB::raw("SUBSTRING(a.inicio_mes,1,7)"), '=', $this->dataAnterior);
                        })
                        ->where(DB::raw("SUBSTRING(c.inicio_conta,1,7)"), '<=', $this->data)
                        ->where(DB::raw("SUBSTRING(c.fim_conta,1,7)"), '>=', $this->data)
                        ->orwhere(DB::raw("SUBSTRING(c.inicio_conta, 1,7)"), '<=', $this->data)
                        ->where(DB::raw("SUBSTRING(c.fim_conta,1,7)"), '=', '')
                        ->where('area','=', '$unidade')
                        ->distinct()
                        ->get();       
                        
                        $valores = $valores->where('area', $unidade);
    
        foreach($valores as $valor){
        /* ############# VERIFICA SE O VALOR ATUAL É VAZIO E ATRIBUI O ÚLTIMO VALOR ################ */
            if ($valor->valor == "" or $valor->valor == "NULL") {
                $this->selectValorVazioParcelado($valor->id);
                foreach ($this->valorVazioParcelado as $valorVazioParcela) {
                    $valor->valor = $valorVazioParcela->valor;
                }
            }

        $valor = $valor->valor;
        $valor = str_ireplace(".","",$valor); //remove o separador de milhares
        $valor = str_ireplace(",",".",$valor); //substitui a virgula por ponto    
        $valortotal = $valortotal + $valor;
        }

        $valortotal = number_format($valortotal, 2,',','.');

        return($valortotal);
    }

    public function pagamento($numero){

        $valortotal = "";

        $selectpagamento = DB::table('financeiro_pagamentos_feitos as c')
        ->where('numero_cheque', $numero)
        ->leftjoin('valor_contas_a_pagar as a', function($anterior) {
            $anterior->on('c.id_conta', '=', 'a.codigo');
        })
        ->get();

        foreach($selectpagamento as $pagamento){
            $valor = $pagamento->valor;
            $pagador = $pagamento->pagador;
            $data_conta = $pagamento->data_conta;
            $numero_cheque = $pagamento->numero_cheque;
            $link_comprovante = $pagamento->link_comprovante;

            $valor = str_ireplace(".","",$valor); //remove o separador de milhares
            $valor = str_ireplace(",",".",$valor); //substitui a virgula por ponto

            $valortotal = $valortotal + $valor;


        }
        $valortotal  = number_format($valortotal ,2,',','.');


        $dados = array(
            'contas' => $selectpagamento,
            'valortotal' => $valortotal,
            'pagador' =>$pagador, 
            'numero_cheque' => $numero_cheque, 
            'data_conta' => $data_conta,
            'link_comprovante' => $link_comprovante,
        );

        return($dados);
    }

    public function salvarpagamento($request){
        $checklist = $request->check_list;
        $datapagamento = $request->data;
        $numeropagamento = $request->numeropagamento;
        $somavalor = $request->somavalor;
        $dataconta = $request->dataconta;
        $tipopagamento = $request->tipopagamento;
        $link_comprovante = $request->link_comprovante;


        foreach($checklist as $check){
            $id = $check;          
            try{    
                DB::table('financeiro_pagamentos_feitos')
                ->insert([
                    'id_conta' => $id, 
                    'valor_pago' => $somavalor, 
                'data_conta' => $datapagamento, 
                'numero_cheque' => $numeropagamento,  
                'mes_referencia' => $dataconta, 
                'tipo_pagamento' => $tipopagamento,
                'link_comprovante' => $link_comprovante,
                ]);
                
            }catch(\Excepetion $e){
                dd($e);
            }            
        }    

        return("CADASTRADO");
    }

    public function emitirpagamento($request){
        $checklist = $request->check_list;
        $numerocadastro = date("dmYHis");
        $data = $request->datacompleta;
        $arrayConta = array();
        $dataconta = $request->dataconta;
        
        $dataatual = date('Y-m-d',strtotime($data));
        $data = date('d/m/Y',strtotime($data));
        $somavalor = '';           

        if(isset($checklist)){
                foreach($checklist as $check){
                    $id = $check;
                    $contas =  DB::table('valor_contas_a_pagar')        
                    ->where('codigo','=', $id)
                    ->get();
                    
                    foreach($contas as $conta){
                        $valor = $conta->valor;
                        $favorecido = $conta->favorecido;

                        
                        $valor = str_ireplace(".","",$valor); //remove o separador de milhares
                        $valor = str_ireplace(",",".",$valor); //substitui a virgula por ponto

                        $somavalor = $somavalor + $valor;

                        $valor = number_format($valor,2,',','.');

                        $arrayValores = array('id' => $id, 'valor' => $valor, 'favorecido' => $favorecido, 'data' => $data);
                        
                        array_push($arrayConta, $arrayValores);
                             
                    }
                }
        }else{
            dd("Selecione uma conta para pagar");
        }        
                    
        $somavalor = number_format($somavalor,2,',','.');
        $dados = array('conta' => $arrayConta, 'somavalor' =>$somavalor,'data' => $dataatual, 'dataconta' => $dataconta, 'numerocadastro' =>  $numerocadastro);
        
        return($dados);
    }

    public function apagar($id){
       try{
            DB::table('valor_contas_a_pagar')->where('codigo', '=', $id)->delete();
            DB::table('contas_a_pagar')->where('id', '=', $id)->delete();
       }catch(\Excepetion $e){
        return($e);
       }
    }
         
    public function atualizar($dados){
        
        $id = $dados['id'];
        $tipo = $dados['tipo'];
        $favorecido = trim($dados['favorecido']);
        $item = $dados['item'];
        $inicio_conta = $dados['inicio_conta'];
        $valor = $dados['valor'];
        $parcelas = $dados['parcelas'];
        $area = $dados['area'];
        $ccustos = $dados['ccustos'];
        $pagador = $dados['pagador'];
        $fim_conta = "";  

        $select_favorecido = DB::table('fornecedor_contas_a_pagar')
        ->where('fornecedor','=',$favorecido)
        ->count();

        if($select_favorecido < 1){
            
            try{
                DB::table('fornecedor_contas_a_pagar')->insert(['fornecedor' => $favorecido]);
            }catch(\Expection $e){
                echo dd($e);
            }
        }

        $select_area = DB::table('area')
        ->where('nome','=',$area)
        ->count();

        if($select_area < 1){
            
            try{
                DB::table('area')->insert(['nome' => $area]);
            }catch(\Expection $e){
                echo dd($e);
            }
        }   

        $select_conta = DB::table('conta')
        ->where('nome','=',$ccustos)
        ->count();

        if($select_conta < 1){
              try{
                DB::table('conta')->insert(['nome' => $ccustos]);
            }catch(\Expection $e){
                echo dd($e);
            }
        }       
        if($tipo == "Extra"){
            $parcelas = "";
            
            $inicio_conta = date('Y-m-d', strtotime($inicio_conta));
            $fim_conta = $inicio_conta;
        }

        if($tipo == "Parcelado"){
        $parcelas_menos_um = $parcelas -1;    
        $inicio_conta = date('Y-m-d', strtotime($inicio_conta));
        $fim_conta = date('Y-m-d',strtotime(date('Y-m-d', strtotime($inicio_conta)) . "+$parcelas_menos_um month"));      
        }
    
         $contas_atualizar = array('tipo' => $tipo, 
            'inicio_conta' => $inicio_conta,
            'fim_conta' => $fim_conta,
            'parcelas' => $parcelas,
            'area' => $area,
            'contas' => $ccustos,
            'tipo' => $tipo,
            'pagador' => $pagador,
        );

        $valor_atualizar = array(
            'codigo' => $id,
            'inicio_mes' => $inicio_conta,
            'ccustos' => $ccustos,
            'item' => $item,
            'favorecido' => $favorecido,
            'valor' => $valor
        );

        try{
        DB::table('contas_a_pagar')
        ->where('id', '=', $id)
        ->update($contas_atualizar);
        }catch(\Expection $e){
            echo dd($e);
        }       
         

        try{
            DB::table('valor_contas_a_pagar')
            ->where('codigo', '=', $id)
            ->update($valor_atualizar);
        }catch(\Expection $e){
            echo dd($e);
        }      
}

    public function criar($data){

        $favorecido = DB::table('fornecedor_contas_a_pagar')
        ->orderBy('fornecedor','asc')
        ->get();

        $area = DB::table('area')
        ->orderBy('ordem','asc')
        ->get();            

        $conta = DB::table('conta')
        ->orderBy('ordem','asc')
        ->get(); 

        $dados = array('favorecidos' => $favorecido, 'data_atual' => $data,'areas' => $area, 'contas' => $conta);            
        return $dados;
    }

    public function editar($id,$data){
       
        $this->data = $data;

        $objetos = DB::table('contas_a_pagar as c')
        
                ->select('c.id', 'c.tipo', 'c.parcelas', 'c.pagador as pagador',
                'v.inicio_mes', 'v.observacoes', 'c.contas', 'v.favorecido', 'c.parcelas', 'v.valor', 'v.item', 'c.area')
                    ->leftjoin('valor_contas_a_pagar as v', function($join) {
                        $join->on('c.id', '=', 'v.codigo')
                        ->where(DB::raw("SUBSTRING(v.inicio_mes,1,7)"), '<=', $this->data)                    ;
                    })->leftjoin('financeiro_pagamentos_feitos as p', function($pago) {
                        $pago->on('c.id', '=', 'p.id_conta')
                        ->where(DB::raw("SUBSTRING(p.mes_referencia,1,7)"), '=', $this->data)
                        ->where('p.numero_cheque', '>', '');
                    })
                    ->where('c.id', $id)
                    ->take(1)
                    ->get();                   
                    
                                      
                    $favorecido = DB::table('fornecedor_contas_a_pagar')
                    ->orderBy('fornecedor','asc')
                    ->get();
            
                    $area = DB::table('area')
                    ->orderBy('ordem','asc')
                    ->get();            
            
                    $conta = DB::table('conta')
                    ->orderBy('ordem','asc')
                    ->get();                               

                $dados = array('favorecidos' => $favorecido, 'data_atual' => $data,'areas' => $area, 'contas' => $conta, 'objetos' => $objetos);   
                      
                return  $dados;
                    
    }

    public function Index($datas, $ordenacao, $areafiltro, $contafiltro, $pagadorfiltro, $diaInicial, $diaFinal){

       

        $fb = array($ordenacao, $areafiltro, $contafiltro, $pagadorfiltro);
       
        
        $this->areafiltro = $areafiltro;
        $this->ordenacao = $ordenacao;

        $this->contafiltro = $contafiltro;

        $this->pagadorfiltro = $pagadorfiltro;

        $this->tratarData($datas, $diaInicial, $diaFinal);
        $this->selectContas();
        
        $lista = $this->lista();
        return($lista);
    }

    public function tratarData($datas, $diaInicial, $diaFinal){

        /* ############# TRATA A DATA QUE VEM DO INPUT ################ */
            setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
            $this->mes_atual = date('m');
            $this->ano_atual = date('Y');

          
            $this->diaInicial = $diaInicial; 
            $this->diaFinal = $diaFinal; 
            
                        

            

            $this->data = $datas['data'];
            $this->mes = $datas['mes'];
            $this->ano = $datas['ano'];
            $this->dataMenosDois = date("Y-m", strtotime(date("Y-m", strtotime($this->data)) . " -2 month"));
            $this->dataAnterior = date("Y-m", strtotime(date("Y-m", strtotime($this->data)) . " -1 month"));
            $this->dataPosterior = date("Y-m", strtotime(date("Y-m", strtotime($this->data)) . " +1 month"));
            $this->mesAnterior = date('m', strtotime($this->dataAnterior));
            $this->mesPosterior = date('m', strtotime($this->dataPosterior));
            $this->anoAnterior = date('Y', strtotime($this->dataAnterior));
            $this->anoPosterior = date('Y', strtotime($this->dataPosterior));
            // $this->nomeMes = ucfirst(strftime("%B", strtotime($this->data)));
            $this->nomeMes = ucfirst(utf8_encode(strftime("%B", strtotime($this->data))));
    
    } 

    public function selectContas(){


            /* ############# FAZ A CONSULTA NO BANCO NO VALOR ANTERIOR E ATUAL ################ */
            $this->contas = DB::table('contas_a_pagar as c')
                    ->select('c.id', 'p.tipo_pagamento', 'a.valor as valor_anterior', 'c.tipo',
                    'c.area', 'v.codigo', 'v.ccustos', 'c.sete', 'c.contas', 'c.parcelas', 
                    'c.tipo_parcela', 'v.favorecido', 'v.valor', 'v.observacoes', 'v.item',
                    'v.inicio_mes as dia', 'c.pagador as pagador', 'p.numero_cheque' , 
                    'c.inicio_conta', 'c.fim_conta')
                    ->leftjoin('valor_contas_a_pagar as v', function($join) {
                        $join->on('c.id', '=', 'v.codigo')
                        ->where(DB::raw("SUBSTRING(v.inicio_mes,1,7)"), '=', $this->data)
                        ;
                    })
                    ->leftjoin('financeiro_pagamentos_feitos as p', function($pago) {
                        $pago->on('c.id', '=', 'p.id_conta')
                        ->where(DB::raw("SUBSTRING(p.mes_referencia,1,7)"), '=', $this->data)
                        ->where('p.numero_cheque', '>', '');
                    })
                    ->leftjoin('valor_contas_a_pagar as a', function($anterior) {
                        $anterior->on('c.id', '=', 'a.codigo')
                        ->where(DB::raw("SUBSTRING(a.inicio_mes,1,7)"), '=', $this->dataAnterior);
                    })
                    ->where(DB::raw("SUBSTRING(c.inicio_conta,1,7)"), '<=', $this->data)
                    ->where(DB::raw("SUBSTRING(c.fim_conta,1,7)"), '>=', $this->data)
                    ->orwhere(DB::raw("SUBSTRING(c.inicio_conta, 1,7)"), '<=', $this->data)
                    ->where(DB::raw("SUBSTRING(c.fim_conta,1,7)"), '=', '')
                    ->distinct()
                    ->get();
           
    }
    
    public function selectMesAnterior($id){
                        $this->contaanterior = DB::table('valor_contas_a_pagar as v')
                        ->where('v.codigo', '=', $id)
                        ->where(DB::raw("SUBSTRING(v.inicio_mes,1,7)"), '<', $this->data)
                        ->orderby('inicio_mes', 'desc')
                        ->get();
                        return($this->contaanterior);                    
    }

    public function selectDoisMesesAnterior($id){
        $this->valorDoisMesesAnterior = DB::table('valor_contas_a_pagar as v')
                            ->where('v.codigo', '=', $id)
                            ->where(DB::raw("SUBSTRING(v.inicio_mes,1,7)"), '=', $this->dataMenosDois)
                            ->orderby('inicio_mes', 'desc')
                            ->get();
                            return($this->valorDoisMesesAnterior);
    }

    public function selectValorVazioParcelado($id){
        $this->valorVazioParcelado = DB::table('valor_contas_a_pagar as v')
                            ->where('v.codigo', '=', $id)
                            ->where(DB::raw("SUBSTRING(v.inicio_mes,1,7)"), '<', $this->data)
                            ->orderby('inicio_mes', 'asc')
                            ->get();
                            return($this->valorVazioParcelado);
    }

    public function lista(){     
                    foreach ($this->contas as $conta) {
                
            
                /* ############# PEGA O DIA ################ */      
                
                $conta->dia = date('d', strtotime($conta->inicio_conta));            

                /* ############# VERIFICA SE O VALOR È VAZIO, SE TIVER MUDA VALOR PARA O ANTERIOR ################ */
                    if (isset($conta->favorecido) == false) {
                    $this->selectMesAnterior($conta->id);
                    foreach ($this->contaanterior as $anterior) {
                        $conta->favorecido = $anterior->favorecido;
                        $conta->item = $anterior->item;
                        $conta->ccustos = $anterior->ccustos;
                    }
                }

                /* ############# REPETE O VALOR DO FIXO APENAS POR 2 MESES ################ */
                if (($conta->valor_anterior == "") and ($conta->tipo == "Fixo") or ($conta->tipo == "Fixo") and ($conta->valor_anterior == null)){
                        $this->selectDoisMesesAnterior($conta->id);
                        foreach ($this->valorDoisMesesAnterior as $anteriorNull) {
                            $conta->valor_anterior = $anteriorNull->valor;
                    }
                }            
                
                /* ############# MUDANÇAS CASO O VALOR SEJA PARCELADO ################ */
                if ($conta->tipo == "Parcelado") {

                        $p_cont = 1;
                        

                        while ($conta->inicio_conta < $this->data) {
                        $p_cont += 1;
                        $conta->inicio_conta = date('Y-m', strtotime("+1 months", strtotime($conta->inicio_conta)));

                    }

                    $conta->parcelas = "$p_cont/$conta->parcelas";
                    
                    
                    /* ############# VERIFICA SE O VALOR ATUAL É VAZIO E ATRIBUI O ÚLTIMO VALOR ################ */
                    if ($conta->valor == "" and $conta->tipo_parcela !== "Especial" or $conta->valor == "NULL" and $conta->tipo_parcela !== "Especial") {
                            $this->selectValorVazioParcelado($conta->id);
                            foreach ($this->valorVazioParcelado as $valorVazioParcela) {
                            $conta->valor = $valorVazioParcela->valor;
                        }
                    }
                    
                    /* ############# VERIFICA SE O VALOR ANTERIOR É VAZIO E ATRIBUI O ÚLTIMO VALOR ################ */
                    if ($conta->valor_anterior == "" and $p_cont > 1 or $conta->valor_anterior == "NULL" and $p_cont > 1) {
                        $contaparcelada = DB::table('valor_contas_a_pagar as v')
                                ->where('v.codigo', '=', $conta->id)
                                ->where(DB::raw("SUBSTRING(v.inicio_mes,1,7)"), '<', $this->data)
                                ->orderby('inicio_mes', 'asc')
                                ->get();

                        foreach ($contaparcelada as $ctparcelada) {
                            $conta->valor_anterior = $ctparcelada->valor;
                        }
                    }
                }

                /* ############# FILTROS ################ */      
                
             
                
                if($this->areafiltro!= "Todos"){
                $this->contas = $this->contas->where('area', $this->areafiltro);
                }

                if($this->contafiltro != "Todos"){
                $this->contas = $this->contas->where('contas', $this->contafiltro);
                }

                if($this->pagadorfiltro != "Todos"){
                    $this->contas = $this->contas->where('pagador', $this->pagadorfiltro);
                }            

                          
                /* ############# ORDENAÇÃO ################ */            
            }

            $this->contas = $this->contas->where('dia','>=', $this->diaInicial);                 
            $this->contas = $this->contas->where('dia','<=', $this->diaFinal); 
            
                $contas = $this->contas->toArray();
                
                $contas = collect($contas);
            
                $contas = $contas->sortBy($this->ordenacao);

                

            foreach ($contas as $conta) {

                

                /* ############# REMOVENDO VIRGULAS PARA SOMAR ################ */

                $conta->valor_anterior = str_ireplace(".", "", $conta->valor_anterior);
                $conta->valor_anterior = str_ireplace(",", ".", $conta->valor_anterior);
                $conta->valor = str_ireplace(".", "", $conta->valor);
                $conta->valor = str_ireplace(",", ".", $conta->valor);

            
                /* ############# SOMAS ################ */
                if ($conta->tipo == "Extra") {
                    $this->somaextra += $conta->valor;
                } else {
                    if (($conta->tipo == "Fixo")and ( $conta->suspenso == "Sim")) {
                        $conta->valor = 0;
                    } else {
                        $this->somaatual += $conta->valor;
                    }
                }
                /* ############# SOMA TOTAL ESTIMADO ################ */
                $this->porcentagemconta = '';
                if (($conta->tipo !== "Extra") and ( $conta->valor == "") and ( $conta->valor_anterior > "") and ( $conta->suspenso !== "Sim")) {
                    $this->estimadonaolancado += $conta->valor_anterior;
                }

                /* ############# SIMBOLO PARA PAGAMENTO EMITIDO ################ */
                if ($conta->tipo_pagamento == "Cheque") {
                    $conta->tipo_pagamento = "#2196f3";
                    $this->totalpago += $conta->valor;
                } elseif (($conta->tipo == "Fixo")and ( $conta->suspenso == "Sim")) {
                    $conta->tipo_pagamento = "#2196f3";
                } elseif ($conta->tipo_pagamento == "Transferência") {
                    $conta->tipo_pagamento = "#2196f3";
                    $this->totalpago += $conta->valor;
                }
                elseif ($conta->tipo_pagamento == "Cartão") {
                        $conta->tipo_pagamento = "#2196f3";
                        $this->totalpago += $conta->valor;

                        
                } elseif ($conta->tipo_pagamento == "" and $conta->valor > "") {
                    $conta->tipo_pagamento = "<input type='checkbox' form='form-emitir' name='check_list[]' value='$conta->id' class='checkbox-inline'></input>";
                }

                
                if ($conta->valor > '') {
                    $conta->valor = number_format($conta->valor, 2, ',', '.');
                }
            }

            /* ############# SOMA OS TOTAIS ################ */
            $totalsomames = $this->somaextra + $this->somaatual;
            $apagar = $totalsomames - $this->totalpago;
            $totalestimado = $totalsomames + $this->estimadonaolancado;
            $necessidadefluxo = $totalestimado - $this->totalpago;


            /* ############# FORMATA OS NUMEROS COM VIRGULA ################ */
            $totalsomames = number_format($totalsomames, 2, ',', '.');
            $this->somaextra = number_format($this->somaextra, 2, ',', '.');
            $this->somaatual = number_format($this->somaatual, 2, ',', '.');
            $this->totalpago = number_format($this->totalpago, 2, ',', '.');
            $apagar = number_format($apagar, 2, ',', '.');
            $this->estimadonaolancado = number_format($this->estimadonaolancado, 2, ',', '.');
            $totalestimado = number_format($totalestimado, 2, ',', '.');
            $necessidadefluxo = number_format($necessidadefluxo, 2, ',', '.');

            /* ############# VERIFICA SE O VALOR FOI SUSPENSO E COLOCA ... ################ */
            foreach ($contas as $conta) {
                if (($conta->tipo == "Fixo")and ( $conta->suspenso == "Sim")) {
                    $conta->valor = "...";
                }

                
            }

        

            foreach ($contas as $conta) {
                if ($conta->tipo == "Extra"){
                    $conta->tipo = "Á vista";
                }
            }

            $area = DB::table('area')
            ->orderBy('ordem','asc')
            ->get();            

            $conta = DB::table('conta')
            ->orderBy('ordem','asc')
            ->get(); 

            $dataatualcompleta = date('d-m-Y');

            /* ############# ARRAY QUE CONTEM TODOS OS DADOS ################ */
            $this->dados = array(
                'contas' => $contas,
                'somaextra' => $this->somaextra,
                'somaatual' => $this->somaatual,
                'totalsomames' => $totalsomames,
                'estimadonaolancado' => $this->estimadonaolancado,
                'porcentagemconta' => $this->porcentagemconta,
                'dataatual' => $this->data,
                'totalpago' => $this->totalpago,
                'apagar' => $apagar,
                'totalestimado' => $totalestimado,
                'necessidadedefluxo' => $necessidadefluxo,
                'mes' => $this->mes,
                'ano' => $this->ano,
                'nomeMes' => $this->nomeMes,
                'mesPosterior' => $this->mesPosterior,
                'mesAnterior' => $this->mesAnterior,
                'anoPosterior' => $this->anoPosterior,
                'anoAnterior' => $this->anoAnterior,
                'mesConst' => $this->mes_atual,
                'anoConst' => $this->ano_atual,
                'all_area' => $area,
                'all_conta' => $conta,
                'areafiltro' => $this->areafiltro,
                'pagadorfiltro' => $this->pagadorfiltro,
                'contafiltro' => $this->contafiltro,
                'ordenacao' => $this->ordenacao,
                'aprovados' => $this->aprovados,
                'dataatualcompleta' => $dataatualcompleta,
                'diaInicial' => $this->diaInicial,
                'diaFinal' => $this->diaFinal,
            );

            /* ############# RETORNO DOS DADOS PARA O CONTROLLER ################ */
            return $this->dados;
    }
    
    public function salvar($dados){
        $tipo = $dados['tipo'];
        $favorecido = trim($dados['favorecido']);
        $item = $dados['item'];
        $inicio_conta = $dados['inicio_conta'];
        $valor = $dados['valor'];
        $parcelas = $dados['parcelas'];
        $area = $dados['area'];
        $ccustos = $dados['ccustos'];
        $fim_conta = "";
        $pagador = $dados['pagador'];

        $select_favorecido = DB::table('fornecedor_contas_a_pagar')
        ->where('fornecedor','=',$favorecido)
        ->count();

        if($select_favorecido < 1){
            
            try{
                DB::table('fornecedor_contas_a_pagar')->insert(['fornecedor' => $favorecido]);
            }catch(\Expection $e){
                echo dd($e);
            }
        }

        /* SELECT E INSERT NA TABELA CASO NÂO TENHA */
        $select_area = DB::table('area')
        ->where('nome','=',$area)
        ->count();

        if($select_area < 1){
            
            try{
                DB::table('area')->insert(['nome' => $area]);
            }catch(\Expection $e){
                echo dd($e);
            }
        }
   

        /* SELECT E INSERT NA TABELA CASO NÂO TENHA */
        $select_conta = DB::table('conta')
        ->where('nome','=',$ccustos)
        ->count();

        if($select_conta < 1){
              try{
                DB::table('conta')->insert(['nome' => $ccustos]);
            }catch(\Expection $e){
                echo dd($e);
            }

        }



            
            if($tipo == "Extra"){
                $parcelas = "";
                
                $inicio_conta = date('Y-m-d', strtotime($inicio_conta));
                $fim_conta = $inicio_conta;
            }

            if($tipo == "Parcelado"){
            $parcelas_menos_um = $parcelas -1;    
            $inicio_conta = date('Y-m-d', strtotime($inicio_conta));
            $fim_conta = date('Y-m-d',strtotime(date('Y-m-d', strtotime($inicio_conta)) . "+$parcelas_menos_um month"));
                
        }
            
        
            $contas_insert = array('tipo' => $tipo, 
                'inicio_conta' => $inicio_conta,
                'fim_conta' => $fim_conta,
                'parcelas' => $parcelas,
                'area' => $area,
                'contas' => $ccustos,
                'tipo' => $tipo,
                'pagador' => $pagador,
            );

            try{
            DB::table('contas_a_pagar')->insert($contas_insert);
        }catch(\Expection $e){
            echo dd($e);
        }
        
            /* Seleciona o último id para fazer o insert na tabela de valor */
            $id_select = DB::table('contas_a_pagar')
            ->distinct('id')
            ->select('id')
            ->orderBy('id', 'asc')
            ->get();
            
            foreach($id_select as $nm_id){

            $id = $nm_id->id;
                $valor_insert = array(
                'codigo' => $id,
                'inicio_mes' => $inicio_conta,
                'ccustos' => $ccustos,
                'item' => $item,
                'favorecido' => $favorecido,
                'valor' => $valor
            );
        }

        try{
            DB::table('valor_contas_a_pagar')->insert($valor_insert);
        }catch(\Expection $e){
            echo dd($e);
        }
 

    }

}
