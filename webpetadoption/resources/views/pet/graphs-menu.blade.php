@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tablero</div>

                <div class="panel-body">
                @foreach ($species as $specie)
                    <a href="{{ route($specie->access_url) }}" class="btn btn-primary btn-block">Gráfico de {{ $specie->name }}</a>
                @endforeach

                <a href="{{ route('petsGraph') }}" class="btn btn-primary btn-block">Gráficos de todas las mascotas</a>

                <a href="{{ url('home') }}" class="btn btn-primary btn-block">Tablero principal</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection