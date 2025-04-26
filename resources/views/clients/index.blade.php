@extends('layouts.app')

@section('content')
<h1>Manage Clients</h1>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- Register New Client --}}
<form method="POST" action="/clients" class="mb-4">
    @csrf
    <div class="input-group">
        <input type="text" name="client_name" class="form-control" placeholder="Client Name" required>
        <button type="submit" class="btn btn-success">Register Client</button>
    </div>
</form>

{{-- Enroll Client into Program(s) --}}
<form method="POST" action="/clients/enroll" class="mb-4">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <select name="client_id" class="form-select" required>
                <option value="">Select Client</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <select name="program_ids[]" class="form-select" multiple required>
                @foreach($programs as $program)
                    <option value="{{ $program->id }}">{{ $program->program_name }}</option>
                @endforeach
            </select>
            <small class="form-text text-muted">Hold CTRL (Windows) or CMD (Mac) to select multiple.</small>
        </div>

        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Enroll Client</button>
        </div>
    </div>
</form>

{{-- Search Client --}}
<form method="GET" action="/clients/search" class="mb-4">
    <div class="input-group">
        <input type="text" name="query" class="form-control" placeholder="Search Clients">
        <button type="submit" class="btn btn-secondary">Search</button>
    </div>
</form>

{{-- List of Clients --}}
<h3>Registered Clients</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Client Name</th>
            <th>View Profile</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clients as $client)
            <tr>
                <td>{{ $client->client_name }}</td>
                <td><a href="/clients/{{ $client->id }}" class="btn btn-info btn-sm">View</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
