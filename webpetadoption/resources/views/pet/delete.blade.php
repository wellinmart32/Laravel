@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <div class="row">
                        Eliminar mascota
                        <a href="/pets" class="btn btn-primary btn-sm">Volver a mascotas</a>
                    </div>
                </div>

                <div class="panel-body">
                    @if ( session('mensaje') )
                        <div class="alert alert-success">{{ session('mensaje') }}</div>
                    @endif

                    <form method="POST" action="{{ action('PetController@destroy', $pet->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <input
                          type="text"
                          name="name"
                          placeholder="Nombre"
                          value="{{ $pet->name }}"
                          class="form-control mb-2"
                          disabled="disabled"
                        />

                        <select 
                          name="specie_id"
                          class="form-control mb-2"
                          disabled="disabled">
                          @foreach ($species as $specie)
                            @if ($pet->specie_id == $specie->id)
                                <option selected="yes" value="{{ $specie->id }}">{{ $specie->name }}</option>
                            @else
                                <option value="{{ $specie->id }}">{{ $specie->name }}</option>
                            @endif
                          @endforeach
                        </select>

                        <input
                          type="text"
                          name="sex"
                          placeholder="Sexo"
                          value="{{ $pet->sex }}"
                          class="form-control mb-2"
                          disabled="disabled"
                        />

                        <input
                          type="text"
                          name="age"
                          placeholder="Edad"
                          value="{{ $pet->age }}"
                          class="form-control mb-2"
                          disabled="disabled"
                        />

                        <button class="btn btn-danger btn-block" type="submit">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection