@extends('layouts.header')
@section('content')

<div class="atualizar" onunload="window.opener.location.reload();">
</div>

<div class="parte-cima">    
    <div class="row">

     <!-- PANEL 1 -->
     <div class="col-md-4 col-md-offset-2 ">
                                <div class="box box-warning">
                                    <div class="box-header with-border">
                                        <p class="center bold">Filtros</p> 
                                    </div>
                                    <div class="box-body">                                    
                                    <div class="col-md-6">
                                                                        <ul class="nav nav-tabs">
                                                                            <li class="dropdown @if($areafiltro != "Todos")filtroselect @endif">
                                                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                                                    Áreas<span class="caret"></span></a>
                                                                                <ul class="dropdown-menu">
                                                                                <li><a href="#" onclick="enviar('{{$ordenacao}}',{{$mes}},{{$ano}}, 'Todos', '{{$contafiltro}}')">Todos</a></li>
                                                                                
                                                                                    @foreach($all_area as $f_area)
                                                                                <li><a href="#" onclick="enviar('{{$ordenacao}}',{{$mes}},{{$ano}}, '{{$f_area->nome}}', '{{$contafiltro}}')">{{$f_area->nome}}</a></li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </li>
                                                                        </ul>
                                                                       
                                                                    </div> 
                                                                    <div class="col-md-6">
                                                                    <ul class="nav nav-tabs">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                Ordem
                                <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#" onclick="enviar('favorecido',{{$mes}},{{$ano}}, '{{$areafiltro}}', '{{$contafiltro}}')">Alfabética</a></li>
                                                <li><a href="#" onclick="enviar('dia',{{$mes}},{{$ano}}, '{{$areafiltro}}', '{{$contafiltro}}')">Cronológica</a></li>
                                        
                                            </ul>
                                        </li>
                                    </ul>
                                    </div>
                                    </div>
                                                                    <br>

                                   
                                </div>
                            </div>  
                                 

                            <!-- PANEL 2 -->
                            <div class="col-md-4">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <p class="center bold"> Data </p>
                                    </div>
                                    <div class="box-body">
                                       
                                        
                                        <div class="col-md-6">
                                            <ul class="nav nav-tabs">
                                                <div class="dropdown">
                                                    <button class="btn btn-default dropdown-toggle widcem" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        <a  href="#">{{$nomeMes}}
                                                            <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                        <li><a href="#" onclick="enviar('{{$ordenacao}}',01,{{$ano}},'{{$areafiltro}}','{{$contafiltro}}');">Janeiro</a></li>
                                                        <li><a href="#" onclick="enviar('{{$ordenacao}}',02,{{$ano}},'{{$areafiltro}}','{{$contafiltro}}');">Fevereiro</a></li>
                                                        <li><a href="#" onclick="enviar('{{$ordenacao}}',03,{{$ano}},'{{$areafiltro}}','{{$contafiltro}}');">Março</a></li>
                                                        <li><a href="#" onclick="enviar('{{$ordenacao}}',04,{{$ano}},'{{$areafiltro}}','{{$contafiltro}}');">Abril</a></li>
                                                        <li><a href="#" onclick="enviar('{{$ordenacao}}',05,{{$ano}},'{{$areafiltro}}','{{$contafiltro}}');">Maio</a></li>
                                                        <li><a href="#" onclick="enviar('{{$ordenacao}}',06,{{$ano}},'{{$areafiltro}}','{{$contafiltro}}');">Junho</a></li>
                                                        <li><a href="#" onclick="enviar('{{$ordenacao}}',07,{{$ano}},'{{$areafiltro}}','{{$contafiltro}}');">Julho</a></li>
                                                        <li><a href="#" onclick="enviar('{{$ordenacao}}',08,{{$ano}},'{{$areafiltro}}','{{$contafiltro}}');">Agosto</a></li>
                                                        <li><a href="#" onclick="enviar('{{$ordenacao}}',09,{{$ano}},'{{$areafiltro}}','{{$contafiltro}}');">Setembro</a></li>
                                                        <li><a href="#" onclick="enviar('{{$ordenacao}}',10,{{$ano}},'{{$areafiltro}}','{{$contafiltro}}');">Outubro</a></li>
                                                        <li><a href="#" onclick="enviar('{{$ordenacao}}',11,{{$ano}},'{{$areafiltro}}',{{$contafiltro}}');">Novembro</a></li>
                                                        <li><a href="#" onclick="enviar('{{$ordenacao}}',12,{{$ano}},'{{$areafiltro}}',{{$contafiltro}}');">Dezembro</a></li>
                                                    </ul>
                                                </div>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">  
                                            <ul class="nav nav-tabs">
                                                <div class="dropdown">
                                                    <button class="btn btn-default dropdown-toggle widcem" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        <a  href="#">{{$ano}}
                                                            <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                        <li><a href="#" onclick="enviar('{{$ordenacao}}',{{$mes}}, 2017,'{{$areafiltro}}','{{$contafiltro}}');">2017</a></li>
                                                        <li><a href="#" onclick="enviar('{{$ordenacao}}',{{$mes}}, 2018,'{{$areafiltro}}','{{$contafiltro}}');">2018</a></li>
                                                    
                                                        <li><a href="#" onclick="enviar('{{$ordenacao}}',{{$mes}}, 2019,'{{$areafiltro}}','{{$contafiltro}}');">2019</a></li>
                                                    </ul>
                                                </div>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <div class="proxant col-md-12 text-center">  
                                                <a class="btn btn-default btn-xs" href="#" onclick="enviar('{{$ordenacao}}',{{$mesAnterior}},{{$anoAnterior}},'{{$areafiltro}}','{{$contafiltro}}');" >
                                                    <p class="glyphicon glyphicon-menu-left"></p> Anterior 
                                                </a>

                                                <a class="btn btn-default btn-xs"  href="#" onclick="enviar('{{$ordenacao}}',{{$mesConst}},{{$anoConst}},'{{$areafiltro}}','{{$contafiltro}}');">Atual</a> 
                                                
                                                <a class="btn btn-default btn-xs"  href="#" onclick="enviar('{{$ordenacao}}',{{$mesPosterior}},{{$anoPosterior}},'{{$areafiltro}}','{{$contafiltro}}');"  >
                                                    Próximo<p class="glyphicon glyphicon-menu-right"></p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div><!--FECHAMENTO PAINEL 2 -->
                            
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-center ocultar rel-mes-ano">Relatório mensal de {{$nomeMes}} de {{$ano}}</h3>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="box">
                                        <div class="box-body">
                                            <table  class=" table table-condensed no-padding table-striped table-bordered table-hover" id="tabelaprincipal">
                                                <thead>
                                                    <tr>

                                                        <td>
                                                        </td>
                                                        
                                                       
                                                        <td>
                                                            <p class="bold"> Área </p>
                                                        </td>
                                                        
                                                        
                                                        <td>
                                                            <p class="bold">Favorecido</p>
                                                        </td>
                                                        
                                                        <td>
                                                            <p class="bold ">Pagador</p>
                                                        </td>

                                                        <td>
                                                            <p class="bold">Venc</p>
                                                        </td>
                                                        
                                                        <td>
                                                            <p class="bold">A PAGAR</p>
                                                        </td>
                                                        

                                                </thead>
                                                <tbody>

                                                <span class="invisible">   {{($i = 1)}} </span>     
                                                <form method="post" action="financeiro/emitirpagamento" name="form-emitir" id="form-emitir">      
                                                @foreach($contas as $conta) 
                                                    <tr  class="point">
                                                    <td class="text-center" >
                                                        {{$i++}} 
                                                    </td>
                                                    
                                                    <td style= "white-space: nowrap;" >
                                                        {{$conta->area}}
                                                    </td>                                        
                                                    
                                                    
                                                    <td style= "white-space: nowrap;" >
                                                        <span class='bold'>{{$conta->favorecido}}</span> - {{$conta->item}}
                                                        <span class='bold azul'> @if($conta->tipo == 'Parcelado')
                                                            ({{$conta->parcelas}})</span>
                                                        @endif
                                                    </td>                                                    
                                                    <td class="text-right" >
                                                    {{$conta->pagador}} 
                                                    </td>
                                                <td class="text-center" >
                                                    {{$conta->dia}}
                                                    </td>
                                                    <td class="text-right" >
                                                       {{$conta->valor}} 
                                                     </td>
                                                   </tr>
                                                
                                                @endforeach
                                                <input type="hidden" form="form-emitir" name="dataconta" id="dataconta" value="{{$dataatual}}">
                                                <input type="hidden" form='form-emitir'  name="datacompleta" value="{{$dataatualcompleta}}">
                                                
                                                <input type="hidden" form='form-emitir'  name="_token" value="{{ csrf_token() }}">
                                                
                                                
                                            
                                            </form>

                                             <tr class="trcolor">
                                                    <td colspan="1" >
                                                    </td >
                                                    <td class="azulclaro" colspan="2">
                                                        <span class="bold  numaior direita">TOTAL DO MÊS</span>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td class="azulclaro" colspan="1">
                                                        <span class="bold numaior  azul">
                                                            <p class="centronum">{{$totalsomames}}</p>
                                                        </span>
                                                    </td>
                                                </tr>
                                               
                                                <tr>
                                                </tr> 
                                                </tbody>
                                            </table>

                                        </div>

                                    </div>
                                </div>

                            </div>

                            <form method="post" action="{{Route('financeiro.mensal')}}" name="formulario" id="formulariofiltros">
                                            <input type="hidden" value="" name="mes" id="mes">
                                            <input type="hidden" value="" name="ano" id="ano">
                                            <input type="hidden" value="" name="areafiltro" id="areafiltro">
                                            <input type="hidden" value="" name="contafiltro" id="contafiltro">
                                            <input type="hidden" value="" name="pagadorfiltro" id="pagadorfiltro">
                                            <input type="hidden" value="" name="ordenacao" id="ordenacao">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form> 

                            <script>
function enviar(ordenacao, mes, ano, areafiltro, contafiltro, pagadorfiltro){
    var ordenacao;
    var mes;
    var ano;
    var areafiltro;
    var contafiltro;
    var pagadorfiltro;
    
    document.getElementById('mes').value = mes;
    document.getElementById('ano').value = ano;
    document.getElementById('ordenacao').value = ordenacao;
    document.getElementById('areafiltro').value = areafiltro;
    document.getElementById('contafiltro').value = contafiltro;
    document.getElementById('pagadorfiltro').value = pagadorfiltro;
    
    document.getElementById("formulariofiltros").submit();
    }

function editar($id,$data) { 
 var $url = 'financeiro/'+$id+'/'+$data+'/editar';
 var width = 560;
 var height = 568;   
var left = 400;
    var top = 100; 
  window.open($url,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
 }

function criar($data) {   
    var $url = 'financeiro/criar/'+$data;
     var width = 560;
     var height = 568;    
   var left = 400;
       var top = 100;    
     window.open($url,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
    
   }

   function cheque($cheque) {   
    var $url = 'financeiro/pagamento/'+$cheque;
     var width = 560;
     var height = 300;    
   var left = 400;
       var top = 100;    
     window.open($url,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
    
   }

/* EXPORTAR EXCEL */
    $(document).ready(function () {
        $data = Date('d-m-Y');
        $nomearquivo = 'contas a pagar ';
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









