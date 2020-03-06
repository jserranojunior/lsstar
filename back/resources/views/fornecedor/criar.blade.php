@extends('layouts.header')
@section('content')
<style>
    .table > tbody > tr > td{
        border: 1px solid rgba(210, 210, 210, 0)! important;
    }
</style>
<form action="{{Route('fornecedor.store')}}" class="form-horizontal">
        <div class="col-xs-8 col-xs-offset-2">
        <div class="box-head">
            <h3 class="text-center"> Cadastro de Fornecedor </h3>
        </div>
            <div class="box box-info">
                <div class="box-body no-padding">
                    <table class="table text-center table-condensed">
                        <tr>
                            <td><h5 class="">Nome do fornecedor</h5></td>
                            <td colspan="4"><input class="form-control" name="nome"  type="text"> </td>
                        </tr>                        
                        <tr>
                            <td><h5 class="">CEP</h5></td>
                            <td><input class="form-control" id="cep" name="cep" type="text"> </td>
                            <td><h5>Bairro</h5></td>
                            <td><input class="form-control" id="bairro" name="bairro" type="text">  </td>
                        </tr>                        
                        <tr>
                            <td><h5 class="">Número</h5></td>
                            <td><input class="form-control" name="numero" type="number"> </td>
                            <td><h5>Cidade</h5></td>
                            <td><input class="form-control" id="cidade" name="cidade" type="text">  </td>
                        </tr>
                        <tr>
                            <td><h5 class="">Logradouro</h5></td>
                            <td colspan="4"><input class="form-control" id="rua" name="logradouro" type="text"> </td>
                        </tr>
                        <tr>
                            <td><h5 class="">Email</h5></td>
                            <td colspan="4"><input class="form-control" name="email" type="text"> </td>
                        </tr>
                        <tr>
                            <td><h5 class="">Telefone</h5></td>
                            <td><input class="form-control  telefone_mascara" name="telefone" type="text"> </td>
                            <td><h5>Celular</h5></td>
                            <td><input class="form-control  telefone_mascara" name="celular" type="text">  </td>
                        </tr>
                        <tr>
                            <td><h5 class="">Representante</h5></td>
                            <td colspan="4"><input class="form-control" name="representante" type="text"> </td>
                        </tr>       <tr>
                           
                            <td><h5>Inscrição Municipal</h5></td>
                            <td><input class="form-control" name="ins_municipal" type="text">  </td>

                            <td><h5>Inscrição Estadual</h5></td>
                            <td><input class="form-control" name="ins_estadual" type="text">  </td>                           
                        </tr>                   
                        <tr>
                            <td><h5 class="">Banco</h5></td>
                            <td><input class="form-control" name="banco" type="text"> </td>

                            <td><h5 class="">CNPJ</h5></td>
                            <td><input class="form-control" name="cnpj" type="text"> </td>
                            
                        </tr>
                        <tr>
                        <td><h5>Agência</h5></td>
                            <td><input class="form-control" name="agencia" type="text">  </td>

                            <td><h5 class="">Conta</h5></td>
                            <td><input class="form-control" name="conta" type="text"> </td>
                           
                        </tr>
                        <tr>
                        <td><h5>Operação</h5></td>
                            <td><input class="form-control" name="operacao" type="text">  </td>
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

</form>

@endsection