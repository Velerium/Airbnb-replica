@extends('layouts.app')

@section('content')

    <div class="show-container">
        <div class="show-box container">
                <div class="row">
                    <div class="col-12">
                        <div>
                            <h4>{{ $apartment->title }}</h4>
                        </div>
                        <div>
                            <span>{{$apartment->address}}</span>
                        </div>
                    </div>
                </div>
                <div class="show-gallery row my-4">
                    <div class="col-12">
                        <div class="show-pics image-grid-col-2 image-grid-row-2">
                            <img src="https://a0.muscache.com/im/pictures/c1ea79f7-f6ce-4cb9-939d-e6ccdcd5c0a5.jpg">
                        </div>
                        <div class="show-pics">
                            <img src="https://a0.muscache.com/im/pictures/c1ea79f7-f6ce-4cb9-939d-e6ccdcd5c0a5.jpg">
                        </div>
                        <div class="show-pics">
                            <img src="https://a0.muscache.com/im/pictures/c1ea79f7-f6ce-4cb9-939d-e6ccdcd5c0a5.jpg">
                        </div>
                        <div class="show-pics">
                        <img src="https://a0.muscache.com/im/pictures/c1ea79f7-f6ce-4cb9-939d-e6ccdcd5c0a5.jpg">
                        </div>
                        <div class="show-pics">
                            <img src="https://a0.muscache.com/im/pictures/c1ea79f7-f6ce-4cb9-939d-e6ccdcd5c0a5.jpg">
                        </div>
                    </div>
                </div>
                <div class="bio row">
                    <div class="bio-left col-8">
                    <div>{{$apartment->summary}}</div>
                    </div>
                    <div class="col-4">

                        @if (isset($user, $user->id))
                        
                            <h3>
                                <a href="{{ route('register') }}">Registrati per poter mandare un messaggio all'Host dell'appartamento!</a>
                            </h3>
                            <div class="d-flex form-group">
                                <input type="text" class="form-control mr-1" placeholder="Nome">
                                <input type="text" class="form-control ml-1" placeholder="Cognome">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="nomeutente@esempio.com">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" placeholder="Inserisci qui il tuo messaggio..."></textarea>
                            </div>
                            
                        @else 
                        
                            @foreach ($user as $item) 
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <h3 class="mt-4">Manda un messaggio all'Host</h3>
                                <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method("POST")

                                    <div class="d-flex form-group">
                                        <input type="text" class="form-control mr-1" name="first_name" value="{{ $item->first_name }}" placeholder="Nome">
                                        <input type="text" class="form-control ml-1" name="last_name" value="{{ $item->last_name }}" placeholder="Cognome">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" value="{{$item->email}}" placeholder="nomeutente@esempio.com">
                                    </div>
                                    
                                    <div class="form-group">
                                        <textarea class="form-control" rows="5" name="content" placeholder="Inserisci qui il tuo messaggio..."></textarea>
                                        <input type="hidden" name="user_id" value="{{$item->id}}">
                                        <input type="hidden" name="apartment_id" value="{{$apartment->id}}">
                                    </div>
                                    <button type="submit" class="btn btn-light">Send</button>
                                </form> 
                            @endforeach

                        @endif

                    </div>
                </div>
                <div class="show-services row my-4">
                    <div class="services-left col-4">
                        <div>
                            <span>Servizi inclusi</span>
                            <ul>
                                @foreach ($apartment->service as $service)
                                    <li>{{$service->service_name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="services-right col-8">
                        <div>
                            <span>Dettagli extra</span>
                            <ul>
                                <li class="price"><span>€{{$apartment->price}} / notte</span></li>
                                <li><span>Numero di ospiti: {{$apartment->guests_n}}</span></li>
                                <li><span>Numero di stanze: {{$apartment->rooms_n}}</span></li>
                                <li><span>Numero di letti: {{$apartment->beds_n}}</span></li>
                                <li><span>Numero di bagni: {{$apartment->bathrooms_n}}</span></li>
                                @foreach ($apartment->service as $service)
                                    <li>{{$service->service_name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="show-maps row mt-5">
                    <div class="col-12">
                        <div id="map-div" class="map-div"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>

    tt.setProductInfo('BoolBnB', '0.1.4');
    var map;

    tt.services.fuzzySearch({
        key: 'pj3fPYZczjgdGuLpmajsU40F64Y5nmpB',
        query: '{{$apartment->address}}',
        limit: 10,
        radius: 200,
    })

    .then(function(response){
        console.log(response);

        map = tt.map({
            key: 'pj3fPYZczjgdGuLpmajsU40F64Y5nmpB',
            container: 'map-div',
            center: response.results[0].position,
            zoom: 17,
        });
    
        var marker = new tt.Marker().setLngLat(response.results[0].position).addTo(map);
        var popupOffsets = {
            top: [0, 0],
            bottom: [0, -40],
            'bottom-right': [0, -70],
            'bottom-left': [0, -70],
            left: [25, -35],
            right: [-25, -35]
        }
        
        var popup = new tt.Popup({offset: popupOffsets}).setHTML(response.results[0].address.freeformAddress);

        marker.setPopup(popup).togglePopup();
    });
        
</script>
    
@endsection
