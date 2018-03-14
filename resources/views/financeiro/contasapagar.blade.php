@extends('layouts.header')
@section('content')


<div class="atualizar" onunload="window.opener.location.reload();"></div>
<div class="parte-cima">
	<div class="row">
		<!-- PANEL 1 -->
		<div class="col-md-4 ">
			<div class="box box-info">
				<div class="box-header with-border">
					<p class="center bold">Relatórios</p>
				</div>
				<div class="box-body">
                <div class="row">
					<div class="col-md-6 ">
						<a class="btn btn-warning btn-xs" href="{{Route('financeiro.mensal')}}" role="button">Relatório Mensal</a>
					</div>
					<div class="col-md-6 text-center">
						<a class="btn btn-primary btn-xs" href="{{Route('financeiro.anual')}}" role="button">Relatório Anual</a>
					</div>
                </div>
                <br>
					
                <div class="row">
                    <div class="col-md-6 ">
                        <a class="btn btn-info btn-xs" href="{{Route('financeiro.relatorioconsolidado')}}" role="button">Relatório Consolidado</a>
				    </div>
                </div>

						
					</div>
				<div class="box-footer">
					<input type="button" class="esquerda btn btn-success excel btn-sm" id="btnExport"  value="Exportar Excel">
				</div>
			</div>
		</div>
    <!-- PANEL 2 -->
    <div class="col-md-4 ">
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
                                    <li>
                                        <a href="#" onclick="enviar('{{$ordenacao}}',01,{{$ano}},'{{$areafiltro}}','{{$contafiltro}}', '{{$pagadorfiltro}}');">Janeiro</a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="enviar('{{$ordenacao}}',02,{{$ano}},'{{$areafiltro}}','{{$contafiltro}}', '{{$pagadorfiltro}}');">Fevereiro</a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="enviar('{{$ordenacao}}',03,{{$ano}},'{{$areafiltro}}','{{$contafiltro}}', '{{$pagadorfiltro}}');">Março</a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="enviar('{{$ordenacao}}',04,{{$ano}},'{{$areafiltro}}','{{$contafiltro}}', '{{$pagadorfiltro}}');">Abril</a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="enviar('{{$ordenacao}}',05,{{$ano}},'{{$areafiltro}}','{{$contafiltro}}', '{{$pagadorfiltro}}');">Maio</a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="enviar('{{$ordenacao}}',06,{{$ano}},'{{$areafiltro}}','{{$contafiltro}}', '{{$pagadorfiltro}}');">Junho</a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="enviar('{{$ordenacao}}',07,{{$ano}},'{{$areafiltro}}','{{$contafiltro}}', '{{$pagadorfiltro}}');">Julho</a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="enviar('{{$ordenacao}}',08,{{$ano}},'{{$areafiltro}}','{{$contafiltro}}', '{{$pagadorfiltro}}');">Agosto</a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="enviar('{{$ordenacao}}',09,{{$ano}},'{{$areafiltro}}','{{$contafiltro}}', '{{$pagadorfiltro}}');">Setembro</a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="enviar('{{$ordenacao}}',10,{{$ano}},'{{$areafiltro}}','{{$contafiltro}}', '{{$pagadorfiltro}}');">Outubro</a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="enviar('{{$ordenacao}}',11,{{$ano}},'{{$areafiltro}}','{{$contafiltro}}', '{{$pagadorfiltro}}');">Novembro</a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="enviar('{{$ordenacao}}',12,{{$ano}},'{{$areafiltro}}','{{$contafiltro}}', '{{$pagadorfiltro}}');">Dezembro</a>
                                    </li>
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
                                        <li>
                                            <a href="#" onclick="enviar('{{$ordenacao}}',{{$mes}}, 2017,'{{$areafiltro}}','{{$contafiltro}}', '{{$pagadorfiltro}}');">2017</a>
                                        </li>
                                        <li>
                                            <a href="#" onclick="enviar('{{$ordenacao}}',{{$mes}}, 2018,'{{$areafiltro}}','{{$contafiltro}}', '{{$pagadorfiltro}}');">2018</a>
                                        </li>
                                        <li>
                                            <a href="#" onclick="enviar('{{$ordenacao}}',{{$mes}}, 2019,'{{$areafiltro}}','{{$contafiltro}}', '{{$pagadorfiltro}}');">2019</a>
                                        </li>
                                    </ul>
                                </div>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="proxant col-md-12 text-center">
                                <a class="btn btn-default btn-xs" href="#" onclick="enviar('{{$ordenacao}}',{{$mesAnterior}},{{$anoAnterior}},'{{$areafiltro}}','{{$contafiltro}}', '{{$pagadorfiltro}}');" >
                                    <p class="glyphicon glyphicon-menu-left"></p> Anterior 
                            
                                </a>
                                <a class="btn btn-default btn-xs"  href="#" onclick="enviar('{{$ordenacao}}',{{$mesConst}},{{$anoConst}},'{{$areafiltro}}','{{$contafiltro}}', '{{$pagadorfiltro}}');">Atual</a>
                                <a class="btn btn-default btn-xs"  href="#" onclick="enviar('{{$ordenacao}}',{{$mesPosterior}},{{$anoPosterior}},'{{$areafiltro}}','{{$contafiltro}}', '{{$pagadorfiltro}}');"  >
                                Próximo
                                    <p class="glyphicon glyphicon-menu-right"></p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a class="esquerda btn btn-primary btn-sm" href="#" onclick="criar('{{$dataatual}}');"                                          >
                        (+)  Incluir</a>
                    </div>
                </div>
            </div>
            <!--FECHAMENTO PAINEL 2 -->
								<div class="col-md-4 ">
									<div class="box box-info">
										<div class="box-header with-border">
											<p class="center bold">Legenda</p>
										</div>
										<div class="box-body">
											<div class="col-md-6 ">
												<span class="icone icone-cheque"></span> Cheque emitido
												<br>
													<span class="icone icone-setemaior"></span> Maior que 7%
													<br>
														<span class="glyphicon glyphicon-ok icone"></span> Selecionado
                                        
													</div>
													<div class="col-md-6 ">
														<span class="icone icone-transferencia"></span>  Transferência
														<br>
															<span class="icone icone-setemenor"></span> Menor que 7%
															<br>
																<span class="glyphicon glyphicon-unchecked icone"></span> Não selecionado
                                        
															</div>
														</div>
														<div class="box-footer">
                                                            <input class="btn btn-info emitir btn-sm" type="submit"  form='form-emitir' value="Emitir Pagamento" >
                                                            
                                                            <div class="col-md-6 float-right">
                                                               
                                                                    <div class=" btn btn-warning btn-sm" id="descerpagina"> TOTAL  <span class="glyphicon  glyphicon-chevron-down"></span></div>
                                                                    
                                                                </div>
															</div>
														</div>
													</div>
												</div>
											</div>
                                            <!-- LINHA FILTRO -->

<!-- FIM LINHA FILTRO -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <table  class=" table table-condensed no-padding table-striped table-bordered table-hover" id="tabelaprincipal">
                    <thead>
                        <tr>
                            <td class="text-center"></td>
                            <td>

<style>
    .row-ecra{
        margin-bottom:5px;
    }
        .a-black{
            color:black;
        }
        .a-black:hover{
            color:black;
        }

        .nav-tabs > li > a {
            margin-right: 0px;
            line-height: 0;
            border: 0px solid transparent;
            border-radius: 0px 0px 0 0;
        }
        
        bootstrap.css:3986
        .nav > li > a {
            position: relative;
            display: block;
            padding: 10px 0px;
        }
        .filtro-hr{
            color:black;
            font-size:12px;
            
        }

        .nav > li > a {
            position: relative;
            display: block;
            padding: 10px 3px;
        }

        .nav-hr {
            border-bottom: 0px solid #ddd;
        }
</style>



    <!-- PAINEL AREAS -->
    <div class="">
            <ul class="nav nav-tabs nav-hr">
                <li class="dropdown @if($areafiltro != "Todos")filtroselect @endif">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="filtro-hr bold"> Áreas </span> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#" onclick="enviar('{{$ordenacao}}',{{$mes}},{{$ano}}, 'Todos', '{{$contafiltro}}', '{{$pagadorfiltro}}')">Todos</a>
                        </li>
                        @foreach($all_area as $f_area)
                            <li>
                                <a href="#" onclick="enviar('{{$ordenacao}}',{{$mes}},{{$ano}}, '{{$f_area->nome}}', '{{$contafiltro}}', '{{$pagadorfiltro}}')">{{$f_area->nome}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
</td>
<td>
                                <!-- PAINEL CONTAS -->
                                <div class="">
                                        <ul class="nav nav-tabs nav-hr">
                                            <li class="dropdown @if($contafiltro != "Todos")filtroselect @endif">
                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                        <span class="filtro-hr bold"> Contas </span> <span class="caret"></span>
                                                    </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="#" onclick="enviar('{{$ordenacao}}',{{$mes}},{{$ano}}, '{{$areafiltro}}', 'Todos', '{{$pagadorfiltro}}')">Todos</a>
                                                    </li>
                                                    @foreach($all_conta as $f_conta)            
                                                        <li>
                                                            <a href="#" onclick="enviar('{{$ordenacao}}',{{$mes}},{{$ano}}, '{{$areafiltro}}', '{{$f_conta->nome}}', '{{$pagadorfiltro}}')">{{$f_conta->nome}}</a>
                                                        </li>
                                                    @endforeach
                                        </ul>
                                    </div>
                            </td>
                            <td>
                                <p class="bold">Tipo</p>
                            </td>
                            <td>
                                <p class="bold">Pg</p>
                            </td>
                            <td>
                                    
                                    <a href="#" class="" onclick="enviar('favorecido',{{$mes}},{{$ano}}, '{{$areafiltro}}', '{{$contafiltro}}', '{{$pagadorfiltro}}')">
                                            <span class="filtro-hr bold">  Favorecido </span> <span class="caret"></span>
                                    </a>
                                
                            </td>
                            <td>
                                <!-- PAINEL PAGADOR -->
                                <div class="">
                                        <ul class="nav nav-tabs nav-hr">
                                            <li class="dropdown dropdown @if($pagadorfiltro != "Todos")filtroselect @endif">
                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                    <span class="filtro-hr bold"> Pagador </span> <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="#" onclick="enviar('favorecido',{{$mes}},{{$ano}}, '{{$areafiltro}}', '{{$contafiltro}}',  'Todos')">Todos</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" onclick="enviar('favorecido',{{$mes}},{{$ano}}, '{{$areafiltro}}', '{{$contafiltro}}',  'Nota Fiscal')">Nota Fiscal</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" onclick="enviar('dia',{{$mes}},{{$ano}}, '{{$areafiltro}}', '{{$contafiltro}}', 'Recibo')">Recibo</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                            </td>
                            <td>
                                    <a href="#" onclick="enviar('dia',{{$mes}},{{$ano}}, '{{$areafiltro}}', '{{$contafiltro}}', '{{$pagadorfiltro}}')">
                                    <span class="filtro-hr bold">  Venc </span> <span class="caret"></span>
                                    </a>
                            </td>
                            <td>
                                <p class="bold">Á Pagar</p>
                            </td>
                        </thead>
                        <tbody>
                            <span class="invisible">   {{($i = 1)}} </span>
                            <form method="post" action="financeiro/emitirpagamento" name="form-emitir" id="form-emitir">      
                                    @foreach($contas as $conta) 

                                <tr  class="point">
                                    <td class="text-center" onclick="editar('{{$conta->id}}','{{$dataatual}}');">
                                        {{$i++}} 
                                    </td>
                                    <td style= "white-space: nowrap;" onclick="editar('{{$conta->id}}','{{$dataatual}}');">
                                        {{$conta->area}}
                                    </td>
                                    <td onclick="editar('{{$conta->id}}','{{$dataatual}}');">
                                        {{$conta->ccustos}}
                                    </td>
                                    <td onclick="editar('{{$conta->id}}','{{$dataatual}}');">
                                        {{$conta->tipo}}
                                    </td>
                                    <td class="text-center" style="background-color:{{$conta->tipo_pagamento}};"

                                                    @if($conta->tipo_pagamento == '#2196f3')
                                                        onclick="cheque('{{$conta->numero_cheque}}');"
                                                    @endif 
                                                    >
                                                         @if($conta->tipo_pagamento !== '#2196f3')
                                                        {!! $conta->tipo_pagamento !!}
                                                        @endif  
                                                     </td>
																						<td style= "white-space: nowrap;" onclick="editar('{{$conta->id}}','{{$dataatual}}');">
																							<span class='bold'>{{$conta->favorecido}}</span> - {{$conta->item}}
                                                        
																							<span class='bold azul'> @if($conta->tipo == 'Parcelado')
                                                            ({{$conta->parcelas}})</span>
                                                        @endif
                                                    
																						</td>
																						<td class="text-right" onclick="editar('{{$conta->id}}','{{$dataatual}}');">
                                                    {{$conta->pagador}} 
                                                    </td>
																						<td class="text-center" onclick="editar('{{$conta->id}}','{{$dataatual}}');">
                                                    {{$conta->dia}}
                                                    </td>
																						<td class="text-right" onclick="editar('{{$conta->id}}','{{$dataatual}}');">
                                                       {{$conta->valor}} 
                                                     </td>
																					</tr>
                                                
                                                @endforeach
                                                
                    <input type="hidden" form="form-emitir" name="dataconta" id="dataconta" value="{{$dataatual}}">
                        <input type="hidden" form='form-emitir'  name="datacompleta" value="{{$dataatualcompleta}}">
                            <input type="hidden" form='form-emitir'  name="_token" value="{{ csrf_token() }}">
                            </form>
                            <tr class="trcolor">
                                <td colspan="5" ></td >
                                <td class="azulclaro" colspan="2">
                                    <span class="bold  numaior direita">TOTAL DO MÊS</span>
                                </td>
                                <td></td>
                                <td class="azulclaro" colspan="1">
                                    <span class="bold numaior  azul">
                                        <p class="centronum">{{$totalsomames}}</p>
                                    </span>
                                </td>
                            </tr>
                            <tr class="trcolor">
                                <td colspan="6" > Total de pendencias: </td>
                                <td class="" colspan="1">
                                    <span class="direita">Total pago</span>
                                </td>
                                <td></td>
                                <td class="">
                                    <span class="direita">{{$totalpago}}</span>
                                </td>
                            </tr>
                            <tr class="trcolor">
                                <td colspan="6" ></td>
                                <td class="" colspan="1">
                                    <span class="direita">A pagar</span>
                                </td>
                                <td></td>
                                <td class="">
                                    <span class="direita">{{$apagar}}</span>
                                </td>
                            </tr>
                            <tr class="trcolor">
                                <td colspan="5" ></td >
                                <td class="azulclaro" colspan="2">
                                    <span class="bold  numaior direita">TOTAL ESTIMADO</span>
                                </td>
                                <td></td>
                                <td class="azulclaro" colspan="1">
                                    <span class="bold numaior  azul">
                                        <p class="centronum">{{$totalestimado}}</p>
                                    </span>
                                </td>
                            </tr>
                            <tr class="trcolor">
                                <td colspan="4" >
                                    <span>¹Parcelamento com valor variável</span>
                                </td>
                            </tr>
                            <tr></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <form method="post" action="{{Route('financeiro.index')}}" name="formulario" id="formulariofiltros">
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
 var height = 650;   
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









