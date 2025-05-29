@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $series->title }}</h1>
    <p><strong>Descripció:</strong> {{ $series->description }}</p>
    <p><strong>Portal:</strong> {{ $series->portal }}</p>
    <a href="{{ route('series.index') }}" class="btn btn-secondary">Tornar</a>
    <a href="{{ route('series.edit', $series) }}" class="btn btn-primary">Edita</a>
</div>
@endsection
