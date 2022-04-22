@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          Eliminar Venta

          <a href="/sales" class="btn btn-primary btn-sm">Volver a ventas</a>
        </div>

        <div class="panel-body">
          @if ( session('message') )
          <div class="alert alert-success">{{ session('message') }}</div>
          @endif

          <form method="POST" action="{{ action('SaleController@destroy', $sale->id) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <input id="code" type="text" name="code" placeholder="Código" value="{{ $productSelected->code }}" class="form-control mb-2" disabled="disabled" />

            <input id="description" type="text" name="description" placeholder="Descripcion" value="{{ $productSelected->description }}" class="form-control mb-2" disabled="disabled" />

            <input id="weight" type="number" name="weight" placeholder="Peso" value="{{ $sale->weight }}" class="form-control mb-2" disabled="disabled" />

            <input id="value" type="number" name="value" placeholder="Valor" value="{{ $sale->weight*$productSelected->value }}" class="form-control mb-2" disabled="disabled" />

            <button class="btn btn-danger btn-block" type="submit">Eliminar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection