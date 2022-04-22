@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de productos

                    <a href="/products" class="btn btn-primary btn-sm">Volver a productos</a>
                    <a href="{{ action('ProductController@filter') }}" class="btn btn-primary btn-sm">Filtrar</a>

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
                                    <th scope="col">Valor</th>
                                    <th scope="col">Fecha de creación</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $item)
                                <tr>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->value }}</td>
                                    <td>{{ $item->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>

                <div class="panel-footer">
                    <h2>Total de productos: {{ $sum }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection