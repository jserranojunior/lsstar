@extends('v1.layouts.header')
@section('content')





<div class="row justify-content-center">

    <contas-a-pagar></contas-a-pagar>

  
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