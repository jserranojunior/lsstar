<template>
    <div>
    
    
        <div class="col-xs-10 col-xs-offset-1">
            <div class="box box-info">
                <div class="box-head">
                    <h3 class="text-center"> Cadastro de Cliente </h3>
                </div>
                <div class="box-body no-padding">
                    <table class="table text-center table-condensed">
                        <tr>
                            <td>
                                <h5 class="text-primary">Nome</h5>
                            </td>
                            <td colspan="4"><input class="form-control " name="nome" type="text">
                                
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
    
                    </table>
    
                    <div class="box-footer">
                        <div class="col-sm-4">
                            <input type="submit" class="btn btn-primary" value="CADASTRAR">
                        </div>
                    </div>
                </div>
    
            </div>
        </div>

    </div>
    
</template>

<script>
export default {
    name: "CreateClientes"
}
</script>

