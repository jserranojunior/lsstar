@extends('layouts.header')
@section('content')


<div class="col-xs-10 col-xs-offset-1">

    <div class="box box-info">
            <div class="box-header with-border text-center">
                    <h3 class="box-title">Unidades de Negócio</h4>
  
                    <div class="box-tools pull-right">
                      <a href="casa/criar">
                      <button type="button" class="btn btn-box-tool">
                         
                          <span class="float-right btn btn-primary">
                                (+) Novo
                        </span>
                      </button>
                    </a>
                     
                    </div>
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
                        <th>RGI</th>
                        <th>Status</th>
                        
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
                        <td>
                            {{$item->rgi}}
                        </td>
                        <td>
                            {{$item->status}}
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
        window.location.href = "casa/editar/" + $id;
    }
</script>

@endsection