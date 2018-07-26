@extends('layouts.header')
@section('content')

<h3 class="text-center">Relatório Consolidado</h3>

<div class="col-md-8 col-md-offset-2">
<table class="table table-hover table-condensed" >
    <tr>
        <th class="text-center">#</th>
        <th>NOME</th>
        <th class="text-right">2017</th>
        <th class="text-right">2018</th>
        <th class="text-right">TOTAL</th>
    </tr>

    @foreach($dados['unidades'] as $item)

    <tr onclick="location.href = '{{url('financeiro/anual')}}';">
        <td  class="text-center"> {{$count++}} </td>
        <td> {{$item['nomeUnidade']}} </td>        
        @foreach($item['valores'] as $valor )
            <td  class="text-right">
                    @if($valor > 0) 
                    {{number_format($valor ,2,',','.')}}
                    @else
                    0,00
                    @endif                 
               </td>
        @endforeach
        
        <td  class="text-right text-warning text-bold">
                @if($item['soma'] > 0) 
                {{number_format($item['soma'] ,2,',','.')}}
                @else
                0,00
                @endif 
       
        </td>
       

        
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
