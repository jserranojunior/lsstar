@extends('layouts.header')
@section('content')
<div class="atualizar" onunload="window.opener.location.reload();"></div>

<div class="parte-cima">
    <div class="row">
        @if(Auth::user()->id == 2 or Auth::user()->id == 3 or Auth::user()->id == 5 or Auth::user()->id == 1)
        <!-- PANEL 1 -->
        <div class="col-md-4 ">
            <div class="box box-info">
                <div class="box-header with-border">
                <p class="center bold">Relatórios</p>
                </div>
                <div class="box-body">
                <div class="row">
                    <div class="col-md-5 ">
                    <a class="btn btn-warning btn-xs" href="{{Route('financeiro.mensal')}}" role="button">Relatório Mensal</a>
                    </div>
                    <div class="col-md-3 text-center">
                    <a class="btn btn-primary btn-xs" href="{{Url('financeiro/anual/2017')}}" role="button">Anual 2017</a>
                    </div>
                    <div class="col-md-3 text-center">
                    <a class="btn btn-primary btn-xs" href="{{Route('financeiro.anual')}}" role="button">Anual 2018</a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6 ">
                    <a class="btn btn-info btn-xs" href="{{Route('financeiro.relatorioconsolidado')}}" role="button">Relatório Consolidado</a>
                    </div>
                    <div class="col-md-6 ">
                    <a class="btn btn-danger btn-xs" href="{{Route('financeiro.relatorioarea')}}" role="button">Relatório de Negócios</a>
                    </div>
                </div>
                </div>
                <div class="box-footer">
                <input type="button" class="esquerda btn btn-success excel btn-sm" id="btnExport"  value="Exportar Excel">
                </div>
            </div>
        </div>
        @endif
    </div>  
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-body">
        <table  class=" table table-condensed no-padding table-striped table-bordered table-hover" id="tabelaprincipal">
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
          <tbody>
            <span class="invisible">   {{($i = 1)}} </span>
            @foreach($contas as $conta) 
            <tr  class="point">
              <td class="text-center">
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
              <td>                                                   
              </td>
              <td style= "white-space: nowrap;" >
                <span class='bold'>{{$conta->favorecido}}</span> - {{$conta->item}}                                                            
              </td>
              <td class="text-right">
                {{$conta->pagador}} 
              </td>
              <td class="text-center">
                    {{$conta->dia}}
              </td>
              <td class="text-right">
                {{$conta->valor}} 
              </td>
            </tr>
            @endforeach
            <tr class="trcolor">
              <td colspan="5" ></td >
              <td class="azulclaro" colspan="2">
                <span class="bold  numaior direita">TOTAL DO MÊS</span>
              </td>
              <td></td>
              <td class="azulclaro" colspan="1">
                <span class="bold numaior  azul">
                  <p class="centronum">{totalsomames}</p>
                </span>
              </td>
            </tr>
            <tr class="trcolor">
              
              <td class="" colspan="7">
                <span class="direita">Total pago</span>
              </td>
              <td></td>
              <td class="">
                <span class="direita">{totalpago}</span>
              </td>
            </tr>
            <tr class="trcolor">
              <td colspan="6" ></td>
              <td class="" colspan="1">
                <span class="direita">A pagar</span>
              </td>
              <td></td>
              <td class="">
                <span class="direita">{apagar}</span>
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
                  <p class="centronum">{totalestimado}</p>
                </span>
              </td>
            </tr>
            
            <tr></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection