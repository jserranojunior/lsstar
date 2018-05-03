@extends('layouts.header')
@section('content')


<div class="col-xs-10 col-xs-offset-1">
        
    <div class="box box-info">
            <div class="box-head">
                <h3 class="text-center"> AREAS </h3>
            </div>

        <div class="box-body ">
<table id="tabelaclientes" class=" display table table-condensed table-hover"> 
    <thead>
        <tr>
            <th>
                Nome
            </th>  
            <th>
                Valor Inicial
            </th>   
            <th>
                Data Inicio
            </th>      
        </tr>       
    </thead>
    <tbody>
    @foreach($dados as $area)
    <tr onclick="editar('{{$area->id}}');">
        <td>
        {{$area->nome}}
        </td>
        <td></td>
        <td></td>
    </tr>

    @endforeach
    </tbody>
</table>

        </div>
    </div>
</div>

<script>

function editar($id){    
    window.location.href = "areas/"+$id;
}

</script>
@endsection