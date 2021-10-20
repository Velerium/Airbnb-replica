@extends('layouts.app')

@section('content')

    <div class="show-container">
        <div class="show-box container">
            <div class="row">
                <div class="col-12">
                    <div>
                        <h4>{{ $apt->title }}</h4>
                    </div>
                    <div>
                        <span>{{$apt->address}}</span>
                    </div>
                </div>
            </div>
            <div class="show-gallery row my-4">
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
            <div class="bio row">
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
            <div class="show-services row my-4">
                <div class="services-left col-6">
                    <span>Servizi inclusi</span>
                    <ul>
                        @foreach ($apt->service as $service)
                            <li>{{$service->service_name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection