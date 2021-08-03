@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Reporte de mascotas

                    <a href="/pets" class="btn btn-primary btn-sm">Volver a mascotas</a>
                </div>

                <div class="panel-body">
                    @if ( session('mensaje') )
                        <div class="alert alert-success">{{ session('mensaje') }}</div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ action('PetController@search') }}">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        <div class="row">
                            <div class="col-md-4">
                                <p>Fecha inicio</p>
                                <input type="date"
                                    name="st_dt"
                                    min="2019-12-31"
                                    value="2019-12-31"
                                    class="form-control mb-2"
                                />

                                <p>Fecha fin</p>
                                <input type="date"
                                    name="fn_dt"
                                    min="2020-01-01"
                                    value="{{ date('Y-m-d') }}"
                                    class="form-control mb-2"
                                />
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