@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mt-4 mb-4">Aggiungi un nuovo appartamento</h2>

    <form action="{{ route('apartments.store')}}" method="POST">
        @csrf

        <label class="mt-2" for="title">Titolo</label>
        <input type="text" class="form-control"name="title" id="title">

        <label class="mt-2" for="description">Descrizione appartamento</label>
        <textarea type="text" class="form-control"name="description" id="description" rows="10"></textarea>
        
        <label class="mt-2" for="rooms_n">Numero di stanze</label>
        <input type="text" class="form-control"name="rooms_n" id="rooms_n">
        
        <label class="mt-2" for="beds_n">Numero di letti</label>
        <input type="text" class="form-control"name="beds_n" id="beds_n">

        <label class="mt-2" for="bathrooms_n">Numero di bagni</label>
        <input type="text" class="form-control" name="bathrooms_n" id="bathrooms_n">

        <label class="mt-2" for="guests_n">Numero di ospiti</label>
        <input type="text" class="form-control" name="guests_n" id="guests_n">

        <label class="mt-2" for="square_meters">Metri quadrati</label>
        <input type="text" class="form-control" name="square_meters" id="square_meters">

        <label class="mt-2" for="address">Indirizzo appartamento</label>
        <textarea type="text" class="form-control"name="address" id="address" rows="2"></textarea>

        <label class="mt-2" for="latitude">Latitudine</label>
        <input type="text" class="form-control" name="latitude" id="latitude">

        <label class="mt-2" for="longitude">Longitudine</label>
        <input type="text" class="form-control" name="longitude" id="longitude">

        <label class="mt-2" for="visible">Rendilo visibiole o no</label>
        <input type="text" class="form-control" name="visible" id="visible">

        <label class="mt-2" for="price">Prezzo a notte</label>
        <input type="text" class="form-control" name="price" id="price">

        {{-- <div class="mt-2">Servizi extra</div>
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text mt-2" for="service_id">Opzioni</label>
                </div>
                <select class="custom-select mt-2" id="service_id" name="service_id">
                    <option selected>Aggiungi i servizi extra</option>
                    @foreach($extraServices as $extraService)
                        <option value="{{$extraServices->id}}">{{ $extraServices->service_name }}</option>
                    @endforeach
                </select>
            </div>
        </div> --}}

        {{-- <div class="mt-3 mb-3">
            <label class="mt-2" for="image">Add image:</label>
            <input type="file" name="image" id="image">
        </div> --}}

        <button type="submit" class="btn btn-dark mt-3 mb-5" type="submit">Aggiungi appartamento</button>

    </form>

</div>
    
@endsection