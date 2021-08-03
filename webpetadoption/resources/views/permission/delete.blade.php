@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <div class="row">
                        Eliminar usuario
                        <a href="/permissions" class="btn btn-primary btn-sm">Volver a usuarios</a>
                    </div>
                </div>

                <div class="panel-body">
                    @if ( session('mensaje') )
                        <div class="alert alert-success">{{ session('mensaje') }}</div>
                    @endif

                    <form method="POST" action="{{ action('PermissionController@destroy', $permissions->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <input
                          type="text"
                          name="name"
                          placeholder="Nombre"
                          value="{{ $permission->name }}"
                          class="form-control mb-2"
                          disabled="disabled"
                        />

                        <input
                          type="text"
                          name="description"
                          placeholder="Descripción"
                          value="{{ $permission->description }}"
                          class="form-control mb-2"
                          disabled="disabled"
                        />

                        <input
                          type="text"
                          name="view"
                          value="{{ $permission->view }}"
                          class="form-control mb-2"
                          disabled="disabled"
                        />

                        <input
                          type="text"
                          name="create"
                          value="{{ $permission->create }}"
                          class="form-control mb-2"
                          disabled="disabled"
                        />

                        <input
                          type="text"
                          name="edit"
                          value="{{ $permission->edit }}"
                          class="form-control mb-2"
                          disabled="disabled"
                        />

                        <input
                          type="text"
                          name="delete"
                          value="{{ $permission->delete }}"
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