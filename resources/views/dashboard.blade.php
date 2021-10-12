@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>
            Qui è la dashbord dell'utente {{$user->first_name}} {{$user->last_name}}
        </h2>
        {{-- @dd($user) --}}
    
        {{-- Link for redirect to create apartments --}}
        <button>
            <a href="{{route('userApartments.create')}}">Aggiungi un nuovo appartamento</a>
        </button>
    
        {{-- Link fot redirect to view all your apartemnts --}}
        <button>
            <a href="{{ route('userApartments.index') }}">Guarda tutti i tuoi appartamenti</a>
        </button>

    </div>
@endsection