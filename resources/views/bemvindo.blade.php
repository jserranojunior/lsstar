@extends('layouts.header')
@section('content')


<div class="row">
        <div class="col-md-12"><h1  class="bemvindo">Seja bem vindo!</h1>
             <h4 class="text-center">Fique a vontade para testar as novas atualizações!</h4>
        </div>
</div>
<div class="row">
    <a href="{{Route('financeiro.index')}}">
        <div class="col-sm-3">
            <div class="box box-primary">
                <div class="box-header with-border text-center">
                    FINANCEIRO
                </div>
                <div class="box-body">
                    <img class="img-responsive" src="{{URL::asset('/img/usuarios')}}/financeiro-foto.jpg">
                </div>    
            </div>
        </div>    
    </a>
    <a href="{{Route('cliente.index')}}">
        <div class="col-sm-3">
            <div class="box box-primary">
                <div class="box-header with-border text-center">
                    CLIENTES
                </div>
                <div class="box-body">
                    <img class="img-responsive" src="{{URL::asset('/img/home')}}/clientes.jpg">
                </div>    
            </div>
        </div>
    </a>
    <a href="{{Route('agenda.index')}}">
        <div class="col-sm-3">
            <div class="box box-primary">
                <div class="box-header with-border text-center">
                    AGENDA
                </div>
                <div class="box-body">
                    <img class="img-responsive" src="{{URL::asset('/img/home')}}/agendamento.jpg">
                </div>    
            </div>
        </div>
    </a>

    <a href="{{Route('fornecedor.index')}}">
        <div class="col-sm-3">
            <div class="box box-primary">
                <div class="box-header with-border text-center">
                    FORNECEDOR
                </div>
                <div class="box-body">
                    <img class="img-responsive" src="{{URL::asset('/img/home')}}/fornecedor.jpg">
                </div>    
            </div>
        </div>
    </a>
</div>    
@endsection