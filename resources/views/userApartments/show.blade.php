@extends('layouts.app')

@section('content')

    <div class="show-container">
        <div class="show-box container">
            <div class="row">
                <div class="col-12">
                    <button>
                        <a href="{{ route('userApartments.edit', $apt) }}">Modifica</a>
                    </button>
                    <div>
                        <h4>{{ $apt->title }}</h4>
                    </div>
                    <div>
                        <span>{{$apt->address}}</span>
                    </div>
                </div>
            </div>
            <div class="show-gallery row my-5">
                <div class="col-6">
                    <div class="show-thumbnail">
                    </div>
                </div>
                <div class="col-6">
                    <div class="side-pics"></div>
                    <div class="side-pics"></div>
                    <div class="side-pics"></div>
                    <div class="side-pics"></div>
                </div>
            </div>
            <div class="show-insights row">
                <div class="col-6">
                    <h2>Le statistiche del tuo appartamento</h2>
                    <button><a href="{{ route('statistics', $apt->id) }}">Vai</a></button>
                </div>
            </div>
            <div class="bio row my-5">
                <div class="bio-left col-8">
                <div>Descrizione: {{$apt->summary}}</div>
                </div>
                <div class="bio-right col-4">
                    <div>
                        <ul>
                            <li class="price"><span>€{{$apt->price}} / notte</span></li>
                            <li><span>Numero di ospiti: {{$apt->guests_n}}</span></li>
                            <li><span>Numero di stanze: {{$apt->rooms_n}}</span></li>
                            <li><span>Numero di letti: {{$apt->beds_n}}</span></li>
                            <li><span>Numero di bagni: {{$apt->bathrooms_n}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="show-services row my-5">
                <div class="services-box col-6">
                    <span>Servizi inclusi</span>
                    <ul>
                        @foreach ($apt->service as $service)
                            <li>{{$service->service_name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-12 mb-3">
                    @if ($sponsored == null)
                    <h2>Non hai nessuna sponsorizzazione su questo appartamento! Sponsorizzalo ora per metterlo in evidenza!</h2>
                    @else
                        <div>
                            @foreach ($apt->sponsorship as $thisAptSponsorship)
                                <h2>L'appartamento ha la sponsorizzazione {{ $thisAptSponsorship->type }}.</h2>
                                <div>Scadenza sponsorizzazione: il {{$sponsored->format('d-M-Y')}} alle ore {{$sponsored->format('H:m')}}</div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="show-sponsor row">
                @foreach ($sponsorships as $sponsorship)
                    <div class="bla col-4">
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
                    </div>
                @endforeach  
            </div>
        </div>
    </div>

@endsection

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
                    <h2>L'appartamento ha la sponsorizzazione {{ $thisAptSponsorship->type }}.</h2>
                    <div>Scadenza sponsorizzazione: il {{$sponsored->format('d-M-Y')}} alle ore {{$sponsored->format('H:m')}}</div>
                @endforeach
            </div>
        @endif

<!-- 
    
        @foreach ($images as $image)
            <img src="{{ asset('storage/'. $image->url) }}" alt="Immagine di {{ $apt->title }}"> 
        @endforeach -->
