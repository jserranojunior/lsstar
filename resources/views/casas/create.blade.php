@extends('layouts.header')
@section('content')


<div class="col-xs-10 col-xs-offset-1">
    <div class="box box-info">
        <div class="box-head">
            <h3 class="text-center"> Novo </h3>
        </div>
        <form action="./cadastrar" method="POST">
            <div class="box-body ">
                <table class="table text-center table-condensed">
                    <tr>
                        <td>
                            <h5 class="text-primary">Nome</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" name="nome" type="text">
                        </td>
                        <td>
                            <h5 class="text-primary">Numero da Matricula</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" name="numero_matricula" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Casa</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" name="numero" type="number">
                        </td>
                        <td>
                            <h5 class="text-primary">Endereço</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" name="endereco" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Proprietário</h5>
                        </td>
                        <td colspan="3">
                            <select name="cliente_id" id="" class="form-control">
                                @foreach($clientes as $cliente)
                                <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Proprietário 2</h5>
                        </td>
                        <td colspan="3">
                            <select name="segundo_cliente_id" id="" class="form-control">
                                <option value=""></option>
                                @foreach($clientes as $cliente)
                                <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Inst. de luz</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" name="instalacao_luz" type="text">
                        </td>
                        <td>
                            <h5 class="text-primary">N° IPTU</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" name="numero_iptu" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">RGI</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" name="rgi" type="text">
                        </td>
                        <td>
                            <h5 class="text-primary">Status</h5>
                        </td>
                        <td>
                            <select name="status" id="" class="form-control">
                                <option>Construção</option>
                                <option>Á venda</option>
                                <option>Vendida</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Entrega da Chave</h5>
                        </td>
                        <td>
                            <input class="form-control" name="entrega_chave" type="date">
                        </td>
                        <td>
                            <h5 class="text-primary">Inicio da Garantia</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" name="inicio_garantia" type="date">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="box-footer">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="text-right btn btn-primary" value="Cadastrar">
            </div>
        </form>
    </div>
</div>

@endsection