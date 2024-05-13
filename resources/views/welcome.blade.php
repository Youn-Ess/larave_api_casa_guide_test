<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>

<body>
    <h3>create the circuit</h3>
    <form action="{{ route('circuit.post') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">name</label>
            <input type="text" placeholder="name" name="name">
        </div>
        <div>
            <label for="">alternative</label>
            <input type="text" placeholder="alternative" name="alternative">
        </div>
        <div>
            <label for="">description</label>
            <input type="text" placeholder="description" name="description">
        </div>
        <div>
            <label for="">image</label>
            <input type="file" placeholder="image" multiple name="image[]">
        </div>
        <div>
            <label for="">audio</label>
            <input type="text" placeholder="audio" name="audio">
        </div>
        <div>
            <label for="">headpoint</label>
            <input type="text" placeholder="headpoint" name="headpoint">
        </div>
        <div>
            <label for="">zoom</label>
            <input type="text" placeholder="zoom" name="zoom">
        </div>
        <button>submit</button>
    </form>


    <h3>add path for your circuit</h3>
    <form action="{{ route('circuit.path_post') }}" method="post">
        @csrf
        <div>
            <label for="">select your circuit</label>
            <select name="circuit_id" id="">
                @foreach ($circuits as $circuit)
                    <option value="{{ $circuit->id }}">{{ $circuit->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="">latitude</label>
            <input type="text" placeholder="latitude" name="latitude">
        </div>
        <div>
            <label for="">longitude</label>
            <input type="text" placeholder="longitude" name="longitude">
        </div>
        <button>submit</button>
    </form>

    <h3>add buildings on that circuit</h3>
    <form action="{{ route('circuit.buildign_post') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">select your circuit</label>
            <select name="circuit_id" id="">
                @foreach ($circuits as $circuit)
                    <option value="{{ $circuit->id }}">{{ $circuit->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="">name</label>
            <input type="text" placeholder="name" name="name">
        </div>
        <div>
            <label for="">description</label>
            <input type="text" placeholder="description" name="description">
        </div>
        <div>
            <label for="">audio</label>
            <input type="text" placeholder="audio" name="audio">
        </div>
        <div>
            <label for="">image</label>
            <input type="file" placeholder="image" multiple name="image[]">
        </div>
        <div>
            <label for="">latitude</label>
            <input type="text" placeholder="latitude" name="latitude">
        </div>
        <div>
            <label for="">longitude</label>
            <input type="text" placeholder="longitude" name="longitude">
        </div>
        <button>submit</button>
    </form>


    <h1>imgs of circuit</h1>
    @if ($circuit)
        @foreach ($circuit->images as $image)
            <span>{{ $image->path }}</span>
        @endforeach
    @endif
</body>

</html>
