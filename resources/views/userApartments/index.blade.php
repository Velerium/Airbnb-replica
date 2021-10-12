@extends('layouts.app')

@section('content')
    <div class="container">

        @if (count($aptByIdUser) === 0)
        
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
        @endif

    </div>


 
            
@endsection