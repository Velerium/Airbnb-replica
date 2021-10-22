@extends('layouts.app')

@section('content')
    <div class="slider-section py-5">
        <div class="container slider-container">
            <div class="row slider-top">
                <div class="col-12">
                    <div class="input-search">
                        <div>
                            <div>Dove</div>
                            <div>
                                <input type="text" placeholder="Dove vuoi andare?">
                            </div>
                        </div>
                        <div class="search-space"></div>
                        <div>
                            <div>Data Check-in</div>
                            <div>
                                <input type="date">
                            </div>
                        </div>
                        <div class="search-space"></div>
                        <div>
                            <div>Data Check-out</div>
                            <div>
                                <input type="date">
                            </div>
                        </div>
                        <div class="search-space"></div>
                        <div>
                            <div class="search-button pointer"><i class="fas fa-search"></i></div>
                        </div>
                    </div>
                    <div class="advanced-search">
                        <button>
                            <a href="{{ route('searchApartments.index') }}">Ricerca avanzata</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container recommended-section my-3 p-3">

        <h1 class="font-weight-bold">In Evidenza</h1>
        <div class="row recommended-bottom">
            @foreach ($allApt as $apt)
                @foreach ($apt->sponsorship as $sponsorship)
                    @if ($sponsorship->id !== null)
                        <div class="col-3 recommended-filters">
                            <a href="{{ route('searchApartments.show', $apt->id) }}">
                                <div class="recommended-filters-pfp">
                                    <img src="{{ asset($apt->cover) }}" alt="{{$apt->title}} copertina">
                                </div>
                                <div class="recommended-filters-details">
                                    <div class="font-weight-bold pointer">
                                        {{$apt->title}}
                                    </div>
                                    <div><i class="fas fa-map-marker-alt"></i> {{$apt->address}}</div>
                                    <div>{{$apt->price}}€</div>
                                </div>
                            </a>
                        </div>
                    @else
                        <h1>Ancora nessun appartamento in evidenza!</h1>
                    @endif
                @endforeach

            @endforeach
        </div>
    </div>

    <div class=" owner-section container p-5">
        <div class="row owner-details my-5">
            <div class="col-4 details-container">
                <h1 class="font-weight-bold">Prova ad ospitare</h1>
                <p class="mb-4">Condividi il tuo spazio per guadagnare qualcosa in più e cogliere nuove opportunitá.</p>
                <button>Scopri di più</button>
            </div>
        </div>
    </div>
@endsection