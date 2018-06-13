@extends('layouts.headertwo')
@section('content')

   <div class="container">

   <h3 class="text-center">PAGAMENTO EMITIDO</div>


   <div class="col-xs-12">
    

   <table class=" table table-condensed no-padding table-striped table-bordered table-hover">
        <tr>
            
            <td>
                Numero Pagamento
            </td>
            <td>
                Data Pagamento
            </td>
            <td>
                Link Comprovante
            </td>
        </tr>

        <tr>
            
            <td>
                {{$numero_cheque}}
            </td>
            <td>
                {{$data_conta}}
            </td>
            <td>
                <a href="{{$link_comprovante}}" class="text-bold" target="_BLANK">ACESSAR COMPROVANTE</a>
                
            </td>
        </tr>
    </table>
</div>
    <div class="col-xs-12">

    <table class=" table table-condensed no-padding table-striped table-bordered table-hover">
    <tr>
            <th>
                Fornecedor
            </th>
            <th>
                Vencimento
            </th>
            <th>
                Valor
            </th>
        </tr>
        <tr>
    @foreach($contas as $conta)
        
            <td>
                {{$conta->favorecido}}
            </td>
            <td>
                {{$conta->inicio_mes}}
            </td>
            <td>
                {{$conta->valor}}
            </td>
        </tr>        
    @endforeach
        <tr>
            <td colspan="2" class="text-center">
                 <h5>VALOR TOTAL</h5>
            </td>    
            <td>
            <h5>{{$valortotal}}</h5>
            </td>
        </tr>
        
    </table>
    </div>
    </div>
@endsection