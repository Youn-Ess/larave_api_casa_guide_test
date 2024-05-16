@extends('layout.app')
@section('content')
    <h2>select the buildings for you circuit on the map</h2>
    <div id="map" style="width: 100%; height: 400px;"></div>
    {{-- <button id="submit" class="border px-2 py-1 rounded-md test-[1.2rem] bg-gray-500 text-white">add circuit</button>
 --}}

    @include('components.modal')
    <script type='text/javascript'
        src='https://maps.google.com/maps/api/js?language=en&key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&region=GB&libraries=directions'>
    </script>

    {{ $buildingsOfCircuit }}


    <script>
        var paths = @json($circuit).map(path => {
            return {
                ...path,
                lat: Number(path.lat),
                lng: Number(path.lng),
            }
        })

        var buildings = @json($buildingsOfCircuit).map(building => {
            return {
                ...building,
                lat: Number(building.lat),
                lng: Number(building.lng),
            }
        })



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
                path: paths,
                strokeColor: '#00B9FF',
                strokeWeight: 4,
                map: map,
            });



            // display all builings of the circuit

            buildings.forEach(building => {
                const marker = new google.maps.Marker({
                    position: building,
                    map: map,
                });
                marker.addListener('click', function() {
                    console.log(marker.position.lat());
                })
            });

            map.addListener('click', function(event) {
                const marker = new google.maps.Marker({
                    position: {
                        lat: event.latLng.lat(),
                        lng: event.latLng.lng()
                    },
                    map: map,
                });
                document.getElementById('submit').click()

                const modal = document.getElementById('staticBackdrop');

                modal.addEventListener('hidden.bs.modal', function(event) {
                    marker.setMap(null)
                    markers = markers.filter(m => m !== marker);
                });

                document.getElementById('building_longitude').value = event.latLng.lng()
                document.getElementById('building_latitude').value = event.latLng.lat()
                document.getElementById('circuit_id').value = @json($id)

                markers.push(marker);

            });

            // document.getElementById('submit').addEventListener('click', function() {
            //     const markersOfPlyLine = markers.map(marker => marker.getPosition())
            //     if (markersOfPlyLine.length < 2) return alert('please select your circuit')
            //     const polyLine = new google.maps.Polyline({
            //         path: markersOfPlyLine,
            //         strokeColor: '#00FF00',
            //         strokeWeight: 5,
            //         map: map,
            //         data: {
            //             id: @json($circuit).id,
            //             name: @json($circuit).name,
            //             description: @json($circuit).description
            //         }
            //     });

            //     allCicruits.push(polyLine)
            //     markers.map(marker => marker.setMap(null))
            //     let cordinates = markers.map((marker) => {
            //         return {
            //             circuit_id: @json($circuit).id,
            //             latitude: marker.getPosition().lat(),
            //             longitude: marker.getPosition().lng()
            //         }
            //     })

            //     async function submitData() {

            //         try {
            //             const response = await axios.post('/circuit/path_post', cordinates);
            //             // Handle successful response
            //             console.log('Data posted successfully:', response.data);

            //         } catch (error) {
            //             // Handle errors
            //             console.error('Error posting data:', error.response.data);
            //             // Display error message to the user
            //         }
            //     }

            //     submitData()

            //     markers = []
            //     line.setPath(markers.map(marker => marker.getPosition()));

            //     for (const polyLine of allCicruits) {
            //         polyLine.setOptions({
            //             path: polyline = polyLine.latLngs.Fg[0].Fg.map(path => {
            //                 return {
            //                     lat: path.lat(),
            //                     lng: path.lng()
            //                 }
            //             }),
            //         });

            //         polyLine.addListener('click', function() {
            //             console.log(polyLine.data);
            //         })
            //     }
            // })
        }


        window.onload = initMap;
    </script>
@endsection
