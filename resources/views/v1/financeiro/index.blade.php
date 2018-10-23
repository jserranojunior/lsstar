
@extends('layouts.header')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-4 col-md-offset-4">
      <div class="card" style="width: 18rem;">
        <div class="#">
          <div class="text-center">
            <h6>DATA</h6>
          </div>
          <div class="row">
            <div class="col-sm col-xs-6">
              <div class="btn-group">
                <button type="button" class="btn text-capitalize btn-sm btn-secondary dropdown-toggle" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  {{$datas['mesAtualEscrito'] }}
                </button>
                <div class="dropdown-menu">
                  @foreach($datas['meses'] as $meses)
                  <a class="dropdown-item" href="?data={{$datas['anoAtual']}}-{{$meses['numero']}}&diaInicial={{$datas['diaInicial']}}&diaFinal={{$datas['diaFinal']}}&ordem={{$filtros['ordem']}}&area={{$filtros['area']}}">{{$meses['nome']}}</a>
                  @endforeach

                </div>
              </div>
            </div>
            <div class="col-sm col-xs-6 float-right">
              <div class="btn-group  float-right">
                <button type="button" class="float-right btn-sm btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  {{$datas['anoAtual']}}
                </button>
                <div class="dropdown-menu">
                  @foreach($datas['anos'] as $anos)
                  <a class="dropdown-item" href="?data={{$anos['numero']}}-{{$datas['mesAtual']}}&diaInicial={{$datas['diaInicial']}}&diaFinal={{$datas['diaFinal']}}&ordem={{$filtros['ordem']}}&area={{$filtros['area']}}">{{$anos['numero']}}</a>
                  @endforeach
                </div>
              </div>
            </div>
          </div>

          <div class="row row-space">
            <div class="col-md">
              <div class="input-group-sm">
                <input type="text" class="form-control col-sm-5 float-left" placeholder="1">
              </div>

              <div class="input-group-sm">
                <input type="text" class="form-control col-sm-5 float-right" placeholder="30">
              </div>
            </div>
          </div>

          <div class="row row-space">
            <div class="col-md text-center">
              <a class="btn btn-default btn-xs " href="">Anterior</a>
              <a class="btn btn-default btn-xs float-center" href="/financeiro">Atual</a>
              <a class="btn btn-default btn-xs " href="">Pŕoximo</a>
            </div>
          </div>

        </div>


      </div>
    </div>
  </div>



<div class="row">
    <div class="col-md-12">
        <table class=" table table-condensed no-padding table-striped table-bordered table-hover" id="tabelaprincipal">

            <tbody>
                <span class="invisible"> {{($i = 1)}} </span>
                <form method="post" action="financeiro/emitirpagamento" name="form-emitir" id="form-emitir">
                    @foreach($contas as $conta)
                    <tr class="point">
                        <td>
                            {{$i++}}
                        </td>
                        <td>
                            {{$conta->area}}
                        </td>
                        <td>
                            {{$conta->ccustos}}
                        </td>
                        <td >
                            {{$conta->tipo}}
                        </td>
                        <td>
        <!-- tipopagamento -->
                        </td>   
                        
                        <td>
                       {{$conta->favorecido}}
                        </td>
                        <td>
                            {{$conta->pagador}}
                        </td>
                        <td>
                            {{$conta->dia}}
                        </td>
                        <td>
                            {{number_format($conta->valor, 2, ',', '.')}}
                        </td>
                    </tr>
                    @endforeach
                </form>
            </tbody>
        </table>
    </div>
</div>

@endsection