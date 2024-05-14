<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>

<body>
    {{-- <script type='text/javascript'
        src='https://maps.google.com/maps/api/js?language=en&key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&region=GB'>
    </script> --}}
    <h2>map:::::</h2>
    <div id="map" style="width: 100%; height: 400px;"></div>
    <button id="submit">submit</button>

    <script type='text/javascript'
        src='https://maps.google.com/maps/api/js?language=en&key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&region=GB&libraries=directions'>
    </script>

    <script>
        function initMap() {
            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: {
                    lat: 33.57,
                    lng: -7.60
                },
            });

            map.addListener('click', function(event) {
                const clickLat = event.latLng.lat();
                const clickLng = event.latLng.lng();
                addMarker(map, clickLat, clickLng);
            });

            let flightPath = [{
                    lat: 33.79865868853624,
                    lng: -6.504663119465121
                },
                {
                    lat: 33.67532025292561,
                    lng: -6.768334994465121
                },
                {
                    lat: 33.70724185962538,
                    lng: -6.798461723666651
                }
            ];


            let line = new google.maps.Polyline({
                path: flightPath,
                strokeColor: '#FF0000',
                strokeWeight: 4,
                map: map
            });

        }

        let markers = [];
        let LatsLngs = []

        function addMarker(map, lat, lng) {
            const marker = new google.maps.Marker({
                position: {
                    lat: lat,
                    lng: lng
                },
                map: map,
                title: "Hello World!",
            });

            marker.addListener('click', function() {
                marker.setMap(null);
                markers = markers.filter(m => m !== marker);
            });
            markers.push(marker);
        }

        document.getElementById('submit').addEventListener('click', () => {
            LatsLngs = markers.map(marker => {
                return {
                    lat: marker.position.lat(),
                    lng: marker.position.lng()
                }
            });
        });

        window.onload = initMap;
    </script>
</body>

</html>
