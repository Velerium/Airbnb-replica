@extends('layouts.app')

@section('content')

    <button>
        <a href="{{ route('userApartments.edit', $apt) }}">Modifica</a>
    </button>

    {{ $apt->title }}
    {{ $apt->summary }}
    <div>
        Il numero di visitatori è: {{ $visitorsNumber }}
    </div>

@endsection