@extends('layouts.app')

@section('content')

    <div class="statistics-container container">
        <div class="row">
            <h1>I numeri di visitatori mensili dell'appartamento {{ $apartment->title }}</h1>
            <h4>Il numero di visitatori è {{$visitorsNumber}}</h4>
        </div>
        <div class="statistics-content">
            <canvas id="statistics"></canvas>
        </div>
    </div>


@endsection