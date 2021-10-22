@extends('layouts.app')

@section('content')
    <div class="dashboard-container container-fluid">
        
        <div class="dashboard-main-container">
            <div class="new-apt">
                <a href="{{ route('userApartments.create') }}"><button class="btn btn-primary">+</button></a>
            </div>
            <div class="container mb-5">
                <div class="row">
                    <div class="col-12">
                        <h2>Ecco la tua dashboard {{$user->first_name}}</h2>
                        <h4 class="">Qui sono raggruppate le tue proprietà.</h4>
                    </div>
                </div>
            </div>
                @if (count($aptByIdUser) === 0)
                    <div class="no-apt-cont row">
                        <div class="title-no-apt">Sembra che tu non abbia ancora nessuna proprietà su BoolBnb!</div>
                        <div class="link-no-apt">
                            <a href="{{route('userApartments.create')}}">Aggiungi subito la tua prima proprietà e diventa Host!</a>
                        </div>
                    </div>
                    
                @else
    
                <div class="dashboard-index">
                    <table class="index-container">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Indirizzo</th>
                                <th>Latitudine</th>
                                <th>Longitudine</th>
                                <th>Numero stanze</th>
                                <th>Numero letti</th>
                                <th>Numero bagni</th>
                                <th>Numero ospiti (max)</th>
                                <th>Metri quadrati</th>
                                <th>Prezzo ( € )</th>
                                <th>Visibilitá</th>
                                <th>Extra tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($aptByIdUser as $apt)
                                <tr>
                                    <th  id="index-id" scope="row">{{$apt->id}}</th>
                                    <td id="index-name">{{$apt->title}}</td>
                                    <td id="index-name">{{$apt->address}}</td>
                                    <td id="index-name">{{$apt->latitude}}</td>
                                    <td id="index-name">{{$apt->longitude}}</td>
                                    <td id="index-rooms">{{$apt->rooms_n}}</td>
                                    <td id="index-beds">{{$apt->beds_n}}</td>
                                    <td id="index-beds">{{$apt->bathrooms_n}}</td>
                                    <td id="index-beds">{{$apt->guests_n}}</td>
                                    <td id="index-beds">{{$apt->square_meters}}</td>
                                    <td id="index-beds">{{$apt->price}}</td>
                                    <td id="index-beds">{{$apt->visible}}</td>
                                    <td>
                                        <a href="{{ route('userApartments.show', $apt->id) }}">
                                            <div class="btn btn-primary">Visualizza</div>
                                        </a>
                                        <div class="btn btn-primary">
                                            <a href="{{ route('userApartments.edit', $apt->id) }}">Modifica</a>
                                        </div>
                                        <form action="{{ route('userApartments.destroy', $apt->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">Cancella</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
    </div>            
@endsection