@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de ventas

                    <a href="/sales" class="btn btn-primary btn-sm">Volver a ventas</a>
                    <a href="{{ action('SaleController@filter') }}" class="btn btn-primary btn-sm">Filtrar</a>

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
                                    <th scope="col">Peso</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Fecha de creación</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($sales as $sale)
                                <tr>
                                        @foreach ($products as $product)
                                    @if ($sale->product_id == $product->id)
                                    <td>{{ $product->code }}</td>
                                    <td>{{ $product->description }}</td>
                                    @endif
                                    @endforeach
                                    <td>{{ $sale->weight }}</td>
                                    @foreach ($products as $product)
                                    @if ($sale->product_id == $product->id)
                                    <td>{{ $sale->weight*$product->value }}</td>
                                    @endif
                                    @endforeach
                                    <td>{{ $sale->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>

                <div class="panel-footer">
                    <h2>Valor total: ${{ $sum }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection