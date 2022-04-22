@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          Actualizar venta

          <a href="/sales" class="btn btn-primary btn-sm">Volver a ventas</a>
        </div>

        <div class="panel-body">
          @if ( session('message') )
          <div class="alert alert-success">{{ session('message') }}</div>
          @endif

          <form method="POST" action="{{ action('SaleController@update', $sale->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <input id="product_id" name="product_id" type="hidden" />

            <div class="form-group">
              <select id="product" name="product" class="form-control">
                @foreach ($products as $product)
                  <option 
                    id={{ $product->id }} 
                    value={{ $product->id }}
                    @if ($sale->product_id == $product->id) 
                      selected="selected"
                    @endif
                  >{{ $product->code }}</option>
                @endforeach
              </select>
            </div>

            <input id="description" type="text" name="description" placeholder="Descripción" value="{{ $productSelected->description }}" class="form-control mb-2" readonly />

            <input id="weight" type="number" step="0.01" name="weight" placeholder="Peso" value="{{ $sale->weight }}" class="form-control mb-2" required />

            <input id="value" type="number" step="0.01" name="value" placeholder="Valor" value="{{ $sale->weight*$productSelected->value }}" class="form-control mb-2" readonly />

            <input id="stock" type="number" step="0.01" name="stock" placeholder="En almacén" value="{{ $productSelected->stock }}" class="form-control mb-2" readonly />

            <input type="date" name="sale_date" value="2022-02-07" min="2022-01-01" class="form-control mb-2" readonly />

            <button class="btn btn-warning btn-block" type="submit">Editar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="{{ asset('js/dropdown.js') }}"></script>
  <script src="{{ asset('js/test.js') }}"></script>
@endsection