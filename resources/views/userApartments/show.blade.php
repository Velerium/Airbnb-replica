@extends('layouts.app')

@section('content')

    <button>
        <a href="{{ route('userApartments.edit', $apt) }}">Modifica</a>
    </button>

    {{-- TODO: Modal pop up 'Are you sure you want to delete this apartment?' --}}
    <form action="{{ route('userApartments.destroy', $apt) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger">Elimina appartamento</button>
    </form>

    {{ $apt->title }}
    {{ $apt->summary }}
    <div>
        Il numero di visitatori è: {{ $visitorsNumber }}
    </div>

@endsection