@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1>Welcome to the Health Information System</h1>
    <p class="lead mt-3">
        Manage your clients and health programs with ease.
    </p>

    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Clients</h5>
                    <p class="card-text">Register clients, enroll them in programs, and manage their profiles.</p>
                    <a href="/clients" class="btn btn-success">Manage Clients</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-4 mt-md-0">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Health Programs</h5>
                    <p class="card-text">Create and manage health programs like TB, Malaria, HIV, etc.</p>
                    <a href="/programs" class="btn btn-primary">Manage Programs</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
