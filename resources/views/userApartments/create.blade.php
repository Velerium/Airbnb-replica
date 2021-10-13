@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mt-4 mb-4">Aggiungi un nuovo appartamento</h2>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
    @endif

    <form   class="form-horizontal" action="{{ route('userApartments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label class="mt-2" for="title">Titolo</label>
        <input type="text" class="form-control"name="title" id="title">

        <label class="mt-2" for="summary">Descrizione appartamento</label>
        <textarea type="text" class="form-control"name="summary" id="summary" rows="10"></textarea>
        
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

        <!-- img -->
        <label class="mt-2" for="image">inserisci  un'immagine</label>
        <input required type="file" class="form-control" name="images[]" id="image" multiple>

        <label class="mt-2" for="image">inserisci  un'immagine</label>
        <input required type="file" class="form-control" name="images[]" id="image" multiple>

        <label class="mt-2" for="image">inserisci  un'immagine</label>
        <input required type="file" class="form-control" name="images[]" id="image" multiple>

        <label class="mt-2" for="image">inserisci  un'immagine</label>
        <input required type="file" class="form-control" name="images[]" id="image" multiple>

        <label class="mt-2" for="image">inserisci  un'immagine</label>
        <input required type="file" class="form-control" name="images[]" id="image" multiple>
        <!-- img end -->

        <label class="mt-2" for="latitude">Latitudine</label>
        <input type="text" class="form-control" name="latitude" id="latitude">

        <label class="mt-2" for="longitude">Longitudine</label>
        <input type="text" class="form-control" name="longitude" id="longitude">

        {{-- EXTRA SERVICES --}}
        <h4>Scegli i servizi extra del tuo appartamento</h4>
        <div class="form-group">
            @foreach($services as $service)
                <div>
                    <input name="servicesList[]" type="checkbox" value="{{ $service->id }}">
                    <label>{{$service->service_name}}</label>
                </div>
            @endforeach
        </div>
        {{-- END EXTRA SERVICES --}}

        <input type="checkbox" class="switch-input" name="visible" id="visible" value="1" {{ old('is_featured') ? 'checked="checked"' : '' }}/>
        <label class="mt-2" for="visible">Rendilo visibile o no</label>

        <label class="mt-2" for="price">Prezzo a notte</label>
        <input type="text" class="form-control" name="price" id="price">

        <div class="text-right">
            <button type="submit" class="btn btn-dark mt-3 mb-5" type="submit">Aggiungi appartamento</button>             
        </div>

    </form>

</div>
    
@endsection