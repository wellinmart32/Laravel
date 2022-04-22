@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nuevo producto
                    <a href="/products" class="btn btn-primary btn-sm">Volver a productos</a>

                </div>

                <div class="panel-body">
                    @if ( session('message') )
                    <div class="alert alert-success">{{ session('message') }}</div>
                    @elseif ( session('error') )
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="/products">
                        {{ csrf_field() }}

                        <input id="code" type="text" name="code" placeholder="Código" class="form-control mb-2" onkeyup="javascript:this.value=this.value.toUpperCase();" required />

                        <input id="description" type="text" name="description" placeholder="Descripción" class="form-control mb-2" onkeyup="javascript:this.value=this.value.toUpperCase();" required />

                        <input id="value" type="number" step="0.01" name="value" placeholder="Valor" class="form-control mb-2" required />

                        <input id="stock" type="number" step="0.01" name="stock" placeholder="En almacén" class="form-control mb-2" required />

                        <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection