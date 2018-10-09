@extends('layouts.header')
@section('content')


<div class="col-xs-10 col-xs-offset-1">
    @foreach($casa['casa'] as $item)
    <div class="box box-info">
        <div class="box-head">
            <h3 class="text-center"> Editar {{$item->id}}</h3>
        </div>
        <form action="../atualizar" method="POST">
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
                            <input class="form-control form-menor" value="{{$item->rgi}}" name="rgi" type="text">
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
                                <option @if($item->status == "Construção") selected @endif>Construção</option>
                                <option @if($item->status == "Á venda") selected @endif>Á venda</option>
                                <option @if($item->status == "Vendida") selected @endif>Vendida</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Proprietário</h5>
                        </td>
                        <td colspan="3">
                            <select name="cliente_id" id="" class="form-control">
                                @foreach($clientes as $cliente)
                                <option @if($item->cliente_id == $cliente->id) selected @endif value="{{$cliente->id}}">{{$cliente->nome}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="box-footer">
                <input type="hidden" name="id" value="{{$item->id}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="text-right btn btn-primary" value="Atualizar">
            </div>
        </form>
    </div>
    
    @endforeach
</div>

@endsection