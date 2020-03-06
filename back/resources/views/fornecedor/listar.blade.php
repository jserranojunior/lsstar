@extends('layouts.header')
@section('content')

<div class="col-xs-10 col-xs-offset-1">
        
    <div class="box box-info">
            <div class="box-head">
            <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h3 class="text-center"> FORNECEDORES </h3>
            </div>
            <div class="col-md-4 text-right">
                <a href="{{URL('/fornecedor/criar')}}"> <div class="btn btn-primary ">NOVO</div></a>
            </div>
            </div>
            
    
               
            </div>

        <div class="box-body ">
<table id="tabelaclientes" class=" display table table-condensed table-hover"> 
    <thead>
        <tr>
            <th>
            Nome
            </th>
            <th>
           Endereço
            </th>
            <th>
            Numero
            </th>
            <th>
            Bairro
            </th>
        </tr>
       
    </thead>
    <tbody>
    @foreach($dados as $dado)
    <tr onclick="editar('{{$dado->id}}');">
        <td>
        {{$dado->fornecedor}}
        </td>
        <td>
        {{$dado->endereco}}
        </td>
        <td>
        {{$dado->numero}}
        </td>
        <td>
        {{$dado->bairro}}
        </td>
    </tr>

    @endforeach
    </tbody>
</table>

        </div>
    </div>
</div>

<script>
function editar($id){    
    window.location.href = "fornecedor/editar/"+$id;
}

</script>

@endsection