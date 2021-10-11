@extends('layouts.app')

@section('content')
    @foreach ($allApt as $apt)
        <h1>{{ $apt->title }}</h1>
        <button>
            <a href="{{ route('allApartments.show', $apt) }}">Guarda i dettagli</a>
        </button>
    @endforeach
@endsection