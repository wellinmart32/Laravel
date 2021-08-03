@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <div class="row">
                        Ingresar usuarios
                        <a href="/permissions" class="btn btn-primary btn-sm">Volver a usuarios</a>
                    </div>
                </div>

                <div class="panel-body">
                    @if ( session('mensaje') )
                        <div class="alert alert-success">{{ session('mensaje') }}</div>
                    @endif

                    <form method="POST" action="/permissions">
                        {{ csrf_field() }}

                        <input
                          type="text"
                          name="name"
                          placeholder="Nombre"
                          class="form-control mb-2"
                          required
                        />

                        <input
                          type="text"
                          name="description"
                          placeholder="Descripción"
                          class="form-control mb-2"
                          required
                        />

                        <select 
                          name="view"
                          class="form-control mb-2">
                            <option selected="no" value="0">No</option> 
                            <option selected="yes" value="1">Si</option>  
                        </select>

                        <select 
                          name="create"
                          class="form-control mb-2">
                            <option selected="no" value="0">No</option> 
                            <option selected="yes" value="1">Si</option>  
                        </select>

                        <select 
                          name="edit"
                          class="form-control mb-2">
                            <option selected="no" value="0">No</option> 
                            <option selected="yes" value="1">Si</option>  
                        </select>

                        <select 
                          name="delete"
                          class="form-control mb-2">
                            <option selected="no" value="0">No</option> 
                            <option selected="yes" value="1">Si</option>  
                        </select>

                        <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection