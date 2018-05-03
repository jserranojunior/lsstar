@extends('layouts.header')
@section('content')



<table class="table">
    <thead>        
        <th>Categorias</th>
      
        @foreach($dados['mesesTopo'] as $mes)
     
            <th>{{$mes['nomeMes']}}</th>
        @endforeach
   
        <th>TOTAL</th>
        
    </thead>
    <tbody>


    @foreach($dados['relatorio'] as $itens)  

            <tr>     
                <td>{{$itens['nome']}}</td>
            @foreach($itens['meses'] as $mes)
              <td>{{$mes['valor']}}</td>
            @endforeach
            <td class="text-primary text-bold">{{$itens['totalAnualCategoria']}}</td>
            </tr>
        
@endforeach

    <tr>
        <td class="text-primary text-bold">TOTAL</td>
    </tr>
   
    </tbody>

</table>


@endsection



