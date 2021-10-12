@extends('layouts.app')

@section('content')

    <div class="container">

        <button>
            <a href="{{ route('userApartments.edit', $apt) }}">Modifica</a>
        </button>
    
        {{-- TODO: Modal pop up 'Are you sure you want to delete this apartment?' --}}
        <form action="{{ route('userApartments.destroy', $apt->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">Elimina appartamento</button>
        </form>
    
        <h2>Titolo: {{ $apt->title }}</h2>
        <div>Descrizione: {{ $apt->summary }}</div>
        <div>Il numero di visitatori è: {{ $visitorsNumber }}</div>

        <h4>Extra servizi: </h4>
        @foreach ($apt->service as $service)
            <li>{{ $service->service_name }}</li>
        @endforeach 
    
        @foreach ($apt->sponsorship as $sponsorship)
            {{-- @dd($apt->sponsorship) --}}
            <h4>Questo appartamento ha la sponsorizzazione: {{ strtoupper($sponsorship->type) }} - {{ $sponsorship->duration }}h</h4>
            {{ $apt->created_at }}
        @endforeach     
    
        {{-- <!--
            to get image you need to do 
             <img src"{{asset('storage/') . other code  }} -->  --}} 

    </div>


@endsection