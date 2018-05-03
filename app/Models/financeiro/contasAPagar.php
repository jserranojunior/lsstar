<?php

namespace App\Models\financeiro;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\financeiro\valorContasAPagar;
use App\Models\areas;
use App\Models\contas_a_pagar;
use App\Models\valor_contas_a_pagar;
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

    public function relatorioPorUnidade(){

        $count = 0;
        $dados = array();

       setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
	date_default_timezone_set('America/Sao_Paulo');

        $dataInicio = "2018-01";
        $dataFim = "2018-12";

        $dataInicioMeses = $dataInicio;
        
        /* MES TOPO */
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
            $dataInicioMeses = date('Y-m', strtotime("+1 months", strtotime($dataInicioMeses)));
            $count += 1;
        }

        $categorias = $this->categoria::all();   
        $categorias = $this->categoria->orderBy('nome', 'asc')->get();
           
        foreach($categorias as $categoria){
          
            $data = $dataInicio;
            $totalAnualCategoria = 0;

            while($data <= $dataFim){
                $numeroMes = date('m', strtotime($data));
                $nomeMes = date('M', strtotime($data));
                $ano = date('Y', strtotime($data));
    
               $dados[$categoria->nome]['nome'] = $categoria->nome;
                $dados[$categoria->nome]['meses'][$count]['numeroMes'] =  $numeroMes;
                $dados[$categoria->nome]['meses'][$count]['nomeMes'] = $nomeMes;
                $dados[$categoria->nome]['meses'][$count]['ano'] = $ano;

                // antigo
                $contas = $this->contas->contaMensal($data);
            
                        $contas = $contas->where('area', 'Administrativo'); 
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
                                $valores->valor = str_ireplace(".","",$valores->valor); //remove o separador de milhares
                                $valores->valor = str_ireplace(",",".",$valores->valor); //substitui a virgula por ponto   
                                $conta->valor =  $valores->valor;
                            }                
                        }                        
                            
                            $total = $contas->sum('valor');  
                            $dados[$categoria->nome]['meses'][$count]['valor'] = $total;
                            $dados[$categoria->nome]['meses'][$count]['categoria'] = $categoria->nome;

                            
                            $totalAnualCategoria += $total;
                            
    
                $data = date('Y-m', strtotime("+1 months", strtotime($data)));
                $count += 1;
            }
            $dados[$categoria->nome]['totalAnualCategoria'] = $totalAnualCategoria;
            // return($dados);
        
           // $categoria->meses = $meses;
           
        }

        $dados = array('relatorio' => $dados, 'mesesTopo' => $meses);
        
       return($dados);
    }




    public function valorContasAPagar()
    {        
        return $this->hasOne('App\Models\Financeiro\valorContasAPagar');
    }

    public function allBillsPay(){
        $this->bills = self::all(); 
        return($this->bills);
    }

    public function allPayMounth(){
        $this->bills = $this->allBillsPay();
        $this->bills = $this->bills->where('inicio_conta','>=','2017-06-01')        
                        ->where('inicio_conta','<=','2017-06-30');            
        $this->bills =  $this->bills->where('area','Jardim Asturias');
       echo $this->bills->id;
        return($this->bills);
    }





}
