@extends('layouts.header')
@section('content')

<style>
    .table-cliente > tbody > tr > td{
        border: 1px solid rgba(210, 210, 210, 0)! important;
    }
    .tr-destaque{
        background-color:#cdd5db;;
    }
    .btn-add-contato{
      
        width:5%;
    }
    .form-menor{
        float:left;
        width:90%;
    }
</style>

<form action="{{Route('cliente.update')}}" method="post" class="form-horizontal">

    @foreach($dados['dados'] as $cliente)
    <div class="col-xs-10 col-xs-offset-1">

        <div class="box box-info">
            <div class="box-head">
                <h3 class="text-center"> Editar Cliente </h3>
            </div>
            <div class="box-body no-padding">
                <table class="table table-cliente text-center table-condensed">

                    <tr>
                        <td>
                            <h5 class="text-primary">[1] Nome</h5>
                        </td>
                        <td colspan="4"><input class="form-control form-menor" value="{{$cliente->nome}}" name="nome"
                                type="text">

                            <div id="btn-add-contato" class="btn btn-add-contato btn-primary text-center">
                                <span class="glyphicon glyphicon-menu-down"></span>
                            </div>
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <h5 class="">Email</h5>
                        </td>
                        <td colspan="4"><input class="form-control" value="{{$cliente->email}}" name="email" type="text">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h5 class="">Telefone</h5>
                        </td>
                        <td><input colspan="2" class="form-control telefone_mascara" value="{{$cliente->telefone}}"
                                name="telefone" type="text"> </td>

                        <td>
                            <h5 class="">Idade</h5>
                        </td>
                        <td colspan="2"><input class="form-control " value="{{$cliente->idade}}" id="idade" name="idade"
                                type="number"> </td>



                    </tr>
                    <tr>

                        <td>
                            <h5 class="">Profissão</h5>
                        </td>
                        <td><input colspan="2" class="form-control" value="{{$cliente->profissao}}" name="profissao"
                                type="text"> </td>

                        <td>
                            <h5>Empresa</h5>
                        </td>
                        <td colspan="2">

                            <input class="form-control" name="empresa" value="{{$cliente->empresa}}" type="text">
                        </td>





                    </tr>

                    <span class="segundocontato" id="segundocontato">
                        <tr class="linha-ocultar">
                            <td>
                                <h5 class="text-primary">[2] Nome</h5>
                            </td>
                            <td colspan="4"><input class="form-control" name="segundonome" value="{{$cliente->segundonome}}"
                                    type="text"> </td>
                        </tr>

                        <tr class="linha-ocultar">
                            <td>
                                <h5 class="">Email</h5>
                            </td>
                            <td colspan=""><input class="form-control" name="segundoemail" value="{{$cliente->segundoemail}}"
                                    type="text"> </td>

                            <td>
                                <h5 class="">Telefone</h5>
                            </td>
                            <td colspan="2"><input class="form-control telefone_mascara" name="segundotelefone" value="{{$cliente->segundotelefone}}"
                                    type="text"> </td>

                        </tr>


                        <tr class="linha-ocultar">

                            <td>
                                <h5 class="">Profissão</h5>
                            </td>
                            <td><input class="form-control" name="segundoprofissao" value="{{$cliente->segundoprofissao}}"
                                    type="text"> </td>

                            <td>
                                <h5>Empresa</h5>
                            </td>
                            <td colspan="2"><input class="form-control" name="segundoempresa" value="{{$cliente->segundoempresa}}"
                                    type="text">
                            </td>

                        </tr>
                    </span>

                    <span class="terceirocontato" id="terceirocontato">
                        <tr class="linha-ocultar">
                            <td>
                                <h5 class="text-primary">[3] Nome</h5>
                            </td>
                            <td colspan="4"><input class="form-control" name="terceironome" value="{{$cliente->terceironome}}"
                                    type="text"> </td>
                        </tr>

                        <tr class="linha-ocultar">
                            <td>
                                <h5 class="">Email</h5>
                            </td>
                            <td colspan=""><input class="form-control" name="terceiroemail" value="{{$cliente->terceiroemail}}"
                                    type="text"> </td>

                            <td>
                                <h5 class="">Telefone</h5>
                            </td>
                            <td colspan="2"><input class="form-control telefone_mascara" value="{{$cliente->terceirotelefone}}"
                                    name="terceirotelefone" type="text"> </td>

                        </tr>
                        <tr class="linha-ocultar">

                            <td>
                                <h5 class="">Profissão</h5>
                            </td>
                            <td><input class="form-control" name="terceiroprofissao" type="text"> </td>

                            <td>
                                <h5>Empresa</h5>
                            </td>
                            <td colspan="2"><input class="form-control" name="terceiroempresa" value="{{$cliente->terceiroempresa}}"
                                    type="text">
                            </td>

                        </tr>
                    </span>



                    <tr>
                        <td>
                            <h5 class="">CEP</h5>
                        </td>
                        <td><input class="form-control" name="cep" id="cep" value="{{$cliente->cep}}" type="number">
                        </td>

                        <td>
                            <h5>Bairro</h5>
                        </td>
                        <td colspan="2">
                            <input class="form-control" name="bairro" id="bairro" value="{{$cliente->bairro}}" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="">Logradouro</h5>
                        </td>
                        <td><input class="form-control" name="logradouro" id="rua" value="{{$cliente->logradouro}}"
                                type="text"> </td>

                        <td>
                            <h5 class="">Moradia</h5>
                        </td>
                        <td colspan="2">
                            <select class="form-control" name="tipomoradia" value="{{$cliente->tipomoradia}}">
                                <option>{{$cliente->tipomoradia}}</option>
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
                        <td><input class="form-control" name="numero" value="{{$cliente->numero}}" type="number"> </td>
                        <td>
                            <h5>Cidade</h5>
                        </td>
                        <td colspan="2"><input class="form-control" name="cidade" id="cidade" value="{{$cliente->cidade}}"
                                type="text"> </td>
                    </tr>


                    <tr class="tr-destaque">
                        <td>
                            <h5>Valor da casa</h5>
                        </td>
                        <td><input class="form-control valor_mascara" name="casainteresse" value="{{$cliente->casainteresse}}"
                                id="casainteresse" type="text"> </td>

                        <td>
                            <h5>Renda Familiar</h5>
                        </td>
                        <td colspan="2"><input class="form-control valor_mascara" id="renda" value="{{$cliente->renda}}"
                                name="renda" type="text"> </td>


                    </tr>

                    <tr class="tr-destaque">
                        <td>
                            <h5>Sinal</h5>
                        </td>
                        <td><input class="form-control valor_mascara" name="sinal" id="sinal" value="{{$cliente->sinal}}"
                                type="text"> </td>

                        <td>
                            <h5>Poupança</h5>
                        </td>
                        <td colspan="2"><input class="form-control valor_mascara" name="poupanca" id="poupanca" value="{{$cliente->poupanca}}"
                                type="text"> </td>
                    </tr>

                    <tr class="tr-destaque">
                        <td>
                            <h5>FGTS</h5>
                        </td>
                        <td><input class="form-control valor_mascara" name="fgts" id="fgts" value="{{$cliente->fgts}}"
                                type="text"> </td>

                        <td>
                            <h5>Entrada</h5>
                        </td>
                        <td colspan="2"><input class="form-control valor_mascara" id="valorentrada" value="{{$cliente->valorentrada}}"
                                name="valorentrada" type="text"> </td>


                    <tr class="tr-destaque">
                        <td>
                            <h5>Financiado</h5>
                        </td>
                        <td><input class="form-control valor_mascara" name="financiado" id="financiado" value="{{$cliente->financiado}}"
                                type="text"> </td>

                        <td>
                            <h5>Prestações</h5>
                        </td>
                        <td colspan="2"><input class="form-control" id="prestacao" name="prestacao" value="{{$cliente->prestacao}}"
                                type="text"> </td>

                    </tr>

                    <tr class="tr-destaque">
                        <td>
                            <h5>Valor Prestação</h5>
                        </td>
                        <td><input class="form-control valor_mascara" name="valorprestacao" id="valorprestacao" value="{{$cliente->valorprestacao}}"
                                type="text">
                        </td>

                        <td>
                            <h5>Informação</h5>
                        </td>
                        <td><input class="form-control " name="informacao" id="informacao" value="{{$cliente->informacao}}"
                                type="text">
                    </tr>
                    <tr>                        
                        <td>
                            <h5>Empreendimento que Possui</h5>
                        </td>
                        <td colspan="4">
                            <select name="empreendimento" class="form-control" id="empreendimento">
                                <option value="">nome do emprendimento</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="">Observação</h5>
                        </td>
                        <td colspan="4"><input class="form-control" name="observacao" value="{{$cliente->observacao}}"
                                type="text">
                        </td>
                    </tr>
                </table>
                <tr>
                    <td>
                        <h3 class="text-center"> HISTÓRICO DE VISITAS </h3>
                    </td>
                </tr>
                <div class="col-md-12">
                    <table class="table table-condensed">
                        <tr>
                            <th>
                                Data
                            </th>
                            <th>
                                Imóvel
                            </th>
                            <th>
                                Resultado
                            </th>
                        </tr>

                        @foreach($dados['agendamentos'] as $agendamento)
                        <tr>
                            <td>{{$agendamento->data}}</td>
                            <td>{{$agendamento->imovel}}</td>
                            <td>{{$agendamento->resultado}}</td>
                        <tr>
                            @endforeach
                    </table>

                    @foreach($casas as $itemCasa)
                    <tr>
                        <td>
                            <h3 class="text-center"> EMPRENDIMENTO </h3>
                        </td>
                    </tr>

                    
                    <table class="table table-condensed">
                        <tr>
                            <td>Empreendimento</td>
                            <td>{{$itemCasa->nome}}</td>
                        </tr>
                        <tr>
                            <td>
                                Casa
                            </td>
                            <td>
                                {{$itemCasa->numero}}
                            </td>
                        </tr>
                        <tr>
                            <td>N° Matricula</td>
                            <td>{{$itemCasa->numero_matricula}}</td>
                        </tr>
                    </table>
                    @endforeach

                </div>
                <div class="box-footer">
                    <div class="col-sm-4">
                        <input type="submit" class="btn btn-primary" value="SALVAR">
                    </div>
                </div>
            </div>

        </div>
        <input type="hidden" <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{$cliente->id}}">
</form>


</div>

@endforeach













<script>
    $(document).ready(function () {

        /*
        jQuery('input').on('keyup',function(){

            var valorTotalFamilia = 0;
            var financiado = 0;
               
            var sinal = $('#sinal').val();    
            sinal = sinal.replace(".", "");      
            sinal = sinal.replace(",", ".");          
            sinal = parseFloat(sinal);

            var poupanca = $('#poupanca').val();    
            poupanca = poupanca.replace(".", "");      
            poupanca = poupanca.replace(",", ".");          
            poupanca = parseFloat(poupanca);

            var fgts = $('#fgts').val();    
            fgts = fgts.replace(".", "");      
            fgts = fgts.replace(",", ".");          
            fgts = parseFloat(fgts);

            var entrada = $('#valorentrada').val();   


            
             
            entrada = entrada.replace(".", "");      
            entrada = entrada.replace(",", ".");          
            entrada = parseFloat(entrada);

            if(poupanca > ""){
                valorTotalFamilia = valorTotalFamilia + poupanca;
            }
            if(sinal > ""){
                valorTotalFamilia = valorTotalFamilia + sinal;
            }
            if(fgts > ""){
                valorTotalFamilia = valorTotalFamilia + fgts;
            }    

             if(entrada > ""){
                valorTotalFamilia = valorTotalFamilia + entrada;
            }       

            var valorcasa = $('#casainteresse').val();              
            valorcasa = valorcasa.replace(".", "");      
            valorcasa = valorcasa.replace(",", ".");          
            valorcasa = parseFloat(valorcasa);

             

            if(valorTotalFamilia > ""){
                var financiado = valorcasa - valorTotalFamilia;
            }

            prestacao = $('#prestacao').val();  
           // prestacao = parseInt(prestacao);
           
           if((financiado > "") && (prestacao > "")){
            
            var valorprestacao =  (financiado / prestacao);

            valorprestacao = valorprestacao.toLocaleString(undefined, {minimumFractionDigits: 2});
            $("#valorprestacao").val(valorprestacao);

            idade =  $("#idade").val();
            idade = parseInt(idade);

            var prestacaomesano = (prestacao / 12);
            prestacaomesano = parseInt(prestacaomesano);

            validarprestacao = (prestacaomesano + idade);
            
            

            if(validarprestacao > 80){
               $("#informacao").val("Financiamento passou 80 anos");                
            }else{
                $("#informacao").val("Financiamento aprovado");      
            }
            
           }
          

           // $("#valorprestacao").val() = valorfinanciado;

             financiado = financiado.toLocaleString(undefined, {minimumFractionDigits: 2});
            $('#financiado').val(financiado);  
            
            /*
            soma = soma.toLocaleString(undefined, {minimumFractionDigits: 2});
            $('#valorentrada').val(soma);     
          
 
})

*/

        $(".linha-ocultar").hide();

        $("#btn-add-contato").click(function () {
            $(".linha-ocultar").toggle('slow');
        });




    });
</script>

<div>



    @endsection