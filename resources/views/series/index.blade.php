@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Llista de sèries</h1>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Títol</th>
                <th>Descripció</th>
                <th>Portal</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($series as $serie)
                <tr>
                    <td>{{ $serie->title }}</td>
                    <td>{{ $serie->description }}</td>
                    <td>{{ $serie->portal }}</td>
                    <td>
                        <a href="{{ route('series.edit', $serie) }}" class="btn btn-sm btn-primary">Edita</a>
                        <form action="{{ route('series.destroy', $serie) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Segur que vols eliminar aquesta sèrie?')">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
