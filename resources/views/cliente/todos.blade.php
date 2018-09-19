@extends('layouts.header')
@section('content')


<div class="col-xs-10 col-xs-offset-1">

    <div class="box box-info">
        <div class="box-head">
            <h3 class="text-center"> Clientes </h3>
        </div>

        <div class="box-body ">
            <table id="tabelaclientes" class=" display table table-condensed table-hover">
                <thead>
                    <tr>
                        <th>
                            Nome
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Telefone
                        </th>
                    </tr>

                </thead>
                <tbody>
                    @foreach($dados as $cliente)
                    <tr onclick="editar('{{$cliente->id}}');">
                        <td>
                            {{$cliente->nome}}
                        </td>
                        <td>
                            {{$cliente->email}}
                        </td>
                        <td>
                            {{$cliente->telefone}}
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>



<script>
    $(document).ready(function () {
        $('#tabelaclientes').DataTable({
            "iDisplayLength": 100
        });
    });

    function editar($id) {
        window.location.href = "cliente/editar/" + $id;
    }
</script>
@endsection