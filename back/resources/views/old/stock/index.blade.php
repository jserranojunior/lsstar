@extends('layouts.header')
@section('content')


<div class="box">
    <div class="box-body">
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>
                    PATRIMÔNIO
                </th>
                <th>
                    CATEGORIA
                </th>
                <th>
                    PRODUTO
                </th>
                <th>
                    QTD.
                </th>
                <th>
                    NOTA FISCAL
                </th>
                <th>
                    NÙMERO DE SERIE
                </th>
                <th>
                    VALOR
                </th>
            </tr>
            </thead>
            @foreach($dados as $dado)
            <tr class="point" onclick="document.location='estoque/{{$dado->id}}/editar';">
                <td>
                    {{$dado->tag}}
                </td>
                <td>
                    {{$dado->category}}
                </td>
                <td>
                    {{$dado->product}}
                </td>
                <td class="text-center">
                    {{$dado->amount}}
                </td>
                <td>
                    {{$dado->inputNf}}
                </td>
                <td>
                    {{$dado->numberSeries}}
                </td>
                <td>
                    {{$dado->value}}
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

<script>
    function 
    </script>


@endsection
