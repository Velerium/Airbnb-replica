@extends('layouts.app')

@section('allUserApt')
    @if (count($aptByIdUser) === 0)
        Non hai nessun appartmento.
        {{-- To do --}}
        <a href="#">Clicca qui per inserire un nuovo appartmento</a>

    @else 
        @foreach ($aptByIdUser as $apt)
            <h4>Titolo: {{$apt->title}}</h4>

        @endforeach
    @endif
            
@endsection