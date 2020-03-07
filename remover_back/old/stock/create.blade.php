@extends('layouts.header')
@section('content')

        <form method="post" action="{{Route('stock.store')}}" >
        <div class="col-xs-12">
            <div class="box">
                <h5 class="text-center">Informações de entrada</h5>

                <div class="box-body">
                    <div class="form-group">
                        <label for="tag">Patrimônio</label>
                        <input class="form-control" type="number" id="tag" name="tag">
                        
                     <div class="form-group">
                        <label for="category">Categoria</label>
                        <select class="form-control" id="category" name="category">
                            @foreach($categorys as $category)
                            <option value="{{$category->id}}">{{$category->category}}</option>
                            @endforeach
                        </select>
                    </div>
                        
                        <div class="form-group">    
                        <label for="product">Quantidade</label>
                     <input class="form-control" value="1" type="number"   id="amount" name="amount">
                    </div>
                        
                    <div class="form-group">
                        <label for="product">Produto</label>
                        <input class="form-control" type="text" id="product" name="product">
                    </div>
                        
                        
                   
                    <div class="form-group">
                        <label for="inputNf">Nota fiscal</label>
                        <input class="form-control" type="text" id="inputNf" name="inputNf">
                    </div>
                    <div class="form-group">
                        <label for="numberSeries">Número de série</label>
                        <input class="form-control" type="text" id="numberSeries" name="numberSeries">
                    </div>
                    <div class="form-group">
                        <label for="value">Valor</label>
                        <input class="form-control" type="text" name="value" id="value">
                    </div>
                    <div class="form-group">
                        <label for="purchaseDate">Data de compra</label>
                        <input type="date" class="form-control" name="purchaseDate" id="purchaseDate">
                    </div>
                    <div class="form-group">
                        <label for="entryDate">Data de entrada</label>
                        <input class="form-control" name="entryDate" type="date" id="entryDate">
                    </div>
                    
                    
                    <h5 class="text-center text-primary point" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Informações de saída <span class="glyphicon glyphicon-chevron-down"></span>
</h5>
                    <div class="collapse " id="collapseExample">
                    <div class="form-group">
                        <label for="exitNf">NF de saída</label>
                        <input class="form-control" type="text" id="exitNf" name="exitNf">
                    </div>
                    <div class="form-group">
                        <label for="exitDate">Data de saída</label>
                        <input type="date" class="form-control" id="exitDate" name="exitDate">
                    </div>
                    <div class="form-group">
                        <label for="exitValue">Valor de saída </label>
                        <input type="text" class="form-control" id="exitValue" name="exitValue">
                    </div>
                    </div>
                    
                    <h5 class="text-center point text-primary" data-toggle="collapse" data-target="#infoDestaque" aria-expanded="false" aria-controls="collapseExample">
                        Informações de Descarte <span class="glyphicon glyphicon-chevron-down"></span>
</h5>
                    
                    <div class="collapse" id="infoDestaque">
                    <div class="form-group">
                        <label for="discardDate">Data de descarte</label>
                        <input type="date" class="form-control" id="discardDate" name="discardDate">
                    </div>
                    <div class="form-group">
                        <label for="reason">Motivo do descarte</label>
                        <input type="text" class=form-control name="reason" id="reason">
                    </div>
                    </div>
                        <input type="submit" class="btn btn-primary" value="ENVIAR">
            
                    
                </div>
            </div>
        </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
   
@endsection
