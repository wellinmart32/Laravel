@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de mascotas
                    <a href="{{ url('/pets/create') }}" class="btn btn-primary btn-sm">Crear</a>
                    <a href="{{ route('pet-filter') }}" class="btn btn-primary btn-sm">Generar reportes</a>

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
                                    <th scope="col">Especie</th>
                                    <th scope="col">Sexo</th>
                                    <th scope="col">Edad</th>
                                    <th scope="col">Fecha de adopción</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($pets as $pet)
                                    <tr>
                                        <th scope="row">{{ $pet->id }}</th>
                                        <td>{{ $pet->name }}</td>
                                        @foreach ($species as $specie)
                                            @if ($specie->id == $pet->specie_id)
                                                <td>{{ $specie->name }}</td>
                                            @endif
                                        @endforeach
                                        <td>{{ $pet->sex }}</td>
                                        <td>{{ $pet->age }}</td>
                                        <td>{{ $pet->created_at }}</td>
                                        <td>
                                            <a href="{{ route('edit-pet', $pet) }}" class="btn btn-warning btn-sm">Editar</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('show-pet', $pet->id) }}" class="btn btn-danger btn-sm">Eliminar</a>
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