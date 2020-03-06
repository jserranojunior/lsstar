@extends('layouts.header')
@section('content')
<style>
    .table > tbody > tr > td{
        border: 1px solid rgba(210, 210, 210, 0)! important;
    }
</style>
@foreach ($dados as $dado)
<form action="{{Route('fornecedor.update')}}" class="form-horizontal">
        <div class="col-xs-8 col-xs-offset-2">
        <div class="box-head">
            <h3 class="text-center"> Editar Fornecedor </h3>
        </div>
            <div class="box box-info">
                <div class="box-body no-padding">
                    <table class="table text-center table-condensed">
                        <tr>
                            <td><h5 class="">Nome do fornecedor</h5></td>
                            <td colspan="4"><input class="form-control" name="nome" value="{{$dado->fornecedor}}" type="text"> </td>
                        </tr>                        
                        <tr>
                            <td><h5 class="">CEP</h5></td>
                            <td><input class="form-control" name="cep" id="cep" value="{{$dado->cep}}" type="text"> </td>
                            <td><h5>Bairro</h5></td>
                            <td><input class="form-control" name="bairro"  id="bairro" value="{{$dado->bairro}}" type="text">  </td>
                        </tr>                        
                        <tr>
                            <td><h5 class="">Número</h5></td>
                            <td><input class="form-control" name="numero"  value="{{$dado->numero}}" type="number"> </td>
                            <td><h5>Cidade</h5></td>
                            <td><input class="form-control" name="cidade" id="cidade"  value="{{$dado->cidade}}" type="text">  </td>
                        </tr>
                        <tr>
                            <td><h5 class="">Logradouro</h5></td>
                            <td colspan="4"><input class="form-control" id="rua"  value="{{$dado->endereco}}" name="logradouro" type="text"> </td>
                        </tr>
                        <tr>
                            <td><h5 class="">Email</h5></td>
                            <td colspan="4"><input class="form-control"  value="{{$dado->email}}"  name="email" type="text"> </td>
                        </tr>
                        <tr>
                            <td><h5 class="">Telefone</h5></td>
                            <td><input class="form-control  telefone_mascara" name="telefone"  value="{{$dado->telefone}}" type="text"> </td>
                            <td><h5>Celular</h5></td>
                            <td><input class="form-control  telefone_mascara" name="celular"  value="{{$dado->celular}}" type="text">  </td>
                        </tr>
                        <tr>
                            <td><h5 class="">Representante</h5></td>
                            <td colspan="4"><input class="form-control" name="representante"  value="{{$dado->representante}}" type="text"> </td>
                        </tr>       <tr>
                           
                            <td><h5>Inscrição Municipal</h5></td>
                            <td><input class="form-control" name="ins_municipal"   value="{{$dado->ins_municipal}}" type="text">  </td>

                            <td><h5>Inscrição Estadual</h5></td>
                            <td><input class="form-control" name="ins_estadual"   value="{{$dado->ins_estadual}}" type="text">  </td>                           
                        </tr>                   
                        <tr>
                            <td><h5 class="">Banco</h5></td>
                            <td><input class="form-control" name="banco"  value="{{$dado->banco}}" type="text"> </td>

                            <td><h5 class="">CNPJ</h5></td>
                            <td><input class="form-control" name="cnpj"  value="{{$dado->cnpj}}" type="text"> </td>
                            
                        </tr>
                        <tr>
                        <td><h5>Agência</h5></td>
                            <td><input class="form-control" name="agencia"  value="{{$dado->agencia}}" type="text">  </td>

                            <td><h5 class="">Conta</h5></td>
                            <td><input class="form-control" name="conta"   value="{{$dado->conta}}" type="text"> </td>
                           
                        </tr>
                        <tr>
                        <td><h5>Operação</h5></td>
                            <td><input class="form-control" name="operacao"  value="{{$dado->operacao}}" type="text">  </td>
                        </tr>
                        </table>
                </div>
                <div class="box-footer">
                    <div class="col-sm-4">
                        <input type="submit" class="btn btn-primary" value="CADASTRAR">
                    </div>
                </div>                
            </div>

    </div>
    <td><input class="form-control" name="id"  value="{{$dado->id}}" type="hidden">  </td>
</form>
@endforeach
@endsection