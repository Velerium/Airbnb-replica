@extends('layouts.app')

@section('content')

    <button>
        <a href="{{ route('userApartments.edit', $apt) }}">Modifica</a>
    </button>

    {{-- TODO: Modal pop up 'Are you sure you want to delete this apartment?' --}}
    <form action="{{ route('userApartments.destroy', $apt->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger">Elimina appartamento</button>
    </form>

    <h2>
        {{ $apt->title }}

    </h2>
    {{ $apt->summary }}
    <div>
        Il numero di visitatori è: {{ $visitorsNumber }}
    </div>

    @foreach ($apt->service as $service)
        <span>{{ $service->service_name }} </span>
    @endforeach 

    {{-- <!--
        to get image you need to do 
         <img src"{{asset('storage/') . other code  }} -->  --}} 

@endsection