@extends('layouts.app')

@section('content')
    <div class="slider-section py-5">
        <div class="container slider-container">
            <div class="row slider-top">
                <div class="col-12">
                    <div class="input-search">
                        <input type="text">
                        <input type="date">
                        <input type="date">
                        <input type="number">
                    </div>
                </div>
            </div>
            <div class="row slider-bottom">
                <div class="col-12">
                
                </div>
            </div>
        </div>
    </div>

    <div class="container recommended-section my-3 p-3">
        <h1 class="font-weight-bold">Esplora i dintorni</h1>
        <div class="row recommended-top">
            <div class="col-3 recommended-city-card">
                <div class="recommended-city-pfp pointer">
                    <img src="{{asset('image/pfp.jpg')}}" alt="">
                </div>
                <div class="recommended-city-details pointer">
                    <div>
                        <h3>Roma</h3>
                        <p>$ ore di auto</p>
                    </div>
                </div>
            </div>
            <div class="col-3 recommended-city-card">
                <div class="recommended-city-pfp pointer">
                    <img src="{{asset('image/pfp.jpg')}}" alt="">
                </div>
                <div class="recommended-city-details pointer">
                    <div>
                        <h3>Roma</h3>
                        <p>$ ore di auto</p>
                    </div>
                </div>
            </div>
            <div class="col-3 recommended-city-card">
                <div class="recommended-city-pfp pointer">
                    <img src="{{asset('image/pfp.jpg')}}" alt="">
                </div>
                <div class="recommended-city-details pointer">
                    <div>
                        <h3>Roma</h3>
                        <p>$ ore di auto</p>
                    </div>
                </div>
            </div>
            <div class="col-3 recommended-city-card">
                <div class="recommended-city-pfp pointer">
                    <img src="{{asset('image/pfp.jpg')}}" alt="">
                </div>
                <div class="recommended-city-details pointer">
                    <div>
                        <h3>Roma</h3>
                        <p>$ ore di auto</p>
                    </div>
                </div>
            </div>
            <div class="col-3 recommended-city-card">
                <div class="recommended-city-pfp pointer">
                    <img src="{{asset('image/pfp.jpg')}}" alt="">
                </div>
                <div class="recommended-city-details pointer">
                    <div>
                        <h3>Roma</h3>
                        <p>$ ore di auto</p>
                    </div>
                </div>
            </div>
            <div class="col-3 recommended-city-card">
                <div class="recommended-city-pfp pointer">
                    <img src="{{asset('image/pfp.jpg')}}" alt="">
                </div>
                <div class="recommended-city-details pointer">
                    <div>
                        <h3>Roma</h3>
                        <p>$ ore di auto</p>
                    </div>
                </div>
            </div>
            <div class="col-3 recommended-city-card">
                <div class="recommended-city-pfp pointer">
                    <img src="{{asset('image/pfp.jpg')}}" alt="">
                </div>
                <div class="recommended-city-details pointer">
                    <div>
                        <h3>Roma</h3>
                        <p>$ ore di auto</p>
                    </div>
                </div>
            </div>
            <div class="col-3 recommended-city-card">
                <div class="recommended-city-pfp pointer">
                    <img src="{{asset('image/pfp.jpg')}}" alt="">
                </div>
                <div class="recommended-city-details pointer">
                    <div>
                        <h3>Roma</h3>
                        <p>$ ore di auto</p>
                    </div>
                </div>
            </div>
        </div>

        <h1 class="font-weight-bold">Una casa ovunque nel mondo</h1>
        <div class="row recommended-bottom">
            <div class="col-3 recommended-filters">
                <div class="recommended-filters-pfp pointer">
                    <img src="{{asset('image/puppy.jpg')}}" alt="">
                </div>
                <span class="font-weight-bold pointer">
                    [FILTER NAME]
                </span>
            </div>
            <div class="col-3 recommended-filters">
                <div class="recommended-filters-pfp pointer">
                    <img src="{{asset('image/puppy.jpg')}}" alt="">
                </div>
                <span class="font-weight-bold pointer">
                    [FILTER NAME]
                </span>
            </div>
            <div class="col-3 recommended-filters">
                <div class="recommended-filters-pfp pointer">
                    <img src="{{asset('image/puppy.jpg')}}" alt="">
                </div>
                <span class="font-weight-bold pointer">
                    [FILTER NAME]
                </span>
            </div>
            <div class="col-3 recommended-filters">
                <div class="recommended-filters-pfp pointer">
                    <img src="{{asset('image/puppy.jpg')}}" alt="">
                </div>
                <span class="font-weight-bold pointer">
                    [FILTER NAME]
                </span>
            </div>
        </div>
    </div>
    <div class="container owner-section p-5">
        <div class="row owner-details my-5">
            <div class="col-4 details-container">
                <h1 class="font-weight-bold">Prova ad ospitare</h1>
                <p class="mb-4">Condividi il tuo spazio per guadagnare qualcosa in più e cogliere nuove opportunitá.</p>
                <button>Scopri di più</button>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <ul>
                            <h6>INFORMAZIONI</h6>
                            <li>
                                <span>Come funziona Airbnb</span></li>
                            <li>
                                <span>Grazie agli host puoi</span></li>
                            <li>
                                <span>Airbnb 2021</span></li>
                            <li>
                                <span class="text-muted disabled">Airbnb Plus</span></li>
                            <li>
                                <span class="text-muted disabled">Airbnb Luxe</span></li>
                            <li>
                                <span>HotelTonight</span></li>
                            <li>
                                <span class="text-muted disabled">Airbnb for Work</span></li>
                            <li>
                                <span>Lettera dei fondatori</span></li>
                        </ul>
                    </div>
                    <div class="col-4">
                        <ul>
                            <h6>COMMUNITY</h6>
                            <li>
                                <span>Ospita i rifugiati afghani</span>
                            </li>
                            <li>
                                <span>Accessibilitá</span>
                            </li>
                            <li>
                                <span class="text-muted disabled">Airbnb.org</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-4">
                        <ul>
                            <h6>ASISTENZA</h6>
                            <li>
                                <span>La nostra risposta all'emergenza COVID-19</span></li>
                            <li>
                                <span class="text-muted disabled">Opzioni di cancellazione</span></li>
                            <li>
                                <span>Affidabilitá e sicurezza</span></li>
                            <li>
                                <span class="text-muted disabled">Centro Assistenza</span>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom container pt-3">
            <div class="row">
                <div class="col-6 ft-bottom-left">
                    <span>© 2021 Boolbnb, Inc.</span>
                    <ul>
                        <li>Privacy</li>
                        <li>Termini</li>
                        <li>Mappa del sito</li>
                        <li>Dettagli dell'azienda</li>
                    </ul>
                </div>
                <div class="col-6 ft-bottom-right">
                    <div class="footer-language">
                        <!-- <i></i> -->
                        <span>Italiano (IT)</span>
                    </div>
                    <div class="footer-currency">
                        <span>€</span>
                        <span>EUR</span>
                    </div>
                    <div class="footer-social">
                        <!-- <img src="" alt="">
                        <img src="" alt="">
                        <img src="" alt=""> -->
                        <div class="black-block"></div>
                        <div class="black-block"></div>
                        <div class="black-block"></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection








{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    {{ __('You are logged in!') }}
                    
                </div>
            </div>
        </div>
    </div>
</div> --}}
