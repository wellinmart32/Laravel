@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          Nueva venta
          <a href="/sales" class="btn btn-primary btn-sm">Volver a ventas</a>

        </div>

        <div class="panel-body">
        @if ( session('message') )
          <div class="alert alert-success">{{ session('message') }}</div>
          @elseif ( session('error') )
          <div class="alert alert-danger">{{ session('error') }}</div>
          @endif

          <form method="POST" action="/sales">
            {{ csrf_field() }}

            <input id="product_id" name="product_id" type="hidden" />

            <div class="form-group">
              <select id="product" name="product" class="form-control">
                @foreach ($products as $product)
                  <option 
                    id={{ $product->id }} 
                    value={{ $product->id }}
                  >{{ $product->code }}</option>
                @endforeach
              </select>
            </div>

            <input id="description" type="text" name="description" 
            @foreach ($products as $product) 
              @if ($loop->first and $product != null)
                value="{{ $product->description }}"
                @else
                value=""
              @endif
            @endforeach
            placeholder="Descripción del código"
            class="form-control mb-2"
            readonly
            />

            <input id="weight" type="number" name="weight" step="0.01" placeholder="Ingrese el peso del producto" class="form-control mb-2" required />

            <input id="value" type="number" name="value" step="0.01" placeholder="Valor en dólares del producto" class="form-control mb-2" readonly />

            <input id="stock" type="number" name="stock"
            @foreach ($products as $product) 
              @if ($loop->first and $product != null)
                value="{{ $product->stock }}"
                @else
                value=""
              @endif
            @endforeach
            placeholder="En almacén" 
            class="form-control mb-2" 
            readonly 
            />

            <input type="datetime-local" name="sale_date" value="{{ date('Y-m-d\TH:i') }}" min="2020-01-01T00:00" class="form-control mb-2" readonly />

            <button id="submit" class="btn btn-primary btn-block" type="submit">Agregar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="{{ asset('js/dropdown.js') }}"></script>
  <script src="{{ asset('js/test.js') }}"></script>
  @endsection