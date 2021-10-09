@extends('layouts.app')

@section('content')
    {{$apartment->summary}}
    <div>
        Il numero di visitatori è: {{ $visitorsNumber }}
    </div>
@endsection