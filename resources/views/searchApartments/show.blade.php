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
                    <div class="col-6">
                        <div class="show-thumbnail">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="side-pics"></div>
                        <div class="side-pics"></div>
                        <div class="side-pics"></div>
                        <div class="side-pics"></div>
                    </div>
                </div>
                <div class="bio row">
                    <div class="bio-left col-8">
                    <div>Descrizione: {{$apartment->summary}}</div>
                    </div>
                    <div id="app" class="bio-right col-4">
                        <message-box/>
                    </div>
                </div>
                <div class="show-services row my-4">
                    <div class="services-left col-6">
                        <span>Servizi inclusi</span>
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
            
            <div id='map-div' class='map-div' style="width: 100%; height: 350px;"></div>
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

            // if (response.results[0].type === 'POI') {
            //     var popup = new tt.Popup({offset: popupOffsets}).setHTML(response.results[0].poi.name);
            // } else {
                var popup = new tt.Popup({offset: popupOffsets}).setHTML(response.results[0].address.freeformAddress);
            // }

            marker.setPopup(popup).togglePopup();
    });
        
    </script>
    
@endsection