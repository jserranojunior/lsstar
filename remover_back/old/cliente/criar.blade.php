@extends('layouts.header')
@section('content')


<form action="{{Route('cliente.store')}}" method="post" class="form-horizontal">


    <div class="col-xs-10 col-xs-offset-1">

        <div class="box box-info">
            <div class="box-head">
                <h3 class="text-center"> Cadastro de Cliente </h3>
            </div>
            <div class="box-body no-padding">
                <table class="table text-center table-condensed">

                    <tr>
                        <td>
                            <h5 class="text-primary">[1] Nome</h5>
                        </td>
                        <td colspan="4"><input class="form-control form-menor" name="nome" type="text">
                            <div id="btn-add-contato" class="btn btn-add-contato btn-primary text-center">
                                <span class="glyphicon glyphicon-menu-down"></span>
                            </div>
                        </td>




                    </tr>

                    <tr>
                        <td>
                            <h5 class="">Email</h5>
                        </td>
                        <td colspan="4"><input class="form-control" name="email" type="text"> </td>
                    </tr>

                    <tr>
                        <td>
                            <h5 class="">Telefone</h5>
                        </td>
                        <td><input colspan="2" class="form-control telefone_mascara" name="telefone" type="text"> </td>

                        <td>
                            <h5 class="">Idade</h5>
                        </td>
                        <td colspan="2"><input class="form-control" id="idade" name="idade" type="number"> </td>



                    </tr>
                    <tr>

                        <td>
                            <h5 class="">Profissão</h5>
                        </td>
                        <td><input colspan="2" class="form-control" name="profissao" type="text"> </td>

                        <td>
                            <h5>Empresa</h5>
                        </td>
                        <td colspan="2">

                            <input class="form-control" name="empresa" type="text">
                        </td>





                    </tr>

                    <span class="segundocontato" id="segundocontato">
                        <tr class="linha-ocultar">
                            <td>
                                <h5 class="text-primary">[2] Nome</h5>
                            </td>
                            <td colspan="4"><input class="form-control" name="segundonome" type="text"> </td>
                        </tr>

                        <tr class="linha-ocultar">
                            <td>
                                <h5 class="">Email</h5>
                            </td>
                            <td colspan=""><input class="form-control" name="segundoemail" type="text"> </td>

                            <td>
                                <h5 class="">Telefone</h5>
                            </td>
                            <td colspan="2"><input class="form-control telefone_mascara" name="segundotelefone" type="text">
                            </td>

                        </tr>


                        <tr class="linha-ocultar">

                            <td>
                                <h5 class="">Profissão</h5>
                            </td>
                            <td><input class="form-control" name="segundoprofissao" type="text"> </td>

                            <td>
                                <h5>Empresa</h5>
                            </td>
                            <td colspan="2"><input class="form-control" name="segundoempresa" type="text">
                            </td>

                        </tr>
                    </span>

                    <span class="terceirocontato" id="terceirocontato">
                        <tr class="linha-ocultar">
                            <td>
                                <h5 class="text-primary">[3] Nome</h5>
                            </td>
                            <td colspan="4"><input class="form-control" name="terceironome" type="text"> </td>
                        </tr>

                        <tr class="linha-ocultar">
                            <td>
                                <h5 class="">Email</h5>
                            </td>
                            <td colspan=""><input class="form-control" name="terceiroemail" type="text"> </td>

                            <td>
                                <h5 class="">Telefone</h5>
                            </td>
                            <td colspan="2"><input class="form-control telefone_mascara" name="terceirotelefone" type="text">
                            </td>

                        </tr>
                        <tr class="linha-ocultar">

                            <td>
                                <h5 class="">Profissão</h5>
                            </td>
                            <td><input class="form-control" name="terceiroprofissao" type="text"> </td>

                            <td>
                                <h5>Empresa</h5>
                            </td>
                            <td colspan="2"><input class="form-control" name="terceiroempresa" type="text">
                            </td>

                        </tr>
                    </span>



                    <tr>
                        <td>
                            <h5 class="">CEP</h5>
                        </td>
                        <td><input class="form-control" name="cep" id="cep" type="number"> </td>

                        <td>
                            <h5>Bairro</h5>
                        </td>
                        <td colspan="2">
                            <input class="form-control" name="bairro" id="bairro" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="">Logradouro</h5>
                        </td>
                        <td><input class="form-control" name="logradouro" id="rua" type="text"> </td>

                        <td>
                            <h5 class="">Moradia</h5>
                        </td>
                        <td colspan="2">
                            <select class="form-control" name="tipomoradia">
                                <option></option>
                                <option>Aluguel</option>
                                <option>Própria</option>
                                <option>Parente</option>
                            </select>
                        </td>


                    </tr>

                    <tr>
                        <td>
                            <h5 class="">Número</h5>
                        </td>
                        <td><input class="form-control" name="numero" type="number"> </td>
                        <td>
                            <h5>Cidade</h5>
                        </td>
                        <td colspan="2"><input class="form-control" name="cidade" id="cidade" type="text"> </td>
                    </tr>

                    <tr class="tr-destaque">
                        <td>
                            <h5>Valor da casa</h5>
                        </td>
                        <td><input class="form-control valor_mascara" name="casainteresse" id="casainteresse" type="text">
                        </td>

                        <td>
                            <h5>Renda Familiar</h5>
                        </td>
                        <td colspan="2"><input class="form-control valor_mascara" id="renda" name="renda" type="text">
                        </td>
                    </tr>

                    <tr class="tr-destaque">
                        <td>
                            <h5>Sinal</h5>
                        </td>
                        <td><input class="form-control valor_mascara" name="sinal" id="sinal" type="text"> </td>

                        <td>
                            <h5>Poupança</h5>
                        </td>
                        <td colspan="2"><input class="form-control valor_mascara" name="poupanca" id="poupanca" type="text">
                        </td>
                    </tr>

                    <tr class="tr-destaque">
                        <td>
                            <h5>FGTS</h5>
                        </td>
                        <td><input class="form-control valor_mascara" name="fgts" id="fgts" type="text"> </td>

                        <td>
                            <h5>Entrada</h5>
                        </td>
                        <td colspan="2"><input class="form-control valor_mascara" id="valorentrada" name="valorentrada"
                                type="text"> </td>


                    <tr class="tr-destaque">
                        <td>
                            <h5>Financiado</h5>
                        </td>
                        <td><input class="form-control valor_mascara" name="financiado" id="financiado" type="text">
                        </td>

                        <td>
                            <h5>Prestações</h5>
                        </td>
                        <td colspan="2"><input class="form-control" id="prestacao" name="prestacao" type="text"> </td>

                    </tr>

                    <tr class="tr-destaque">
                        <td>
                            <h5>Valor Prestação</h5>
                        </td>
                        <td><input class="form-control valor_mascara" name="valorprestacao" id="valorprestacao" value=""
                                type="text">
                        </td>

                        <td>
                            <h5>Informação</h5>
                        </td>
                        <td><input class="form-control " name="informacao" id="informacao" value="" type="text">

                    </tr>



                    <tr class="tr-destaque">

                        <td>
                            <h5 class="">Observação</h5>
                        </td>
                        <td colspan="4"><input class="form-control" name="observacao" type="text"> </td>

                </table>

                <div class="box-footer">
                    <div class="col-sm-4">
                        <input type="submit" class="btn btn-primary" value="CADASTRAR">
                    </div>
                </div>
            </div>

        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
<div>



    @endsection