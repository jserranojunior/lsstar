@extends('layouts.header')
@section('content')


<div class="col-xs-10 col-xs-offset-1">
        @foreach($casa['casa'] as $item)
    <div class="box box-info">
        <div class="box-head">
            <h3 class="text-center"> Editar Casa {{$item->id}}</h3>
        </div>

        <div class="box-body ">
            <table class="table text-center table-condensed">
                <tr>
                    <td>
                        <h5 class="text-primary">Nome</h5>
                    </td>
                    <td colspan="3">
                        <input class="form-control form-menor" value="{{$item->nome}}" name="nome" type="text">
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5 class="text-primary">Número</h5>
                    </td>
                    <td>
                        <input class="form-control form-menor" value="{{$item->numero}}" name="numero" type="number">
                    </td>
                    <td>
                        <h5 class="text-primary">RGI</h5>
                    </td>
                    <td>
                        <input class="form-control form-menor" name="rgi" type="text">
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5 class="text-primary">Endereço</h5>
                    </td>
                    <td>
                        <input class="form-control form-menor" value="{{$item->endereco}}" name="endereco" type="text">
                    </td>
                    <td>
                        <h5 class="text-primary">Status</h5>
                    </td>
                    <td>
                        <select name="status" id="" class="form-control">
                            <option value="">Construção</option>
                            <option value="">Vendendo</option>
                            <option value="">Comprada</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5 class="text-primary">Proprietário</h5>
                    </td>
                    <td colspan="3">
                        <select name="proprietario" id="" class="form-control">
                            @foreach($clientes as $cliente)
                             <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </table>        
        </div>
    </div>
        @endforeach
</div>

@endsection