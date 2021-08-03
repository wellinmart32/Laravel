@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <div class="row">
                        Ingresar mascota
                        <a href="/pets" class="btn btn-primary btn-sm">Volver a mascotas</a>
                    </div>
                </div>

                <div class="panel-body">
                    @if ( session('mensaje') )
                        <div class="alert alert-success">{{ session('mensaje') }}</div>
                    @endif

                    <form method="POST" action="/pets">
                        {{ csrf_field() }}

                        <input
                          type="text"
                          name="name"
                          placeholder="Nombre"
                          class="form-control mb-2"
                          required
                        />

                        <select 
                          name="specie_id"
                          class="form-control mb-2">
                          @foreach ($species as $specie)
                            @if (1 == $specie->id)
                                <option selected="yes" value="{{ $specie->id }}">{{ $specie->name }}</option>
                            @else
                                <option value="{{ $specie->id }}">{{ $specie->name }}</option>
                            @endif
                          @endforeach
                        </select>

                        <select 
                          name="sex"
                          class="form-control mb-2">
                            <option selected="yes" value="Masculino">Masculino</option> 
                            <option value="Femenino">Femenino</option>  
                        </select>

                        <input
                          type="number"
                          name="age"
                          min="0"
                          max="40"
                          placeholder="Edad"
                          class="form-control mb-2"
                          required
                        />

                        <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection