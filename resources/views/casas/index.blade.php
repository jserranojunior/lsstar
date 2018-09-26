@extends('layouts.header')
@section('content')


<div class="col-xs-10 col-xs-offset-1">

    <div class="box box-info">
        <div class="box-head">
            <h3 class="text-center"> Casas </h3>
        </div>

        <div class="box-body ">
            <table id="tabelaclientes" class=" display table table-condensed table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            Nome
                        </th>
                        <th>
                            Número
                        </th>
                        <th>
                            Endereço
                        </th>
                    </tr>

                </thead>
                <tbody>
                    @foreach($casas as $item)
                    <tr onclick="editar('{{$item->id}}');">
                        <td>
                            {{$item->nome}}
                        </td>
                        <td>
                            {{$item->numero}}
                        </td>
                        <td>
                            {{$item->endereco}}
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
        window.location.href = "casa/" + $id;
    }
</script>

@endsection