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
@endsection