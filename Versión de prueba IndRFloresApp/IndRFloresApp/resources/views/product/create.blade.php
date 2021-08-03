@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span>Agregar producto</span>
                    <a href="/product" class="btn btn-primary btn-sm">Volver a lista de productos...</a>
                </div>
                <div class="panel-body">     
                  @if ( session('mensaje') )
                    <div class="alert alert-success">{{ session('mensaje') }}</div>
                  @endif
                  <form method="POST" action="/product">
                    {{ csrf_field() }}
                    <input
                      type="text"
                      name="code"
                      placeholder="Código"
                      class="form-control mb-2"
                    />
                    <input
                      type="text"
                      name="name"
                      placeholder="Nombre"
                      class="form-control mb-2"
                    />
                    <input
                      type="text"
                      name="description"
                      placeholder="Descripcion"
                      class="form-control mb-2"
                    />
                    <input
                      type="text"
                      name="weight"
                      placeholder="Peso"
                      class="form-control mb-2"
                    />
                    <input
                      type="text"
                      name="state"
                      placeholder="Estado"
                      class="form-control mb-2"
                    />
                    <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection