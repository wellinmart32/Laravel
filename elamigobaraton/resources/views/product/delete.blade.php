@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          Eliminar producto

          <a href="/products" class="btn btn-primary btn-sm">Volver a productos</a>
        </div>

        <div class="panel-body">
          @if ( session('message') )
          <div class="alert alert-success">{{ session('message') }}</div>
          @endif

          <form method="POST" action="{{ action('ProductController@destroy', $product->id) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <input id="code" type="text" name="code" placeholder="Código" value="{{ $product->code }}" class="form-control mb-2" disabled="disabled" />

            <input id="description" type="text" name="description" placeholder="Descripcion" value="{{ $product->description }}" class="form-control mb-2" disabled="disabled" />

            <input id="value" type="number" name="value" placeholder="Valor" value="{{ $product->value }}" class="form-control mb-2" disabled="disabled" />

            <input id="stock" type="number" name="stock" placeholder="En almacén" value="{{ $product->stock }}" class="form-control mb-2" disabled="disabled" />

            <button class="btn btn-danger btn-block" type="submit">Eliminar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection