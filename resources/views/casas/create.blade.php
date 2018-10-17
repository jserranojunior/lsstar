@extends('layouts.header')
@section('content')


<div class="col-xs-10 col-xs-offset-1">
    <div class="box box-info">
        <div class="box-head">
            <h3 class="text-center"> Novo </h3>
        </div>
        <form action="{{Route('casa.store')}}" method="POST">
            <div class="box-body ">
                <table class="table text-center table-condensed">
                    <tr>
                        <td>
                            <h5 class="text-primary">Empreendimento</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" name="nome" type="text">
                        </td>
                        <td>
                            <h5 class="text-primary">Casa</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" name="numero" type="number">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">N° Matricula</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" name="numero_matricula" type="text">
                        </td>
                        <td>
                            <h5 class="text-primary">Data Matricula</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" name="data_matricula" type="date">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">CEP</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" name="cep" id="cep" type="text">
                        </td>
                        <td>
                            <h5 class="text-primary">Logradouro</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" name="logradouro" id="rua" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Bairro</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" name="bairro" id="bairro" type="text">
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
                            <h5 class="text-primary">Proprietário</h5>
                        </td>
                        <td colspan="3">
                            <select name="cliente_id" id="" class="form-control">
                                <option value=""></option>
                                @foreach($clientes as $cliente)
                                <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Instalação de luz</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" name="numero_instalacao_luz" type="text">
                        </td>
                        <td>
                            <h5 class="text-primary">Fornecedor de luz</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" name="fornecedor_luz" type="text">
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
                            <h5 class="text-primary">N° IPTU</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" name="numero_iptu" type="text">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <h5 class="text-primary">N° Habite-se</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" name="numero_habitese" type="text">
                        </td>
                        <td>
                            <h5 class="text-primary">Data Habite-se</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" name="data_habitese" type="date">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Alvará de Construção</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" name="alvara" type="text">
                        </td>
                        <td>
                            <h5 class="text-primary">Data do Alvará</h5>
                        </td>
                        <td>
                            <input class="form-control form-menor" name="data_alvara" type="date">
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