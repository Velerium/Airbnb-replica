@extends('layouts.app')

@section('content')
    <div class="dashboard-main-container">
        <div class="container">
            <h1>Dashboard</h1>
            <p>{{$user->first_name}} {{$user->last_name}}</p>

            @if (count($aptByIdUser) === 0)
                <div class="no-apt-cont row">
                    <div class="title-no-apt">Sembra che tu non abbia ancora nessuna proprietà su BoolBnb!</div>
                    <div class="link-no-apt">
                        <a href="{{route('userApartments.create')}}">Aggiungi subito la tua prima proprietà e diventa Host!</a>
                    </div>
                </div>
            @else

            <h4 class="mt-5">Le tue proprietà</h4>
            <span class="link-all"><a href="{{ route('userApartments.index') }}">Guarda tutte le proprietà</a></span>
            <div class="row">
                <div class="col-3">
                    <div class="box-apartment">
                        <div class="img-box-apt">
                            <img src="{{asset('image/pfp.jpg')}}" alt="">
                        </div>
                        @foreach ($aptByIdUser as $apt)
                            <div class="info-box-apt">
                                <h4>{{$apt->title}}</h4>
                                <div>{{$apt->price}}€/notte</div>
                            </div>
                        @endforeach
                    </div>
                </div>

            @endif
            </div>

        </div>

    </div>
@endsection