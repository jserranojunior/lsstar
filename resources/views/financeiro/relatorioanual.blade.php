@extends('layouts.header')
@section('content')



 <!-- PANEL 2 -->
<div class="col-md-4 no-print">
    
            <a href="{{route('financeiro.index')}}"> 
                
                <div class="btn btn-primary no-print">
                
                    <span class="glyphicon glyphicon-arrow-left "></span>  Voltar
                </div>
            </a>  
            
        
</div> <!--
<div class="col-md-4  no-print">
    <div class="box box-info">
        <div class="box-header with-border">
                                        
                                        <form method="post" action="{{route('financeiro.anual')}}" id="formularioano" name="formularioano">
                                        <div class="col-md-6">
                                        <label class="text-center bold"> SELECIONE O ANO </label>
                                        </div>
                                            <div class="col-md-6">
                                            <select name="ano" class="form-control" id="ano" >
                                                
                                                <option @if( $ano == 2017) SELECTED @endif >2017</option>
                                                <option @if( $ano == 2018) SELECTED @endif>2018</option>
                                                <option @if( $ano == 2019) SELECTED @endif>2019</option>
                                            </select>
                                            </div>
                                            <input type="hidden" form='formularioano'  name="_token" value="{{ csrf_token() }}">
                                                
                                        </form>
        </div>                                    
    </div>
</div>
-->
<div class="col-md-4 col-md-offset-4 text-right no-print">
    <input type="button" class="esquerda btn btn-success excel btn" id="btnExport"  value="Excel">            
</div>

@foreach($dadosAnuais as $listaAnual)


<div class="tabela-geral">
<div class="row row-text">
   <div class="col-md-12">
      <h5 class="text-center rel-mes-ano">Relatório Anual {{$listaAnual['anoContas']}} - 
         Movimentação financeira por unidade de negócio
      </h5>
   </div>
</div>
<table class="table table-condensed" id="tabelaprincipal">
<thead>
   <tr>
      <th>
         Área
      </th>
      <th class="point point-link text-center" onclick="enviar('favorecido',{{1}},{{$listaAnual['anoContas']}},'Todos','Todos');">
         Jan
      </th>
      <th class="point point-link text-center" onclick="enviar('favorecido',{{2}},{{$listaAnual['anoContas']}},'Todos','Todos');">
         Fev
      </th>
      <th class="point point-link text-center" onclick="enviar('favorecido',{{3}},{{$listaAnual['anoContas']}},'Todos','Todos');">
         Mar
      </th>
      <th class="point point-link text-center" onclick="enviar('favorecido',{{4}},{{$listaAnual['anoContas']}},'Todos','Todos');">
         Abr
      </th>
      <th class="point point-link text-center" onclick="enviar('favorecido',{{5}},{{$listaAnual['anoContas']}},'Todos','Todos');">
         Mai
      </th>
      <th class="point point-link text-center" onclick="enviar('favorecido',{{6}},{{$listaAnual['anoContas']}},'Todos','Todos');">
         Jun
      </th>
      <th class="point point-link text-center" onclick="enviar('favorecido',{{7}},{{$listaAnual['anoContas']}},'Todos','Todos');">
         Jul
      </th>
      <th class="point point-link text-center" onclick="enviar('favorecido',{{8}},{{$listaAnual['anoContas']}},'Todos','Todos');">
         Ago
      </th>
      <th class="point point-link text-center" onclick="enviar('favorecido',{{9}},{{$listaAnual['anoContas']}},'Todos','Todos');">
         Set
      </th>
      <th class="point point-link text-center" onclick="enviar('favorecido',{{10}},{{$listaAnual['anoContas']}},'Todos','Todos');">
         Out
      </th>
      <th class="point point-link text-center" onclick="enviar('favorecido',{{11}},{{$listaAnual['anoContas']}},'Todos','Todos');">
         Nov
      </th>
      <th class="point point-link text-center" onclick="enviar('favorecido',{{12}},{{$listaAnual['anoContas']}},'Todos','Todos');">
         Dez
      </th>
      <th>
         TOTAL
      </th>
   </tr>






    @foreach($listaAnual['unidades'] as $dado)
    <tr>
            <td>
            {{ $dado['unidade'] }}
            </td>
            
            @foreach($dado['valor'] as $val)
               <td  class="text-right point point-link" onclick="enviar('favorecido',{{$val['mes']}},{{$listaAnual['anoContas']}},'{{$val['unidade']}}','Todos');">
                    {{ $val['valor']}}
                </td>
            @endforeach
            @foreach($dado['total'] as $total)
        <td class="bold text-warning text-right">
            {{ $total }}
        </td>
    @endforeach
        </tr>
    @endforeach


    @foreach($listaAnual['valores'] as $dadosGerais)
        <tr>
    <td>
        <span class="bold">TOTAL</span>
    </td>    

    @foreach($dadosGerais  as $totais)
       
        
        <td class="text-primary bold text-right point point-link"  onclick="enviar('favorecido',{{$totais['mes']}},{{$listaAnual['anoContas']}},'Todos','Todos');">
        {{ $totais['valorTotal'] }}
        </td>
    @endforeach
    <td class="text-success bold text-right">
    {{$listaAnual['totalano']}}
    </td>
</tr>
    @endforeach
    </thead>
    <tbody>       
    
    </tbody>
</table>
</table>

@endforeach

<script>
    $(document).ready(function(){
        $('#ano').on('change', function(){
          
            $('#formularioano').submit();
        });
    });


/* EXPORTAR EXCEL */

$(document).ready(function () {
        $data = Date('d-m-Y');
        $nomearquivo = 'relatorioanual';
        $("#btnExport").click(function () {
            $("#tabelaprincipal").btechco_excelexport({
                containerid: "tabelaprincipal"
               , datatype: $datatype.Table
               , filename: $nomearquivo
            });
        });
    });



</script>
@endsection

<form method="post" action="{{Route('financeiro.index')}}" name="formulario" id="formulariofiltros">
                                            <input type="hidden" value="" name="mes" id="mes">
                                            <input type="hidden" value="" name="ano" id="anofiltro">
                                            <input type="hidden" value="" name="areafiltro" id="areafiltro">
                                            <input type="hidden" value="" name="contafiltro" id="contafiltro">
                                            <input type="hidden" value="" name="ordenacao" id="ordenacao">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form> 

                            <script>
function enviar(ordenacao, mes, ano, areafiltro, contafiltro){
  var ordenacao;
var mes;
var ano;
var areafiltro
var contafiltro

document.getElementById('mes').value = mes;
document.getElementById('anofiltro').value = ano;
document.getElementById('ordenacao').value = ordenacao;
document.getElementById('areafiltro').value = areafiltro;
document.getElementById('contafiltro').value = contafiltro;

document.getElementById("formulariofiltros").submit();
}



</script>

