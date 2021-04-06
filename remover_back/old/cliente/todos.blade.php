@extends('layouts.header')
@section('content')


<div class="col-xs-10 col-xs-offset-1">

    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">

                @if($tipocliente == "proprietario")
                Proprietários
                @else
                Clientes

                <a href="{{Route('cliente.create')}}">
                    <div class="btn btn-info float-right">(+) NOVO</div>
                </a>
                @endif


            </h3>
        </div>
    </div>

    <div class="box box-info">
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
                        @if($tipocliente == "proprietario")
                        <th>
                            Empreendimento
                        </th>
                        <th>
                            Numero
                        </th>
                        @endif
                        
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
                        @if($tipocliente == "proprietario")
                        <td>
                        @if(!empty($cliente->nome_empreendimento))
                            {{$cliente->nome_empreendimento}}
                        @endif    

                        </td>
                        <td>
                        @if(!empty($cliente->numero_empreendimento))
                            {{$cliente->numero_empreendimento}}
                        @endif    
                        </td>
                        @endif
                    </tr>

                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>



<script>
    

    function editar($id) {
        window.location.href = "cliente/editar/" + $id;
    }
</script>
@endsection