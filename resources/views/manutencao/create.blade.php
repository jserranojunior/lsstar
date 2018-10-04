@extends('layouts.header')
@section('content')




<div class="col-xs-8 col-xs-offset-2">

    <div class="box box-info">
        <div class="box-head">
            <h3 class="text-center"> Nova Casa </h3>
        </div>
        <form action="./cadastrar" method="POST">
            <div class="box-body ">
                <table class="table text-center table-condensed">
                    <tr class="bg-warning">
                        <td>
                            <h5 class="text-primary">Casa</h5>
                        </td>
                        <td>
                            <select name="casa" class="form-control" id="">
                                <option value="">Asturias</option>
                            </select></td>
                        </td>
                    </tr>
                    <tr class="bg-warning">
                        <td>
                            <h5 class="text-primary">Data de Garantia</h5>
                        </td>
                        <td>
                            <input type="date" class="form-control" name="data_garantia" id=""></td>
                   
                        </td>
                    </tr>
                    <tr class="bg-warning">
                        <td>
                            <h5 class="text-primary">Proprietário</h5>
                        </td>
                        <td>
                            <select name="proprietario" class="form-control" id="">
                                <option value="">Nome do proprietario</option>
                            </select></td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Tipo de solicitação</h5>
                        </td>
                        <td>
                            <select name="casa" class="form-control" id="">
                                <option value="">Estrutural</option>
                                <option value="">Piso</option>
                                <option value="">Azuleijos</option>
                                <option value="">Alvenaria</option>
                                <option value="">Pintura</option>                                
                            </select></td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Descrição</h5>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="descricao">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Data da Solicitação</h5>
                        </td>
                        <td>
                        <input type="date" class="form-control" name="data_solicitacao" id=""></td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Data da Visita Tecnica</h5>
                        </td>
                        <td>
                        <input type="date" class="form-control" name="data_visita" id=""></td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-primary">Link das Fotos</h5>
                        </td>
                        <td>
                        <input type="text" class="form-control" name="link_fotos" id=""></td>
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