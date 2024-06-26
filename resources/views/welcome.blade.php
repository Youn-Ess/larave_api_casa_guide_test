@extends('layout.app')
@section('content')
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


    <h3>add buildings</h3>
    {{-- <form action="{{ route('circuit.buildign_post') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">select your circuit</label>
            <select name="circuit_id" id="">
                <option value="">none</option>
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
    </form> --}}

    <a href="{{ route('building.index') }}">add</a>
@endsection
