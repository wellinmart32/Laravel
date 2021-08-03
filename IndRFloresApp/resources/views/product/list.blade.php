@extends('layouts.app')

 @section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span>Lista de productos</span>
                    <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm">Nuevo producto</a>
                </div>
                <div class="panel-body">
                <form class="form-horizontal">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
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
                            <th scope="col">id</th>
                            <th scope="col">Código</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Peso</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->weight }}</td>
                                <td>{{ $item->state }}</td>
                                <td>
                                <a href="{{ route('product.edit', $item) }}" class="btn btn-warning btn-sm">Editar</a>
                                </td>
                                <td>
                                <form action="{{ action('ProductController@destroy', $item->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </td>
                                </form>
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