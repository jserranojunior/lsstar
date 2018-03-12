@extends('layouts.headertwo')
@section('content')
<form action="#" method="post">
    <table class="table table-fora table-responsive  table-bordered" id="table-fora">
        <tbody><tr><td colspan="1">
                    <div class="col-md-6"><label for="ano">Ano</label></div>
                    <div class="col-md-6"> <select type="text" name="ano" class="form-control selectpicker" id="ano">



                            <option value="2016" selected="">2016</option>

                            <option value="2017">2017</option>

                        </select></div>
                </td></tr>
            <tr><td>


                    @foreach($dados as $dado)






                    <span class="invisible"></span>   
                    <table class="table table-dentro table-responsive" id="table-dentro">
                        <tbody><tr>    


                                <td colspan="6" class="text-primary">
                                    <h4 class="mes_td text-center">{{$dado['nomeMes']}}</h4>
                                </td>
                                @foreach($dado['dadosFaturas'] as $faturas)

                            <tr><td rowspan="{{$faturas['rowspan']}}">
                                    {{$faturas['i']}}
                                </td>
                                <td rowspan="{{$faturas['rowspan']}}" valign="middle" class="td_unidade  bold">
                                    <p class="text-primary">
                                        {{$faturas['unidade']}}
                                    </p>
                                </td>
                                <td class="bold">
                                    Valor
                                </td>
                                <td class="bold">Qtd.</td>
                                <td class="bold">
                                    Total
                                </td>
                                <td class="bold">
                                    Venc.
                                </td>
                            </tr>  

                            <tr>
                                <td>
                                    {{$faturas['primeiraLinha']['nmValor']}}
                                </td>
                                <td>
                                    {{$faturas['primeiraLinha']['quantidadeProcedimentos']}}
                                </td>
                                <td>
                                    {{$faturas['primeiraLinha']['primeiraSomavalor']}}
                                </td>
                                <td>
                                    10/01 
                                </td>

                            </tr>
                            @if($faturas['codigo'] == "14" or $faturas['codigo'] == "20" )
                            <tr>
                                <td>
                                    {{$faturas['segundaLinha']['nmSegundoValor']}}
                                </td>
                                <td>
                                    {{$faturas['segundaLinha']['quantidadeProcedimentos']}}
                                </td>
                                <td>
                                      {{$faturas['segundaLinha']['segundaSomavalor']}}
                                </td>
                                <td>
                                    10/01 
                                </td>

                            </tr>
                            @endif

                            @if($faturas['codigo'] == "20" )
                            <tr>
                                <td>
                                    Desc.
                                </td>
                                <td>{{$faturas['desconto']}}
                                </td>
                                <td>{{$faturas['totalDesconto']}}
                                </td>
                                <td>
                                </td>
                            </tr>
                            @endif
                            

                            <tr>
                                <td class="bold">
                                    Total
                                </td>
                                <td>
                                    <span class="text-center text-success bold">{{$faturas['totalProcedimentos']}}</span>
                                </td>
                                <td>
                                    <span class="text-center text-primary bold">{{$faturas['totalSoma']}}</span>
                                </td>
                                    
                                <td>
                                    
                                </td>
                            </tr>



                            @endforeach

                            <!--              FIM TABELA REFERENTE A CADA UMA DAS UNIDADES  -->
<tr><td colspan="3" class="td-totais bold">
        Total qtd.
        </td>
        <td class="bold text-success">{{$dado['totalGeralProcedimentos']}}
        </td>
        <td>
        </td>
        <td>
        </td>
        
        </tr>
        
         <tr><td colspan="3" class="td-totais  bold">
        VALOR TOTAL
        </td>
        <td colspan="3"><h5 class="text-primary bold">{{$dado['totalGeralSoma']}}</h5>
        </td>
        
        </tr>
        
         </tbody>
                    </table> 
                </td>
                <td> <!--              FIM TABELA DE MESES -->  

                    @endforeach
                </td>
            </tr>
        </tbody>
    </table> <!--  FIM TABELA GERAL  -->
</form>
@endsection



