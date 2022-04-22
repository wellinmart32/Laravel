@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Búsqueda de productos

                    <a href="/products" class="btn btn-primary btn-sm">Volver a productos</a>
                </div>

                <div class="panel-body">
                    @if ( session('message') )
                    <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ action('ProductController@search') }}">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        <div class="row">
                            <div class="col-md-4">
                                <p>Fecha inicio</p>
                                <input type="datetime-local" name="st_dt" min="2020-01-01" value="2020-12-31T00:00" class="form-control mb-2" />

                                <p>Fecha fin</p>
                                <input type="datetime-local" name="fn_dt" min="2020-01-01" value="{{ date('Y-m-d\TH:i') }}" class="form-control mb-2" />
                            </div>
                        </div>

                        <br />

                        <button class="btn btn-primary btn-block" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection