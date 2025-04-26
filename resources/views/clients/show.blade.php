@extends('layouts.app')

@section('content')
<h1>Client Profile: {{ $client->client_name }}</h1>

<h3>Enrolled Programs</h3>

@if ($client->programs->count() > 0)
    <ul class="list-group">
        @foreach ($client->programs as $program)
            <li class="list-group-item">{{ $program->program_name }}</li>
        @endforeach
    </ul>
@else
    <p>This client is not enrolled in any programs.</p>
@endif

<a href="/clients" class="btn btn-secondary mt-3">Back to Clients</a>
@endsection
