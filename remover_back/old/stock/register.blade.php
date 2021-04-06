@extends('layouts.header')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box">
                <div class="box-header">Estoque</div>

                <div class="box-body">
                    <div class="form-group">
                        <label for="tag">Etiqueta</label>
                        <input class="form-control" type="text" id="tag" name="tag">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
