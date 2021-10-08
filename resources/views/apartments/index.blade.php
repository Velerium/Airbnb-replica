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
                <a href="{{ route('apartments.show', $apt->id) }}">Dettagli appartamento</a>
            </button>

        @endforeach
    @endif
            
@endsection