@extends('layouts.app')

@section('content')

    <button>
        <a href="{{ route('userApartments.edit', $apt) }}">Modifica</a>
    </button>

    {{ $apt->title }}
    {{ $apt->summary }}
    <div>
        Il numero di visitatori è: {{ $visitorsNumber }}
    </div>


    {{-- <!--
        to get image you need to do 
         <img src"{{asset('storage/') . other code  }} -->  --}} 


@endsection