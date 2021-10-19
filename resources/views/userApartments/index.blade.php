@extends('layouts.app')

@section('content')
    <div class="container">

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
                <button>
                    <a href="{{ route('userApartments.create') }}">Aggiungi un nuovo appartamento</a>
                </button>
                @foreach ($aptByIdUser as $apt)
                <h4>Titolo: {{$apt->title}}</h4>
                <button>
                    <a href="{{ route('userApartments.show', $apt->id) }}">Dettagli appartamento</a>
                </button>
                @endforeach
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

        {{-- @if (count($aptByIdUser) === 0)
        
            <div>
                Non hai nessun appartmento.
            </div>
        
            <button>
                <a href="{{ route('userApartments.create') }}">Aggiungi un nuovo appartamento</a>
            </button>

        @else 

            @foreach ($aptByIdUser as $apt)
                <h4>Titolo: {{$apt->title}}</h4>
                <button>
                    <a href="{{ route('userApartments.show', $apt->id) }}">Dettagli appartamento</a>
                </button>
            @endforeach
        
            <div>
                <button>
                    <a href="{{ route('userApartments.create') }}">Aggiungi un nuovo appartamento</a>
                </button>
            </div>
        @endif --}}
    </div>            
@endsection