@extends('layouts.header')
@section('content')

<h3 class="text-center">Relatório Consolidado</h3>

<div class="col-md-10 col-md-offset-1">
<table class="table table-hover table-condensed" >
    <tr>
        <th class="text-center">#</th>
        <th>NOME</th>
        <th>2017</th>
        <th>2018</th>
        <th>TOTAL</th>
    </tr>

    @foreach($dados['unidades'] as $item)

    <tr>
        <td  class="text-center"> {{$count++}} </td>
        <td> {{$item['nomeUnidade']}} </td>        
        @foreach($item['valores'] as $valor )
            <td  class="text-right">{{$valor}}</td>
        @endforeach
        
        <td  class="text-right text-warning text-bold">{{$item['soma']}}</td>
       

        
    </tr>
    @endforeach

  
    <tr>
        <td class="text-center">#</td>
        <td>TOTAL</td>       
        @foreach($dados['total'] as $total)
        <td class="text-right text-primary text-bold"> {{$total}}</td>        
        @endforeach
        
    </tr>
</table>
</div>                               
                            @endsection
