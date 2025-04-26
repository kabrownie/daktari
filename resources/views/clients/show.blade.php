@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Client Profile: {{ $client->client_name }}</h1>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Client Details</h5>
            <p><strong>Client ID:</strong> CL-{{ $client->clients_id }}</p>
            <p><strong>Sex:</strong> {{ $client->sex }}</p>
            <p><strong>Age:</strong> {{ $client->age }} years</p>
            <p><strong>Telephone:</strong> {{ $client->telephone }}</p>
        </div>
    </div>

    <h3>Enrolled Programs</h3>

    @if ($client->programs->count() > 0)
        <ul class="list-group mb-4">
            @foreach ($client->programs as $program)
                <li class="list-group-item">{{ $program->program_name }}</li>
            @endforeach
        </ul>
    @else
        <p>This client is not enrolled in any programs.</p>
    @endif

    <a href="/clients" class="btn btn-secondary">Back to Clients</a>
</div>
@endsection
