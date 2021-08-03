@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <div class="row">
                        Editar mascota
                        <a href="/pets" class="btn btn-primary btn-sm">Volver a mascotas</a>
                    </div>
                </div>

                <div class="panel-body">
                    @if ( session('mensaje') )
                        <div class="alert alert-success">{{ session('mensaje') }}</div>
                    @endif

                    <form method="POST" action="{{ action('PetController@update', $pet->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <input
                          type="text"
                          name="name"
                          placeholder="Nombre"
                          value="{{ $pet->name }}"
                          class="form-control mb-2"
                          required
                        />

                        <select 
                          name="specie_id"
                          class="form-control mb-2">
                          @foreach ($species as $specie)
                            @if ($pet->specie_id == $specie->id)
                                <option selected="yes" value="{{ $specie->id }}">{{ $specie->name }}</option>
                            @else
                                <option value="{{ $specie->id }}">{{ $specie->name }}</option>
                            @endif
                          @endforeach
                        </select>

                        <select 
                          name="sex"
                          class="form-control mb-2">
                          @if ($pet->sex == 'Masculino')
                                <option selected="yes" value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            @else
                                <option value="Masculino">Masculino</option>
                                <option selected="yes" value="Femenino">Femenino</option>
                            @endif  
                        </select>

                        <input
                          type="number"
                          name="age"
                          placeholder="Edad"
                          value="{{ $pet->age }}"
                          class="form-control mb-2"
                          required
                        />

                        <button class="btn btn-warning btn-block" type="submit">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection