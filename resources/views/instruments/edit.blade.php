@extends('layouts.app')
@section('content')
@include('errors')
    <div class="container">
        <form action="{{ route('instruments.update', $instrument) }}" method="POST">
            @method('PUT') @csrf
            <input type="text" name="brand" value="{{ $instrument->model}}">
            <input type="text" name="model" value="{{ $instrument->brand }}">
            <input type="number" name="quantity" value="{{ $instrument->quantity }}">
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
@endsection
