<?php

namespace App\Models\financeiro;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\financeiro\valorContasAPagar;
use App\Models\areas;
use App\Models\tables\contas_a_pagar;
use App\Models\tables\valor_contas_a_pagar;
use App\Models\conta;

class contasAPagar extends Model
{
    protected $table = "contas_a_pagar";

    public function __construct(conta $categorias, areas $areas,contas_a_pagar $contas_a_pagar, valor_contas_a_pagar $valoresContasAPagar){
        $this->areas = $areas;
        $this->contas = $contas_a_pagar;
        $this->valoresContasAPagar = $valoresContasAPagar;
        $this->categoria = $categorias;
    }

    public function relatorioPorUnidade($request){
        $request = array();
        if(!isset($_POST['area'])){
            $area = 'Administrativo';
        }else {
            $area = $_POST['area'];
        }
        if(!isset($_POST['mesInicio'])){
            $mesInicio =  date('m');
        }else {
            $mesInicio = $_POST['mesInicio'];
        }
        if(!isset($_POST['anoInicio'])){
            $anoInicio =  date('Y');
        }else {
            $anoInicio = $_POST['anoInicio'];
        }        
        $dataInicio = "$anoInicio-$mesInicio";
        if(!isset($_POST['anoInicio']) or !isset($_POST['mesInicio'])){
            $dataInicio = date('Y-m', strtotime("-12 months", strtotime($dataInicio)));
            $anoInicio = date('Y', strtotime($dataInicio));
        }
        if(!isset($_POST['mesFim'])){
            $mesFim =  date('m');
        }else {
            $mesFim = $_POST['mesFim'];
        }
        if(!isset($_POST['anoFim'])){
            $anoFim =  date('Y');
        }else {
            $anoFim = $_POST['anoFim'];
        }

        $dataFim = "$anoFim-$mesFim";   
        $count = 0;
        $dados = array();        
        $valorTotalAno = 0; 
        if($dataInicio > $dataFim){
            $dataFim = date('Y-m', strtotime("+12 months", strtotime($dataInicio)));
            $mesFim = date('m', strtotime($dataFim));
            $anoFim = date('Y', strtotime($dataFim));
        }

        $area = $area;
        $dataInicio = $dataInicio;
        $dataFim = $dataFim;
        $dataInicioMeses = $dataInicio;
        $areas = $this->areas->select('nome', 'ordem')->orderBy('ordem')->get();     
               
        /* MES TOPO || MES SOMA ANUAL || MES SOMA CATEGORIA ANUAL*/
        
        while($dataInicioMeses <= $dataFim){
            $numeroMes = date('m', strtotime($dataInicioMeses));
            $nomeMes = date('M', strtotime($dataInicioMeses));
            $ano = date('Y', strtotime($dataInicioMeses));
            switch ($nomeMes) {
                case "Feb":    $nomeMes = "Fev";   break;  
                case "Apr":    $nomeMes = "Abr";       break;
                case "May":    $nomeMes = "Mai";        break;
                case "Aug":    $nomeMes = "Ago";      break;
                case "Sep":    $nomeMes = "Set";    break;
                case "Oct":    $nomeMes = "Out";     break;
                case "Dec":    $nomeMes = "Dez";    break; 
         }        

            $meses[$count]['numeroMes'] =  $numeroMes;
            $meses[$count]['nomeMes'] = $nomeMes;
            $meses[$count]['ano'] = $ano;

            $dataInicioMeses = date('Y-m', strtotime($dataInicioMeses));  

         $totaisDoMes  = $this->contas->contasMensais($dataInicioMeses);        
         $totaisDoMes = $totaisDoMes->where('area', $area);         

        

         

                         foreach($totaisDoMes as $totalMes){
                            $valoresContasAPagar = $this->valoresContasAPagar::where('codigo', $totalMes->id) 
                            ->where(DB::raw("SUBSTRING(inicio_mes,1,7)"), '=', $dataInicioMeses)      
                            ->orWhere('codigo', $totalMes->id)
                            ->where(DB::raw("SUBSTRING(inicio_mes,1,7)"), '<=', $dataInicioMeses)  
                            ->orderBy('id', 'desc')    
                            ->take(1)
                            ->select('valor', 'codigo')
                            ->get();

                            // dd($valoresContasAPagar);
                            
                            foreach($valoresContasAPagar as $valores){
                                ///$valores->valor = str_ireplace(".","",$valores->valor); //remove o separador de milhares
                                //$valores->valor = str_ireplace(",",".",$valores->valor); //substitui a virgula por ponto   
                                $totalMes->valor =  $valores->valor; 
                                $totalMes->codigo =  $valores->codigo;                             
                            }                
                        }
                        
                      

                     $valorTotalAno += $totaisDoMes->sum('valor');
                     $meses[$count]['valoresTotais'] = $totaisDoMes->sum('valor'); 
                     $meses[$count]['valoresTotais'] = number_format($meses[$count]['valoresTotais'], 2,',','.');    

            $dataInicioMeses = date('Y-m', strtotime("+1 months", strtotime($dataInicioMeses)));
            $count += 1;
        }

        $categorias = $this->categoria::all();   
        $categorias = $this->categoria->orderBy('ordem', 'asc')->get();   
        
        /* LAÇO DE CATEGORIA E SOMA MENSAL */
        foreach($categorias as $categoria){
          
            $data = $dataInicio;
            $totalAnualCategoria = 0;

            while($data <= $dataFim){
                $numeroMes = date('m', strtotime($data));
                $nomeMes = date('M', strtotime($data));
                $ano = date('Y', strtotime($data));
    
                $dados[$categoria->nome]['ordem'] = $categoria->ordem;
               $dados[$categoria->nome]['nome'] = $categoria->nome;
                $dados[$categoria->nome]['meses'][$count]['numeroMes'] =  $numeroMes;
                $dados[$categoria->nome]['meses'][$count]['nomeMes'] = $nomeMes;
                $dados[$categoria->nome]['meses'][$count]['ano'] = $ano;

                // antigo
                $contas = $this->contas->contasMensais($data);
            
                        $contas = $contas->where('area', $area); 
                        $contas = $contas->where('contas', $categoria->nome); 
                         /* VALORES */
                         foreach($contas as $conta){
                            $valoresContasAPagar = $this->valoresContasAPagar::where('codigo', $conta->id) 
                            ->where(DB::raw("SUBSTRING(inicio_mes,1,7)"), '=', $data)      
                            ->orWhere('codigo', $conta->id)
                            ->where(DB::raw("SUBSTRING(inicio_mes,1,7)"), '<=', $data)      
                            ->take(1)
                            ->select('valor')
                            ->get();
                            
                            foreach($valoresContasAPagar as $valores){
                                //$valores->valor = str_ireplace(".","",$valores->valor); //remove o separador de milhares
                               // $valores->valor = str_ireplace(",",".",$valores->valor); //substitui a virgula por ponto   
                                $conta->valor =  $valores->valor;
                                //$conta->valorExibir = number_format($conta->valor, 2,'.',',');
                            }                
                        }                        
                            
                            $total = $contas->sum('valor');                              
                            $dados[$categoria->nome]['meses'][$count]['valor'] = $total;
                            $dados[$categoria->nome]['meses'][$count]['categoria'] = $categoria->nome;
                            
                            $totalAnualCategoria += $total;                            
    
                $data = date('Y-m', strtotime("+1 months", strtotime($data)));
                $count += 1;
            }
            $dados[$categoria->nome]['totalAnualCategoria'] = number_format($totalAnualCategoria, 2,',','.');           
        }

      
        $valorTotalAno = number_format($valorTotalAno, 2,'.',',');

        $dados = array(
            'relatorio' => $dados, 
            'mesesTopo' => $meses, 
            'valorTotalAno' => $valorTotalAno, 
            'area' => $area,
            'mesInicio' => $mesInicio,
            'mesFim' => $mesFim,
            'anoInicio' => $anoInicio,
            'anoFim' => $anoFim,
            'areas' => $areas,
        );        
       return($dados);
    }

    public function valorContasAPagar(){       
        return $this->hasOne('App\Models\Financeiro\valorContasAPagar');
    }


    public function allPayMounth($mesAno){
        $this->data = $mesAno;
        $contas = $this->contas->contasMensais($this->data);  
                 
            foreach($contas as $conta){              
                $valoresContasAPagar = $this->valoresContasAPagar->valorParaPagar($this->data, $conta->id);
                foreach($valoresContasAPagar as $valores){
                    $conta->valor = $valores->valor;
                    $conta->item = $valores->item;
                    $conta->ccustos = $valores->ccustos;
                    $conta->favorecido = $valores->favorecido;
                    $conta->dia = date('d', strtotime($valores->inicio_mes));                    
                }                                              
            }
           
           
           // SOMAR $contasSoma = $contas->sum('valor');
        return($contas);
    }

}
