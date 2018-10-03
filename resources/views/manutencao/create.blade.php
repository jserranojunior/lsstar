@extends('layouts.header')
@section('content')

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

<form action="{{Route('cliente.store')}}" method="post" class="form-horizontal">


    <div class="col-xs-10 col-xs-offset-1">

        <div class="box box-info">
            <div class="box-head">
                <h3 class="text-center"> Nova Manutenção </h3>
            </div>
            <div class="box-body no-padding">
                <table class="table text-center table-condensed">
                    <tr>
                        <td>
                            <h4 class="text-primary">Casa</h4>
                        </td>
                        <td>
                            <select name="casa" class="form-control" id="">
                                <option value="">Asturias</option>
                            </select></td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4 class="text-primary">Tipo de solicitação</h4>
                        </td>
                        <td>
                            <select name="casa" class="form-control" id="">
                                <option value="">Estrutural</option>
                            </select></td>
                        </td>
                    </tr>
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