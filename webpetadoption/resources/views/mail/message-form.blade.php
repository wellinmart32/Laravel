@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <div class="row">
                        Contáctenos
                        <a href="{{ url('home') }}" class="btn btn-primary btn-sm">Tablero principal</a>
                    </div>
                </div>

                <div class="panel-body">
                    @if ( session('mensaje') )
                        <div class="alert alert-success">{{ session('mensaje') }}</div>
                    @endif
 
                    <form method="GET" action="sendemail">
                        {{ csrf_field() }}

                        <input
                          type="text"
                          name="subject"
                          placeholder="Asunto"
                          class="form-control mb-2"
                          required
                        />

                        <input
                          type="text"
                          name="content"
                          placeholder="Contenido"
                          class="form-control mb-2"
                          required
                        />

                        <button class="btn btn-primary btn-block" type="submit">Eviar mensaje</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection