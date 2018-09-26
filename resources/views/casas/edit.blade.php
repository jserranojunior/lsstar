@extends('layouts.header')
@section('content')


<div class="col-xs-10 col-xs-offset-1">
        @foreach($casa as $item)
    <div class="box box-info">
        <div class="box-head">
            <h3 class="text-center"> Editar Casa {{$item->id}}</h3>
        </div>

        <div class="box-body ">
            Nome<br>
            Numero<br>
            Endereço  <br>          
        </div>
    </div>
        @endforeach
</div>

@endsection