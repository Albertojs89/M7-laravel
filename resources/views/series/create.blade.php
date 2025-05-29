@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nova sèrie</h1>
    <form action="{{ route('series.store', [], true) }}" method="POST">
        @csrf
        @include('series.form')
        <button type="submit" class="btn btn-success">Desa</button>
    </form>
</div>
@endsection
