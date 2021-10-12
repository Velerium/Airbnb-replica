@extends('layouts.app')

@section('content')

<div class="container">

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
    
    <h2 class="mt-4 mb-4">Modifica {{ $apt->title }}</h2>

    <form action="{{ route('userApartments.update', $apt->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label class="mt-2" for="title">Titolo</label>
        <input type="text" class="form-control"name="title" id="title" value="{{ $apt->title }}">

        <label class="mt-2" for="summary">Descrizione appartamento</label>
        <textarea type="text" class="form-control"name="summary" id="summary" rows="10">{{ $apt->summary }}</textarea>
        
        <label class="mt-2" for="rooms_n">Numero di stanze</label>
        <input type="text" class="form-control"name="rooms_n" id="rooms_n" value="{{ $apt->rooms_n }}">
        
        <label class="mt-2" for="beds_n">Numero di letti</label>
        <input type="text" class="form-control"name="beds_n" id="beds_n" value="{{ $apt->beds_n }}">

        <label class="mt-2" for="bathrooms_n">Numero di bagni</label>
        <input type="text" class="form-control" name="bathrooms_n" id="bathrooms_n" value="{{ $apt->bathrooms_n }}">

        <label class="mt-2" for="guests_n">Numero di ospiti</label>
        <input type="text" class="form-control" name="guests_n" id="guests_n" value="{{ $apt->guests_n }}">

        <label class="mt-2" for="square_meters">Metri quadrati</label>
        <input type="text" class="form-control" name="square_meters" id="square_meters" value="{{ $apt->square_meters }}">

        <label class="mt-2" for="address">Indirizzo appartamento</label>
        <textarea type="text" class="form-control"name="address" id="address" rows="2">{{ $apt->address }}</textarea>

        <!-- img -->


        <!-- img end -->

        <label class="mt-2" for="latitude">Latitudine</label>
        <input type="text" class="form-control" name="latitude" id="latitude" value="{{ $apt->latitude }}">

        <label class="mt-2" for="longitude">Longitudine</label>
        <input type="text" class="form-control" name="longitude" id="longitude" value="{{ $apt->longitude }}">

        <input type="checkbox" class="switch-input" name="visible" id="visible" value="{{ $apt->visible }}"}}/>
        <label class="mt-2" for="visible">Rendi pubblico il tuo appartamento</label>

        <label class="mt-2 d-block" for="price">Prezzo a notte</label>
        <input type="text" class="form-control" name="price" id="price" value="{{ $apt->price }}">

        {{-- SERVICES --}}
        <h4>Modifica i servizi extra del tuo appartamento</h4>

        <div class="form-check">

            {{--TODO: checked input when the apartment get those services  --}}
            <div class="form-group">
                @foreach($services as $service)
                    <div>
                        <input class="form-check-input" name="servicesList[]" type="checkbox" value="1" {{ $apt->service_id ? 'checked="checked"' : '' }}>
                        <label class="form-check-label d-flex" for="flexCheckChecked">{{$service->service_name}}</label>
                    </div>
                @endforeach
            </div>

        </div>
        {{-- END SERVICES --}}

        <button type="submit" class="btn btn-dark mt-3 mb-5" type="submit">Salva modifiche</button>

    </form>

</div>
    
@endsection