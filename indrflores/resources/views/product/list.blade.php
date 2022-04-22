@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de productos

                    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">Crear</a>
                    <a href="{{ action('ProductController@filter') }}" class="btn btn-primary btn-sm">Filtrar</a>
                    <a href="{{ route('sales.index') }}" class="btn btn-primary btn-sm">Ir a ventas</a>

                    @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">

                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if(\Session::has('exitoso'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('exitoso') }}</p>
                        </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Código</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">En almacén</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $item)
                                <tr>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->value }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td>
                                        <a href="{{ route('products.edit', $item) }}" class="btn btn-warning btn-sm">Editar</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('products.show', $item->id) }}" class="btn btn-danger btn-sm">Eliminar</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection