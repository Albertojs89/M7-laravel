@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edita sèrie</h1>
    <form action="{{ route('series.update', $series) }}" method="POST">
        @csrf
        @method('PUT')
        @include('series.form')
        <button type="submit" class="btn btn-primary">Actualitza</button>
    </form>
</div>
@endsection
