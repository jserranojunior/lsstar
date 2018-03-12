@extends('layouts.header')
@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<style>
    .table > tbody > tr > td{
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

@foreach($dados as $dado)

<div class="col-md-offset-2 col-md-8">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="text-center">EDITAR AGENDAMENTO</h3>
        </div>    
            <div class="box-body">
                <form method="post" action="{{Route('agenda.update')}}" class="agendamento">
                    <table class="table  table-condensed">
                       
                        <tr>
                                <td class="text-center"><label for="data"><h5>Data Agendamento</h5></label></td>
                                <td><input class="form-control" value="{{$dado->data}}" type="date" name="data" required></td>

                                <td class="text-center"><label for="hora"><h5>Horario Agendamento</h5></label></td>
                                <td><input class="form-control" value="{{$dado->horario}}" type="time" name="horario" required></td>
                        </tr>
                        <tr>
                            <td class="text-center"><label for="referencia"><h5>Referencia</h5></label></td>
                            <td><input class="form-control" value="{{$dado->referencia}}"  type="text" name="referencia" ></td>

                            <td class="text-center"><label for="imovel"><h5>Imóvel</h5></label></td>
                            <td><input class="form-control" type="text"  value="{{$dado->imovel}}"  name="imovel" ></td>
                        </tr>
                        <tr>
                            <td class="text-center"><label for="resultado"><h5>Resultado</h5></label></td>
                            <td><input class="form-control" type="text" value="{{$dado->resultado}}"  name="resultado" ></td>

                            <td class="text-center"><label for="expectativa"><h5>Expectativa de Negócio</h5></label></td>
                            <td><input class="form-control" type="text" value="{{$dado->expectativa}}"  name="expectativa" ></td>
                        </tr>
                     </table>

                     <div class="box-footer float-right">
                     <input type="hidden" name="id" value="{{ $dado->id }}">   
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-sm btn-primary" value="ATUALIZAR">
                    </div>    
                </form>        
            </div>
    </div>
</div>




@endforeach

@endsection