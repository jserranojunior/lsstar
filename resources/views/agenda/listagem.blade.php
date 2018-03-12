@extends('layouts.header')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h3 class="text-center">Agendamento de Visitas</h3>
        
    </div>
</div>

<div class="row">
    <div class="col-md-12">
       
                    <!-- PANEL 2 -->
                    <div class="col-md-4 col-md-offset-4">
                                <div class="box box-info">
                                    <div class="box-body">
                                        <div class="col-md-6">
                                            <ul class="nav nav-tabs">
                                                <div class="dropdown">
                                                    <button class="btn btn-default dropdown-toggle widcem" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        <a  href="#">
                                                        {{$mesEscrito}} <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                        <li><a href="#" onclick="enviar('01',{{$ano}});">Janeiro</a></li>
                                                        <li><a href="#" onclick="enviar('02',{{$ano}});">Fevereiro</a></li>
                                                        <li><a href="#" onclick="enviar('03',{{$ano}});">Março</a></li>
                                                        <li><a href="#" onclick="enviar('04',{{$ano}});">Abril</a></li>
                                                        <li><a href="#" onclick="enviar('05',{{$ano}});">Maio</a></li>
                                                        <li><a href="#" onclick="enviar('06',{{$ano}});">Junho</a></li>
                                                        <li><a href="#" onclick="enviar('07',{{$ano}});">Julho</a></li>
                                                        <li><a href="#" onclick="enviar('08',{{$ano}});">Agosto</a></li>
                                                        <li><a href="#" onclick="enviar('09',{{$ano}});">Setembro</a></li>
                                                        <li><a href="#" onclick="enviar('10',{{$ano}});">Outubro</a></li>
                                                        <li><a href="#" onclick="enviar('11',{{$ano}});">Novembro</a></li>
                                                        <li><a href="#" onclick="enviar('12',{{$ano}});">Dezembro</a></li>
                                                    </ul>
                                                </div>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">  
                                            <ul class="nav nav-tabs">
                                                <div class="dropdown">
                                                    <button class="btn btn-default dropdown-toggle widcem" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        <a  href="#">
                                                           {{$ano}} <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                        <li><a href="#" onclick="enviar('{{$mes}}',2017);">2017</a></li>
                                                        <li><a href="#" onclick="enviar('{{$mes}}',2018);">2018</a></li>
                                                    
                                                        <li><a href="#" onclick="enviar('{{$mes}}',2019);">2019</a></li>
                                                    </ul>
                                                </div>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <div class="proxant col-md-12 text-center">  
                                                <a class="btn btn-default btn-xs" href="#" onclick="enviar('{{$mesAnterior}}','{{$anoAnterior}}');" >
                                                    <p class="glyphicon glyphicon-menu-left"></p> Anterior 
                                                </a>

                                                <a class="btn btn-default btn-xs"  href="#" onclick="enviar('{{$mesAtual}}','{{$anoAtual}}');">Atual</a> 
                                                
                                                <a class="btn btn-default btn-xs"  href="#" onclick="enviar('{{$mesPosterior}}','{{$anoPosterior}}');"  >
                                                    Próximo<p class="glyphicon glyphicon-menu-right"></p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="box-footer">
                                    <a class="direita btn btn-warning btn-sm" href="{{ROUTE('agenda.calendario')}}">
                                            (<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>)  Calendário</a>
                                            

                                         <a class="esquerda btn btn-primary btn-sm" href="{{ROUTE('agenda.create')}}">
                                            (+)  Incluir</a>
                                    </div>
                                </div>
                            </div><!--FECHAMENTO PAINEL 2 -->
               
    </div>
</div>
    
<div class="row">
            <div class="col-md-12">
        <div class="box">    
            <div class="box-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Data</th>
                            <th>Horario</th>
                            <th>Nome</th>
                            <th>Referência</th>
                            <th>Imóvel/Rua</th>
                            <th>Resultado da Visita</th>
                            <th>Expectativas de Negócios</th>                    
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($dados as $dado)
                        <tr>
                        <td class="point"><a class="link-tabela" href="{{Url('agenda/editar')}}/{{$dado->id}}" >{{$count += 1}}</a></td>
                            <td class="point"><a class="link-tabela" href="{{Url('agenda/editar')}}/{{$dado->id}}" >{{$dado->data}}</a></td>
                            <td class="point"><a class="link-tabela" href="{{Url('agenda/editar')}}/{{$dado->id}}" > {{$dado->horario}}</a></td>
                            <td class="point"><a class="link-tabela" href="{{Url('cliente/editar')}}/{{$dado->id_cliente}}" >{{$dado->nome}} </a></td>
                            <td class="point"><a class="link-tabela" href="{{Url('agenda/editar')}}/{{$dado->id}}" >{{$dado->referencia}}</a></td>
                            <td class="point"><a class="link-tabela" href="{{Url('agenda/editar')}}/{{$dado->id}}" >{{$dado->imovel}}</a></td>
                            <td class="point"><a class="link-tabela" href="{{Url('agenda/editar')}}/{{$dado->id}}" >{{$dado->resultado}}</a></td>
                            <td class="point"><a class="link-tabela" href="{{Url('agenda/editar')}}/{{$dado->id}}" >{{$dado->expectativa}}</a></td>                   
                        </tr>
                    @endforeach    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<form method="post" action="{{Route('agenda.index')}}" name="formulario" id="formulariofiltros">
    <input type="hidden" value="" name="mes" id="mes">
    <input type="hidden" value="" name="ano" id="ano">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form> 

                            <script>
function enviar(mes, ano){

var mes;
var ano;

    document.getElementById('mes').value = mes;
    document.getElementById('ano').value = ano;
    document.getElementById("formulariofiltros").submit();
}


</script>






@endsection