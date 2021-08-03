@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tablero</div>

                <div class="panel-body">
                <a href="/pets" class="btn btn-primary btn-block">Página de adopciones</a>

                <a href="{{ route('pet-filter') }}" class="btn btn-primary btn-block">Generar reportes de mascotas</a>

                <a href="{{ route('graphsMenu') }}" class="btn btn-primary btn-block">Menu de reportes gráficos</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
