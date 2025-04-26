@extends('layouts.app')

@section('content')
<h1>Manage Health Programs</h1>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="POST" action="/programs" class="mb-4">
    @csrf
    <div class="input-group">
        <input type="text" name="program_name" class="form-control" placeholder="Program Name" required>
        <button type="submit" class="btn btn-primary">Create Program</button>
    </div>
</form>

<h3>All Programs</h3>
<ul class="list-group">
@foreach ($programs as $program)
    <li class="list-group-item">{{ $program->program_name }}</li>
@endforeach
</ul>
@endsection
