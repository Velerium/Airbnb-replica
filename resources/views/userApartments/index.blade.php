@extends('layouts.app')

@section('content')

    @if (count($aptByIdUser) === 0)

        <div>
            Non hai nessun appartmento.
        </div>

        <button>
            <a href="{{ route('userApartments.create') }}">Aggiungi un nuovo appartamento</a>
        </button>
    @else 
        @foreach ($aptByIdUser as $apt)
        {{-- @dd($aptByIdUser) --}}
            <h4>Titolo: {{$apt->title}}</h4>
            <button>
                <a href="{{ route('userApartments.show', $apt->id) }}">Dettagli appartamento</a>
            </button>
            {{-- <button>
                <a href="{{ route('userApartments.edit', $apartment) }}">Modifica</a>
            </button> --}}
        @endforeach

        <div>
            <button>
                <a href="{{ route('userApartments.create') }}">Aggiungi un nuovo appartamento</a>
            </button>
        </div>
    @endif

 
            
@endsection