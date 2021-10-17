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

<div class="video-host-container">
    <div class="row">
        <video autoplay muted loop class="col-6">
            <source src="{{asset('video/host-video.mp4')}}" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
        
        <div class="host-box col-6">
            <h1>Diventa host in pochi semplici passi</h1>
            <div>Puoi affittare qualsiasi tipo di alloggio, ovunque.</div>
            <div>Ti aiuteremo a scoprire l'arte dell'ospitalità. </div>
            <div>Saremo al tuo fianco in ogni momento.</div>
            <div>Unisciti a noi.</div>
        </div>
    </div>
</div>

<div class="create-container">

    <div class="container create-content">

        <form class="form-horizontal" action="{{ route('userApartments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
    
            <label class="label-text mt-2" for="title">Aggiungi il titolo del tuo appartamento</label>
            <input type="text" class="form-control input-text" name="title" id="title">
    
            <label class="label-text mt-2" for="summary">Descrizione appartamento</label>
            <textarea type="text" class="form-control input-text" name="summary" id="summary" rows="10"></textarea>

            <div class="row nrs-inp-lab">
                <label class="col-2" for="rooms_n">Nº di stanze</label>
                <input type="number" step="1" class="form-control col-2" name="rooms_n" id="rooms_n">
                
                <label class="col-2" for="beds_n">Nº di letti</label>
                <input type="number" step="1" class="form-control col-2" name="beds_n" id="beds_n">
        
                <label class="col-2" for="bathrooms_n">Nº di bagni</label>
                <input type="number" step="1" class="form-control col-2" name="bathrooms_n" id="bathrooms_n">
        
                <label class="col-2" for="guests_n">Nº di ospiti</label>
                <input type="number" step="1" class="form-control col-2" name="guests_n" id="guests_n">
              
                <label class="col-2" for="latitude">Latitudine</label>
                <input type="number" step="1" class="form-control col-2" name="latitude" id="latitude">
                
                <label class="col-2" for="longitude">Longitudine</label>
                <input type="number" step="1" class="form-control col-2" name="longitude" id="longitude">

                <label class="col-2" for="square_meters">Metri quadrati</label>
                <input type="number" step="1" class="form-control col-2" name="square_meters" id="square_meters">

                <label class="col-2" for="price">Prezzo/notte</label>
                <input type="number" step="1" class="form-control col-2" name="price" id="price">
            </div>
            
    
            <label class="label-text mt-2" for="address">Indirizzo appartamento</label>
            <textarea type="text" class="form-control input-text" name="address" id="address" rows="2"></textarea>
    
            <!-- IMG -->
            <label class="label-text mt-2" for="imgFiles[]">Inserisci le immagini del tuo appartamento | </label>
            <input type="file" class="input-text" name="imgFiles[]" id="imgFiles[]" multiple>
            <!-- IMG END -->
    
    
            {{-- EXTRA SERVICES --}}
            <h4 class="mb-3">Scegli i servizi extra del tuo appartamento</h4>
            <div class="row services-row">
                @foreach($services as $service)
                <div class="col-2">
                    <input name="servicesList[]" type="checkbox" value="{{ $service->id }}">
                    <label class="services-label">{{$service->service_name}}</label>
                </div>
                @endforeach

            </div>
            {{-- END EXTRA SERVICES --}}
    
            <input type="checkbox" class="switch-input" name="visible" id="visible" value="1" {{ old('is_featured') ? 'checked="checked"' : '' }}/>
            <label class="label-text mt-2" for="visible">Rendi pubblico il tuo appartamento</label>
    
            <div class="button-box">
                <button type="submit" type="submit">Aggiungi appartamento</button>             
            </div>
        </form>
    </div>

</div>
    
@endsection