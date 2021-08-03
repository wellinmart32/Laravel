@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <div class="row">
                        Editar permiso
                        <a href="/permissions" class="btn btn-primary btn-sm">Volver a permisos</a>
                    </div>
                </div>

                <div class="panel-body">
                    @if ( session('mensaje') )
                        <div class="alert alert-success">{{ session('mensaje') }}</div>
                    @endif

                    <form method="POST" action="{{ action('PermissionController@update', $permission->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <input
                          type="text"
                          name="name"
                          placeholder="Nombre"
                          value="{{ $permission->name }}"
                          class="form-control mb-2"
                          required
                        />

                        <input
                          type="text"
                          name="description"
                          placeholder="Descripción"
                          value="{{ $permission->description }}"
                          class="form-control mb-2"
                          required
                        />

                        <select 
                          name="view"
                          class="form-control mb-2">
                            @if ($permission->view)
                              <option selected="yes" value="1">Si</option>
                              <option value="0">No</option>
                            @else
                              <option value="1">Si</option>
                              <option selected="yes" value="0">No</option>
                            @endif
                        </select>

                        <select 
                          name="create"
                          class="form-control mb-2">
                            @if ($permission->create)
                              <option selected="yes" value="1">Si</option>
                              <option value="0">No</option>
                            @else
                              <option value="1">Si</option>
                              <option selected="yes" value="0">No</option>
                            @endif
                        </select>

                        <select 
                          name="edit"
                          class="form-control mb-2">
                            @if ($permission->edit)
                              <option selected="yes" value="1">Si</option>
                              <option value="0">No</option>
                            @else
                              <option value="1">Si</option>
                              <option selected="yes" value="0">No</option>
                            @endif
                        </select>

                        <select 
                          name="delete"
                          class="form-control mb-2">
                            @if ($permission->delete)
                              <option selected="yes" value="1">Si</option>
                              <option value="0">No</option>
                            @else
                              <option value="1">Si</option>
                              <option selected="yes" value="0">No</option>
                            @endif
                        </select>

                        <button class="btn btn-warning btn-block" type="submit">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection