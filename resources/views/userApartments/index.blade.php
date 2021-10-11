@extends('layouts.app')

@section('content')
    @if (count($aptByIdUser) === 0)
        Non hai nessun appartmento.
        {{-- To do --}}
        <a href="#">Clicca qui per inserire un nuovo appartmento</a>

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
    @endif

    <div>
        <button>
            <a href="{{ route('userApartments.create') }}">Aggiungi un nuovo appartamento</a>
        </button>
    </div>
            
@endsection