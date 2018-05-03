@extends('layouts.header')
@section('content')

<div class="col-md-4">
    <div class="box box-warning">
        <div class="box-header with-border">
            <p class="center bold"> {{$dados['area']}} </p>
        </div>
    </div>
</div>

<div class="col-md-4 ">
    <div class="box box-info">
        <div class="box-header with-border">
            <p class="center bold"> DATA DE INICIO </p>
        </div>
        <div class="box-body">
            <div class="col-md-6">
                <ul class="nav nav-tabs">
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle widcem" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <a href="#">Janeiro
                                    
                                <span class="caret"></span>
                            </a></button><a href="#"> 
                            </a><ul class="dropdown-menu" aria-labelledby="dropdownMenu1"><a href="#"> 
                                </a><li><a href="#">
                                    </a><a href="#" onclick="enviar('favorecido',01,2018,'Av. Adriano','Todos', 'Todos');">Janeiro</a>
                                </li>
                                <li>
                                    <a href="#" onclick="enviar('favorecido',02,2018,'Av. Adriano','Todos', 'Todos');">Fevereiro</a>
                                </li>
                                <li>
                                    <a href="#" onclick="enviar('favorecido',03,2018,'Av. Adriano','Todos', 'Todos');">Março</a>
                                </li>
                                <li>
                                    <a href="#" onclick="enviar('favorecido',04,2018,'Av. Adriano','Todos', 'Todos');">Abril</a>
                                </li>
                                <li>
                                    <a href="#" onclick="enviar('favorecido',05,2018,'Av. Adriano','Todos', 'Todos');">Maio</a>
                                </li>
                                <li>
                                    <a href="#" onclick="enviar('favorecido',06,2018,'Av. Adriano','Todos', 'Todos');">Junho</a>
                                </li>
                                <li>
                                    <a href="#" onclick="enviar('favorecido',07,2018,'Av. Adriano','Todos', 'Todos');">Julho</a>
                                </li>
                                <li>
                                    <a href="#" onclick="enviar('favorecido',08,2018,'Av. Adriano','Todos', 'Todos');">Agosto</a>
                                </li>
                                <li>
                                    <a href="#" onclick="enviar('favorecido',09,2018,'Av. Adriano','Todos', 'Todos');">Setembro</a>
                                </li>
                                <li>
                                    <a href="#" onclick="enviar('favorecido',10,2018,'Av. Adriano','Todos', 'Todos');">Outubro</a>
                                </li>
                                <li>
                                    <a href="#" onclick="enviar('favorecido',11,2018,'Av. Adriano','Todos', 'Todos');">Novembro</a>
                                </li>
                                <li>
                                    <a href="#" onclick="enviar('favorecido',12,2018,'Av. Adriano','Todos', 'Todos');">Dezembro</a>
                                </li>
                            </ul>
                        </div>
                    </ul>
                </div>
        <div class="col-md-6">
            <ul class="nav nav-tabs">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle widcem" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <a href="#">2018
                            
                            <span class="caret"></span>
                        </a></button><a href="#">
                        </a><ul class="dropdown-menu" aria-labelledby="dropdownMenu1"><a href="#">
                            </a><li><a href="#">
                                </a><a href="#">2017</a>
                            </li>
                            <li>
                                <a href="#">2018</a>
                            </li>
                            <li>
                                <a href="#">2019</a>
                            </li>
                        </ul>
                    </div>
                </ul>
            </div>                        
        </div>                   
    </div>
</div>


<div class="col-md-4 ">
    <div class="box box-danger">
        <div class="box-header with-border">
            <p class="center bold"> DATA DE FIM </p>
        </div>
        <div class="box-body">
            <div class="col-md-6">
                <ul class="nav nav-tabs">
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle widcem" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <a href="#">Janeiro
                                    
                                <span class="caret"></span>
                            </a></button><a href="#"> 
                            </a><ul class="dropdown-menu" aria-labelledby="dropdownMenu1"><a href="#"> 
                                </a><li><a href="#">
                                    </a><a href="#" onclick="enviar('favorecido',01,2018,'Av. Adriano','Todos', 'Todos');">Janeiro</a>
                                </li>
                                <li>
                                    <a href="#" onclick="enviar('favorecido',02,2018,'Av. Adriano','Todos', 'Todos');">Fevereiro</a>
                                </li>
                                <li>
                                    <a href="#" onclick="enviar('favorecido',03,2018,'Av. Adriano','Todos', 'Todos');">Março</a>
                                </li>
                                <li>
                                    <a href="#" onclick="enviar('favorecido',04,2018,'Av. Adriano','Todos', 'Todos');">Abril</a>
                                </li>
                                <li>
                                    <a href="#" onclick="enviar('favorecido',05,2018,'Av. Adriano','Todos', 'Todos');">Maio</a>
                                </li>
                                <li>
                                    <a href="#" onclick="enviar('favorecido',06,2018,'Av. Adriano','Todos', 'Todos');">Junho</a>
                                </li>
                                <li>
                                    <a href="#" onclick="enviar('favorecido',07,2018,'Av. Adriano','Todos', 'Todos');">Julho</a>
                                </li>
                                <li>
                                    <a href="#" onclick="enviar('favorecido',08,2018,'Av. Adriano','Todos', 'Todos');">Agosto</a>
                                </li>
                                <li>
                                    <a href="#" onclick="enviar('favorecido',09,2018,'Av. Adriano','Todos', 'Todos');">Setembro</a>
                                </li>
                                <li>
                                    <a href="#" onclick="enviar('favorecido',10,2018,'Av. Adriano','Todos', 'Todos');">Outubro</a>
                                </li>
                                <li>
                                    <a href="#" onclick="enviar('favorecido',11,2018,'Av. Adriano','Todos', 'Todos');">Novembro</a>
                                </li>
                                <li>
                                    <a href="#" onclick="enviar('favorecido',12,2018,'Av. Adriano','Todos', 'Todos');">Dezembro</a>
                                </li>
                            </ul>
                        </div>
                    </ul>
                </div>
        <div class="col-md-6">
            <ul class="nav nav-tabs">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle widcem" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <a href="#">2018
                            
                            <span class="caret"></span>
                        </a></button><a href="#">
                        </a><ul class="dropdown-menu" aria-labelledby="dropdownMenu1"><a href="#">
                            </a><li><a href="#">
                                </a><a href="#">2017</a>
                            </li>
                            <li>
                                <a href="#">2018</a>
                            </li>
                            <li>
                                <a href="#">2019</a>
                            </li>
                        </ul>
                    </div>
                </ul>
            </div>                        
        </div>                   
    </div>
</div>


<table class="table">
    <thead>        
        <th>Categorias</th>
        @foreach($dados['mesesTopo'] as $mes)
     
            <th>{{$mes['nomeMes']}}</th>
        @endforeach
   
        <th class="text-green text-bold">TOTAL</th>
        
    </thead>
    <tbody>
    @foreach($dados['relatorio'] as $itens)  
        <tr>     
                <td>{{$itens['nome']}}</td>
            @foreach($itens['meses'] as $mes)
                <td>{{$mes['valor']}}</td>
            @endforeach
            <td class="text-green text-bold">{{$itens['totalAnualCategoria']}}</td>
        </tr>
        
@endforeach

    <tr>
        <td  class="text-primary text-bold">TOTAL</td>
        @foreach($dados['mesesTopo'] as $mes)     
            <td class="text-primary text-bold">{{$mes['valoresTotais']}}</td>
        @endforeach
            <td class="text-warning text-bold">{{$dados['valorTotalAno']}}</td>
    
    </tr>
   
    </tbody>

</table>


@endsection



