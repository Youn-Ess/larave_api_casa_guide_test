<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    @vite(['resources/js/app.js'])
    @vite('resources/css/app.css')

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
    {{-- <script type='text/javascript'
        src='https://maps.google.com/maps/api/js?language=en&key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&region=GB'>
    </script> --}}
    <h2>map:::::</h2>
    <div id="map" style="width: 100%; height: 400px;"></div>
    @include('components.modal')
    {{ $circuit->id }}

    <script type='text/javascript'
        src='https://maps.google.com/maps/api/js?language=en&key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&region=GB&libraries=directions'>
    </script>

    <script>
        console.log(@json($circuit));

        let markers = [];

        function initMap() {
            let allCicruits = [];
            const casablanca = {
                lat: 33.57,
                lng: -7.60
            }
            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 9,
                center: casablanca,
                mapTypeId: google.maps.MapTypeId.HYBRID
            });


            // poly line that displayed on red to show the poly line that the user is currentely creating it
            let line = new google.maps.Polyline({
                strokeColor: '#FF0000',
                strokeWeight: 4,
                map: map,
            });

            map.addListener('click', function(event) {
                const marker = new google.maps.Marker({
                    position: {
                        lat: event.latLng.lat(),
                        lng: event.latLng.lng()
                    },
                    map: map,
                });
                marker.addListener('click', function() {
                    marker.setMap(null);
                    markers = markers.filter(m => m !== marker);
                    line.setPath(markers.map(marker => marker.getPosition()));
                });
                markers.push(marker);
                line.setPath(markers.map(marker => marker.getPosition()));
            });

            document.getElementById('submit').addEventListener('click', function() {
                const markersOfPlyLine = markers.map(marker => marker.getPosition())
                if (markersOfPlyLine.length < 2) return alert('please select your circuit')
                const polyLine = new google.maps.Polyline({
                    path: markersOfPlyLine,
                    strokeColor: '#00FF00',
                    strokeWeight: 5,
                    map: map,
                    data: {
                        name: @json($circuit).name,
                        description: @json($circuit).description
                    }
                });

                allCicruits.push(polyLine)
                markers.map(marker => marker.setMap(null))
                let cordinates = markers.map((marker) => {
                    return {
                        latitude: marker.getPosition().lat(),
                        langtitude: marker.getPosition().lng()
                    }
                })

                async function submitData() {

                    try {
                        const response = await axios.post('/circuit/path_post', cordinates);
                        // Handle successful response
                        console.log('Data posted successfully:', response.data);
                        
                    } catch (error) {
                        // Handle errors
                        console.error('Error posting data:', error.response.data);
                        // Display error message to the user
                    }
                }

                submitData()

                markers = []
                line.setPath(markers.map(marker => marker.getPosition()));

                for (const polyLine of allCicruits) {
                    polyLine.setOptions({
                        path: polyline = polyLine.latLngs.Fg[0].Fg.map(path => {
                            return {
                                lat: path.lat(),
                                lng: path.lng()
                            }
                        }),
                    });

                    polyLine.addListener('click', function() {
                        console.log(polyLine.data);
                    })
                }

                document.getElementById('circuitId').value = @json($circuit).id
                document.getElementById('circuitName').value = @json($circuit).name
            })
        }


        window.onload = initMap;
    </script>
</body>

</html>
