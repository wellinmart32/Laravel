@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span>Editar producto</span>
                    <a href="/product" class="btn btn-primary btn-sm">Volver a lista de productos...</a>
                </div>
                <div class="panel-body">
                  @if ( session('mensaje') )
                    <div class="alert alert-success">{{ session('mensaje') }}</div>
                  @endif
                  <form action="{{ action('ProductController@update', $product->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input
                      type="text"
                      name="code"
                      placeholder="Código"
                      value="{{$product->code}}"
                      class="form-control mb-2"
                      required autofocus>
                    <input
                      type="text"
                      name="name"
                      placeholder="Nombre"
                      value="{{$product->name}}"
                      class="form-control mb-2"
                      required>
                    <input
                      type="text"
                      name="description"
                      placeholder="Descripción"
                      value="{{$product->description}}"
                      class="form-control mb-2"
                      required>
                    <input
                      type="text"
                      name="weight"
                      placeholder="Peso"
                      value="{{$product->weight}}"
                      class="form-control mb-2"
                      required>
                    <input
                      type="text"
                      name="state"
                      placeholder="Estado"
                      value="{{$product->state}}"
                      class="form-control mb-2"
                      required>
                    <button class="btn btn-warning btn-block" type="submit">Editar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection