@extends('layouts.header')
@section('content')

<style>
.scroll-horizontal {
    width: 100%;
    overflow-x: auto;
    white-space: nowrap;
     
}




</style>

<div class="row no-print">

<form action="{{Route('financeiro.relatorioarea')}}" method="post">
    <div class="col-md-4">
        <div class="box box-warning">
            <div class="box-header with-border">
                <p class="center bold"> UNIDADE DE NEGÓCIO </p>
            </div>
            <div class="box-body">  
            <div class="col-md-6 col-md-offset-3">
            <select name="area" id="area" class="form-control" onchange="this.form.submit()">
        
                @foreach($dados['areas'] as $itemArea)
                    <option @if($itemArea->nome == $dados['area']) selected @endif value="{{$itemArea->nome}}">{{$itemArea->nome}}</option>
                    @endforeach
            
            </select>
            
                </div>          
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
                    <select name="mesInicio" class="form-control" onchange="this.form.submit()">
                
                        <option @if($dados['mesInicio'] == "01") selected @endif value="01">Janeiro</option>
                        <option @if($dados['mesInicio'] == "02") selected @endif value="02">Fevereiro</option>
                        <option @if($dados['mesInicio'] == "03") selected @endif value="03">Março</option>
                        <option @if($dados['mesInicio'] == "04") selected @endif value="04">Abril</option>
                        <option @if($dados['mesInicio'] == "05") selected @endif value="05">Maio</option>
                        <option @if($dados['mesInicio'] == "06") selected @endif value="06">Junho</option>
                        <option @if($dados['mesInicio'] == "07") selected @endif value="07">Julho</option>
                        <option @if($dados['mesInicio'] == "08") selected @endif value="08">Agosto</option>
                        <option @if($dados['mesInicio'] == "09") selected @endif value="09">Setembro</option>
                        <option @if($dados['mesInicio'] == "10") selected @endif value="10">Outubro</option>
                        <option @if($dados['mesInicio'] == "11") selected @endif value="11">Novembro</option>
                        <option @if($dados['mesInicio'] == "12") selected @endif value="12">Dezembro</option>
                    </select>
                </div>

            <div class="col-md-6">
                <select name="anoInicio" class="form-control" onchange="this.form.submit()">
                    <option @if($dados['anoInicio'] == "2017") selected @endif value="2017">2017</option>
                    <option @if($dados['anoInicio'] == "2018") selected @endif value="2018">2018</option>
                    <option @if($dados['anoInicio'] == "2019") selected @endif value="2019">2019</option>
                    <option @if($dados['anoInicio'] == "2020") selected @endif value="2020">2020</option>
                    <option @if($dados['anoInicio'] == "2021") selected @endif value="2021">2021</option>
                </select>
            </div>                        
            </div>                   
        </div>
    </div>

    <div class="col-md-4 ">
        <div class="box box-info">
            <div class="box-header with-border">
                <p class="center bold"> DATA FIM </p>
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <select name="mesFim" class="form-control" onchange="this.form.submit()">
                        <option @if($dados['mesFim'] == "01") selected @endif value="01">Janeiro</option>
                        <option @if($dados['mesFim'] == "02") selected @endif value="02">Fevereiro</option>
                        <option @if($dados['mesFim'] == "03") selected @endif value="03">Março</option>
                        <option @if($dados['mesFim'] == "04") selected @endif value="04">Abril</option>
                        <option @if($dados['mesFim'] == "05") selected @endif value="05">Maio</option>
                        <option @if($dados['mesFim'] == "06") selected @endif value="06">Junho</option>
                        <option @if($dados['mesFim'] == "07") selected @endif value="07">Julho</option>
                        <option @if($dados['mesFim'] == "08") selected @endif value="08">Agosto</option>
                        <option @if($dados['mesFim'] == "09") selected @endif value="09">Setembro</option>
                        <option @if($dados['mesFim'] == "10") selected @endif value="10">Outubro</option>
                        <option @if($dados['mesFim'] == "11") selected @endif value="11">Novembro</option>
                        <option @if($dados['mesFim'] == "12") selected @endif value="12">Dezembro</option>
                
                    </select>
                </div>

            <div class="col-md-6">
                <select name="anoFim" class="form-control" onchange="this.form.submit()">
                    <option  @if($dados['anoFim'] == "2017") selected @endif value="2017">2017</option>
                    <option @if($dados['anoFim'] == "2018") selected @endif value="2018">2018</option>
                    <option @if($dados['anoFim'] == "2019") selected @endif value="2019">2019</option>
                    <option @if($dados['anoFim'] == "2020") selected @endif value="2020">2020</option>
                    <option @if($dados['anoFim'] == "2021") selected @endif value="2021">2021</option>
                </select>
            </div>                        
            </div>                   
        </div>
    </div>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

</div>

<div class=" scroll-horizontal">       
            <table class="table table-responsive">
                <thead>        
                    <th>#</th>
                    <th>Categorias</th>
                @foreach($dados['mesesTopo'] as $mes)     
                    <th>{{$mes['nomeMes']}}</th>
                @endforeach   
                    <th class="text-green text-bold">TOTAL</th>        
                </thead>
                <tbody>
                @foreach($dados['relatorio'] as $itens)  
                    <tr>     
                        <td>{{$itens['ordem']}}</td>
                            <td>{{$itens['nome']}}</td>
                        @foreach($itens['meses'] as $mes)
                            <td class="">{{$mes['valor'] = number_format($mes['valor'],2,',','.')}}</td>
                        @endforeach
                        <td class="text-green text-bold">{{$itens['totalAnualCategoria']}}</td>
                    </tr>        
                @endforeach
                <tr>
                <td>#</td>
                    <td  class="text-primary text-bold">TOTAL</td>
                @foreach($dados['mesesTopo'] as $mes)     
                    <td class="text-primary text-bold">{{$mes['valoresTotais']}}</td>
                @endforeach
                    <td class="text-warning text-bold ">{{$dados['valorTotalAno']}}</td>    
                </tr>   
                </tbody>
            </table>
</div>


@endsection



