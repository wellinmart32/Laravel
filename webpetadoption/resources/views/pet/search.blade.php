@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Reporte de mascotas

                    <a href="/pets" class="btn btn-primary btn-sm">Volver a mascotas</a>
                    <a href="{{ action('PetController@filter') }}" class="btn btn-primary btn-sm">Filtrar</a>

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
                                    <th scope="col">Raza</th>
                                    <th scope="col">Sexo</th>
                                    <th scope="col">Edad</th>
                                    <th scope="col">Fecha de creación</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($pets as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->race }}</td>
                                        <td>{{ $item->sex }}</td>
                                        <td>{{ $item->age }}</td>
                                        <td>{{ $item->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>

                <div class="panel-footer">
                    <h2>Total de mascotas: {{ $sum }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection