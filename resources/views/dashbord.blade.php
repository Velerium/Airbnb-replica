@extends('layouts.app')

@section('dashbord')
    Qui sarà la dashbord dell'utente {{$user->name}} {{$user->id}} ;
    {{-- @dd($user) --}}

    {{-- Link for redirect to create apartments --}}
    <link rel="stylesheet" href="">

    {{-- Link fot redirect to view all your apartemnts --}}
    <a href="{{ route('apartments.index') }}">Guarda tutti i tuoi appartamenti</a>
@endsection