@extends('layouts.headertwo')
@section('content')


  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="col-xs-12">
    <div class='box box-info'>
        <div class='box-header with-border text-center'>
            ADICIONAR NOVA CONTA
        </div>
        <div class='box-body'>
            <form class="form-horizontal" id="formEdicao" method="post" action="{{Route('financeiro.store')}}">
                
                <div class="form-group">
                    <label for="favorecido" class='col-xs-4  control-label'>Fornecedor</label>
                    <div class="col-xs-8">
                        
                        <select name="favorecido"  id="favorecido" class="form-control select_busca input_menor">
                        <option></option>
                            @foreach($favorecidos as $favorecido)
                            <option>{{$favorecido->fornecedor}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label for="tipo" class='col-xs-4 control-label'>Tipo de conta</label>	
                    <div class="col-xs-8">
                        <select name="tipo" id="tipo" class="form-control ">
                           <option value="Extra">À Vista</option>
                           <option value="Parcelado">Parcelado</option>
                           <option value="Fixo">Mensal</option>
                        </select>
                    </div>
                </div>



                <date-util format="dd/MM/yyyy"></date-util>

                <div class="form-group">
                    <label for="inicio_conta" class="col-xs-4 control-label">Data Pagamento</label>
                    <div class="col-xs-8">
                        <input type="date" name="inicio_conta"  id="inicio_conta" value="{{$data_atual}}-01" class="form-control"></input>
                    </div>
                </div>

                <div class="form-group">

                    <label for="valor" class="col-xs-4 control-label">
                    <p id="valor-vista">Valor</p> 
                    <p id="valor-parcela" class="ocultar">Valor de cada parcela</p>
                    </label>

                    <div class="col-xs-8">
                        <input type="text" name="valor" id="valor" class=" valor_mascara form-control"></input>
                    </div>
                </div>

                <div class="form-group" id="group-parcelas">
                    <label for="parcelas" class="col-xs-4 control-label">Quantida de parcelas</label>
                    <div class="col-xs-8">
                        <input type="number" name="parcelas"  id="parcelas" class="form-control"></input>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="area" class="col-xs-4 control-label">Negócios</label>
                    <div class="col-xs-8"> 
                        <select name="area" id="area" class="form-control">
                   
                        @foreach($areas as $area)
                        <option>{{$area->nome}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ccustos"  class="col-xs-4 control-label">Conta</label>
                    <div class="col-xs-8"> 
                        <select name="ccustos" id="ccustos" class="form-control">
                            
                            @foreach($contas as $conta)
                            <option>{{$conta->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="item" class="col-xs-4 control-label">Detalhes</label>
                    <div class="col-xs-8">                      
                        <input type="text" name="item" value="" id="item" class="form-control">                   
                    </div>
                </div>

                <div class="form-group">
                    <label for="pagador"  class="col-xs-4 control-label">REC/NF</label>
                    <div class="col-xs-8"> 
                        <select name="pagador" id="pagador" class="form-control select_busca">                             
                            <option>Recibo</option>
                            <option>Nota Fiscal</option>
                        </select>
                    </div>
                </div>


        </div>
        <div class="box-footer with-border">
            <div class="form-group ">
                <div class="col-xs-offset-4 col-xs-4">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="btn btn-primary" onClick="submitarValor();">CADASTRAR</div>
                <!-- <input type="submit" value="CADASTRAR" class="btn btn-primary"> -->
                </div> 
                
            </div>
        </div>
    </div>
</form>

<script>
    function submitarValor(){       
        document.getElementById("formEdicao").submit();
        window.opener.location.reload(true);
        self.close(); 
    }
</script>

@endsection