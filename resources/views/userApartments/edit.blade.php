@extends('layouts.app')

@section('content')


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

<div class="edit-container">

    <div class="container">

        <form class="form-horizontal" action="{{ route('userApartments.update', $apt->id) }}" method="POST">
    
            <h1>Modifica le informazioni della tua proprietà</h1>
            <h4 class="text-center"><i class="fas fa-house-user"></i> {{ $apt->title }}</h4>
    
            @csrf
            @method('PUT')
    
            <label class="mt-2" for="title">Titolo</label>
            <input type="text" class="form-control"name="title" id="title" value="{{ $apt->title }}">
    
            <label class="mt-2" for="summary">Descrizione appartamento</label>
            <textarea type="text" class="form-control"name="summary" id="summary" rows="10">{{ $apt->summary }}</textarea>

            <div class="row nmb-inpt">
                <label class="mt-2 col-2" for="rooms_n">Numero di stanze</label>
                <input type="number" class="form-control col-2"name="rooms_n" id="rooms_n" value="{{ $apt->rooms_n }}">
                
                <label class="mt-2 col-2" for="beds_n">Numero di letti</label>
                <input type="number" class="form-control col-2"name="beds_n" id="beds_n" value="{{ $apt->beds_n }}">
        
                <label class="mt-2 col-2" for="bathrooms_n">Numero di bagni</label>
                <input type="number" class="form-control col-2" name="bathrooms_n" id="bathrooms_n" value="{{ $apt->bathrooms_n }}">
        
                <label class="mt-2 col-2" for="guests_n">Numero di ospiti</label>
                <input type="number" class="form-control col-2" name="guests_n" id="guests_n" value="{{ $apt->guests_n }}">
        
                <label class="mt-2 col-2" for="square_meters">Metri quadrati</label>
                <input type="number" class="form-control col-2" name="square_meters" id="square_meters" value="{{ $apt->square_meters }}">

                <label class="mt-2 col-2" for="price">Prezzo a notte</label>
                <input type="number" class="form-control col-2" name="price" id="price" value="{{ $apt->price }}">
            </div>
        
            <label class="mt-2" for="address">Indirizzo appartamento</label>
            <textarea type="text" rows="1" class="form-control" name="address" id="address">{{$apt->address}}</textarea>

            <div class="row">
                <div class="col-6">
                    <label class="mt-2" for="latitude">Latitudine</label>
                    <input type="text" class="form-control"  name="latitude" id="latitude" value="{{ $apt->latitude }}">
                </div>

                <div class="col-6">
                    <label class="mt-2" for="longitude">Longitudine</label>
                    <input type="text" class="form-control"  name="longitude" id="longitude" value="{{ $apt->longitude }}">
                </div>
            </div>
    
            <!-- IMAGES -->
            <div>
                <h4 class="mt-2">Le immagini del tuo appartamento</h4>
                {{-- <div class="mt-0">
                    <label class="label-img" for="imgFiles">Aggiungi nuove immagini:</label>
                    <input type="file" class="input-text" name="imgFiles[]" id="imgFiles" multiple>
                </div> --}}
            </div>

            <div class="row img-container">
                @foreach ($images as $image)
                    <div class="col-4">
                        <img src="{{ asset('storage/' . $image->url) }}" alt="{{ $apt->title }}">
                    </div>
                @endforeach
            </div>
            <!-- IMAGES END -->
    
            {{-- SERVICES --}}
            <h4 class="mt-5">Modifica i servizi extra del tuo appartamento</h4>
            <div class="row services-row">
                @foreach($services as $service)
                <div class="col-2">
                    <input name="servicesList[]" type="checkbox" value="{{ $service->id}}">
                    <label class="services-label" for="flexCheckChecked">{{$service->service_name}}</label>
                </div>
                @endforeach
            </div>
            {{-- END SERVICES --}}

            <input type="checkbox" class="switch-input" name="visible" id="visible" value="{{ $apt->visible }}"}}/>
            <label class="mt-2 public-label" for="visible">Rendi pubblico il tuo appartamento</label>
            
            <div class="btn-save-box">
                <button type="submit" class="btn-save">Salva modifiche</button>                
            </div>
    
        </form>
    </div>
</div>
@endsection