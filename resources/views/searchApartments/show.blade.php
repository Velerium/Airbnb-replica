@extends('layouts.app')

@section('content')

    <h2 style="margin-top: 30px; text-align: center">SHOW.BLADE.PHP (Diamoci 'na mossa dajeeee)</h2>
    <div style="display: flex; justify-content: center">
    </div>

    <div id='map-div' class='map-div' style=" position: absolute; right: 50px; top: 250px; width: 30vw; height: 30vw;"></div>

    <script>

    tt.setProductInfo('BoolBnB', '0.1.4');
    var map;

    tt.services.fuzzySearch({
        key: 'pj3fPYZczjgdGuLpmajsU40F64Y5nmpB',
        query: '{{$apt->address}}',
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