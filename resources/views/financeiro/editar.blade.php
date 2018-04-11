@extends('layouts.headertwo')
@section('content')

@foreach($objetos as $objeto)
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="col-xs-12">
    <div class='box box-info'>
        <div class='box-header with-border text-center'>
            EDITAR CONTA
        </div>
        <div class='box-body'>
            <form class="form-horizontal" method="post" action="{{Route('financeiro.update')}}">
                
                <div class="form-group">
                    <label for="favorecido" class='col-xs-4  control-label'>Fornecedor</label>
                    <div class="col-xs-8">
                        
                        <select name="favorecido"  id="favorecido" class="form-control select_busca input_menor">
                        <option selected>{{$objeto->favorecido}}</option>
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
                           <option @if($objeto->tipo == "Extra")selected @endif value="Extra">À Vista</option>
                           <option @if($objeto->tipo == "Parcelado")selected @endif  value="Parcelado">Parcelado</option>
                        </select>
                    </div>
                </div>



                

                <div class="form-group">
                    <label for="inicio_conta" class="col-xs-4 control-label">Data Pagamento</label>
                    <div class="col-xs-8">
                        <input type="date" name="inicio_conta"  id="inicio_conta" value="{{$objeto->inicio_mes}}" class="form-control"></input>
                    </div>
                </div>

                <div class="form-group">

                    <label for="valor" class="col-xs-4 control-label">
                    <p id="valor-vista">Valor</p> 
                    <p id="valor-parcela" class="ocultar">Valor de cada parcela</p>
                    </label>

                    <div class="col-xs-8">
                        <input type="text" name="valor" value="{{$objeto->valor}}" id="valor" class=" valor_mascara form-control"></input>
                    </div>
                </div>

                <div class="form-group" id="group-parcelas">
                    <label for="parcelas" class="col-xs-4 control-label">Quantida de parcelas</label>
                    <div class="col-xs-8">
                        <input type="number" name="parcelas" value="{{$objeto->parcelas}}" id="parcelas" class="form-control"></input>
                    </div>
                </div>
                

                <div class="form-group">
                    <label for="area" class="col-xs-4 control-label">Negócios</label>
                    <div class="col-xs-8"> 
                        <select name="area" id="area" class="select_busca form-control">
                        <option selected>{{$objeto->area}}</option>
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
                            <option selected >{{$objeto->contas}}</option>
                            @foreach($contas as $conta)
                            <option>{{$conta->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="item" class="col-xs-4 control-label">Detalhes</label>
                    <div class="col-xs-8">
                      <input type="text" name="item" value="{{$objeto->item}}" id="item" class="form-control">
                    </div>
                </div>
    
                <div class="form-group">
                    <label for="pagador"  class="col-xs-4 control-label">REC/NF</label>
                    <div class="col-xs-8"> 
                        <select name="pagador" id="pagador" class="form-control select_busca">                             
                            <option @if($objeto->pagador == "Recibo") selected @endif>Recibo</option>
                            <option @if($objeto->pagador == "Nota Fiscal") selected @endif>Nota Fiscal</option>
                        </select>
                    </div>
                </div>
   

        </div>
        <div class="box-footer with-border">
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-4">
                <input type="hidden" name="id" value="{{ $objeto->id }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" value="Atualizar" class="btn btn-primary">
                </div> 
                </form>


                <!-- Small modal -->

    <div class="col-sm-4">
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content text-center">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Deseja realmente excluir?</h4>
    </div>
    <div class="modal-body">
    <a href=" {{Route('financeiro.destroy',$objeto->id)}}"><input type="submit" value="SIM" class="btn btn-primary"></a>
    <button type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close">Não</button>
    
    </div>

      
</div>
  </div>
</div>
</div>

                <div class="direita col-xs-4">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm">Excluir</button>

                </div>
            </div>
        </div>
    </div>


@endforeach
@endsection