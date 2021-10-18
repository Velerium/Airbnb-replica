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
    
        <h1>Titolo: {{ $apt->title }}</h1>
        <div>Descrizione: {{ $apt->summary }}</div>

        <h4>Extra servizi: </h4>
        @foreach ($apt->service as $service)
            <li>{{ $service->service_name }}</li>
        @endforeach 

        {{-- Statistics --}}
        <div class="">
            <h2>Le statistiche del tuo appartamento</h2>
            <button><a href="{{ route('statistics', $apt->id) }}">Vai</a></button>
        </div>
        {{-- End Statistics --}}
        
        {{-- SPONSORSHIPS --}}
        {{-- @dd($sponsored); --}}
        @if ($sponsored == null)
            <h2>Non hai nessuna sponsorizzazione su questo appartamento! Sponsorizzalo ora per metterlo in evidenza!</h2>
        @else
            <div>
            {{-- Metter appartamento sponsorizzato fino al... --}}
                @foreach ($apt->sponsorship as $thisAptSponsorship)
                {{-- @dd($thisAptSponsorship) --}}
                    <h2>L'appartamento ha la sponsorizzazione {{ $thisAptSponsorship->type }}</h2>
                @endforeach
            </div>
        @endif

        <div>
            @foreach ($sponsorships as $sponsorship)
                <form action="{{route('sponsorship')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h3>{{$sponsorship->type}}</h3>
                    <h3>€ {{$sponsorship->cost_sponsorship}}</h3>
                    <h5>Sponsorizza il tuo appartamento per {{$sponsorship->duration}} ore</h5>
                    <input type="hidden" name="apartment_id" value="{{$apt->id}}">
                    <input type="hidden" name="cost_sponsorship" value="{{$sponsorship->cost_sponsorship}}">
                    <input type="hidden" name="sponsorship_id" value="{{$sponsorship->id}}">
                    @csrf
                    @method('GET')
                    <input type="submit" class="btn btn-primary" value="Acquista">
                </form>
            @endforeach
        </div>    
        {{-- END SPONSORSHIPS --}}
    
        @foreach ($images as $image)
            <img src="{{ asset('storage/'. $image->url) }}" alt="Immagine di {{ $apt->title }}"> 
        @endforeach
    </div>


@endsection