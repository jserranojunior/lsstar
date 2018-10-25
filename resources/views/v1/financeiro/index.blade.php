@extends('v1.layouts.header')
@section('content')





<div class="row justify-content-center">

    <contas-a-pagar></contas-a-pagar>

  <div class="col-md-3 col-md-offset-4">
    <div class="box">
      <div class="box-header">
        <div class="text-center">
          <h6>DATA</h6>
        </div>
        <div class="row">
          <div class="col-sm col-xs-6">
            <div class="btn-group">


              <button class="btn btn-default dropdown-toggle widcem" type="button" id="dropdownMenu1" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="true">
                <a href="#">
                    {{$datas['mesAtualEscrito'] }}
                  <span class="caret"></span>
                </a></button><a href="#">
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">                
                  @foreach($datas['meses'] as $meses)
                <li>                  
                    <a class="dropdown-item" href="?data={{$datas['anoAtual']}}-{{$meses['numero']}}&diaInicial={{$datas['diaInicial']}}&diaFinal={{$datas['diaFinal']}}&ordem={{$filtros['ordem']}}&area={{$filtros['area']}}">{{$meses['nome']}}</a>
                  </li> 
                @endforeach               
              </ul>

            </div>
          </div>
          <div class="col-sm col-xs-6 float-right">
            <div class="btn-group  float-right">
              <button type="button" class="float-right btn-sm btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                {{$datas['anoAtual']}}
              </button>
              <div class="dropdown-menu">
                @foreach($datas['anos'] as $anos)
                <a class="dropdown-item" href="?data={{$anos['numero']}}-{{$datas['mesAtual']}}&diaInicial={{$datas['diaInicial']}}&diaFinal={{$datas['diaFinal']}}&ordem={{$filtros['ordem']}}&area={{$filtros['area']}}">{{$anos['numero']}}</a>
                @endforeach
              </div>
            </div>
          </div>
        </div>



        <div class="row row-space">
          <div class="col-md text-center">
            <a class="btn btn-default btn-xs " href="">Anterior</a>
            <a class="btn btn-default btn-xs float-center" href="/financeiro">Atual</a>
            <a class="btn btn-default btn-xs " href="">Pŕoximo</a>
          </div>
        </div>

      </div>


    </div>
  </div>
</div>



<div class="row">
  <div class="col-md-12">
    <table class=" table table-condensed no-padding table-striped table-bordered table-hover" id="tabelaprincipal">

      <tbody>
        <span class="invisible"> {{($i = 1)}} </span>
        <form method="post" action="financeiro/emitirpagamento" name="form-emitir" id="form-emitir">
          @foreach($contas as $conta)
          <tr class="point">
            <td>
              {{$i++}}
            </td>
            <td>
              {{$conta->area}}
            </td>
            <td>
              {{$conta->ccustos}}
            </td>
            <td>
              {{$conta->tipo}}
            </td>
            
              @if($conta->valor_pago  > '')

              <td class="td-without-padding text-center">

                  <span class=" btn-pagar " style="background-color: #2196f3;">  
                  </span>

                </td>

              
              @else()
           <td class="td-without-padding text-center">
              <span class=" btn-pagar btn-warning" style="background-color: #7f8487;">
                  </span>
           </td>
              @endif
            

            <td>
              {{$conta->favorecido}}
            </td>
            <td>
              {{$conta->pagador}}
            </td>
            <td>
              {{$conta->dia}}
            </td>
            <td>
              {{number_format($conta->valor, 2, ',', '.')}}
            </td>
            
          </tr>
          @endforeach
        </form>
        
        

        <tr>
            <td colspan="5"></td>
            <td  class="azulclaro" colspan="2">
              <span class="bold  numaior direita">TOTAL DO MÊS</span>
            </td>
            <td  class="azulclaro"></td>
            <td  class="azulclaro" colspan="1">
              <span class="bold numaior  direita azul">
                <p class="centronum">{{number_format($total, 2, ',', '.')}}</p>
              </span>
            </td>
        </tr>
        <tr class="trcolor">
            <td colspan="6"> Total de pendencias: </td>
            <td class="" colspan="1">
              <span class="direita">Total pago</span>
            </td>
            <td></td>
            <td class="">
              <span class="direita">{{number_format($somaValorPago, 2, ',', '.')}}
              </span>
            </td>
          </tr>

          <tr class="trcolor">
              <td colspan="6"></td>
              <td class="" colspan="1">
                <span class="direita">A pagar</span>
              </td>
              <td></td>
              <td class="">
                <span class="direita">
                    {{number_format($valorTotalPagar, 2, ',', '.')}}               
                </span>
              </td>
            </tr>

        <tr>
            <td colspan="5"></td>
            <td  class="azulclaro" colspan="2">
              <span class="bold  numaior direita">TOTAL ESTIMADO</span>
            </td>
            <td  class="azulclaro"></td>
            <td  class="azulclaro" colspan="1">
              <span class="bold direita numaior  azul">
                <p class="centronum">{{number_format($total, 2, ',', '.')}}</p>
              </span>
            </td>
        </tr>


        
      
      </tbody>
    </table>
  </div>
</div>

@endsection