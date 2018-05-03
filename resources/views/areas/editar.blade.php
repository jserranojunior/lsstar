@extends('layouts.header')
@section('content')



<div class="row">
    <div class="col-md-6 col-md-offset-3">
        @foreach($areas as $area)
        <div class="box">
            <div class="box-header text-center">
            <h4> {{$area->nome}} </h4>
            </div>
            <div class="box-body">
                <form action="" method="post" class="">
                    <label for="valor_inicial">Valor Inicial</label>
                    <input type="text" class="form-control" name="valor_inicial">

                    <label for="data_inicial">Data Inicio</label>
                    <input type="date" class="form-control" name="data_inicial">

                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" name="cep" id="cep">

                    <label for="logradouro">Logradouro</label>
                    <input type="text" class="form-control" name="logradouro" id="rua">

                    <label for="numero">Número</label>
                    <input type="text" class="form-control" name="numero" id="numero">

                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" name="bairro" id="bairro">

                    <label for="bairro">Cidade</label>
                    <input type="text" class="form-control" name="cidade" id="cidade">

                    <label for="uf">Estado</label>
                    <input type="text" class="form-control" name="uf" id="uf">

            </div>
                    <div class="box-footer text-right">
                    <input type="submit" class="btn" value="DESABILITADO">       
                    </div>

                   
                    



                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{$area->id}}">
                </form>
            </div>
        </div>
        @endforeach
       
    </div>
</div>

@endsection