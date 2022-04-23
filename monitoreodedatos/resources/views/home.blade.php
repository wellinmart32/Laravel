@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">Dashboard</div> -->

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Monitoreo de red de datos con SNMP</h2>
                    <br />
                    <br />
                    <img src="img1.png">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
