@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de usuarios
                    <a href="{{ url('/permissions/create') }}" class="btn btn-primary btn-sm">Crear</a>

                    @if (session('mensaje'))
                        <div class="alert alert-success">
                            {{ session('mensaje') }}
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
                                    <th scope="col">Id</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Ver</th>
                                    <th scope="col">Crear</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Eliminar</th>
                                    <th scope="col">Fecha de creación</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($permissions as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        @if ($item->view)
                                            <td>Si</td>
                                        @else
                                            <td>No</td>
                                        @endif
                                        
                                        @if ($item->create)
                                            <td>Si</td>
                                        @else
                                            <td>No</td>
                                        @endif
                                        
                                        @if ($item->edit)
                                            <td>Si</td>
                                        @else
                                            <td>No</td>
                                        @endif
                                        
                                        @if ($item->delete)
                                            <td>Si</td>
                                        @else
                                            <td>No</td>
                                        @endif
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ route('permissions.edit', $item) }}" class="btn btn-warning btn-sm">Editar</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('permissions.show', $item->id) }}" class="btn btn-danger btn-sm">Eliminar</a>
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