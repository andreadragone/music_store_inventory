@extends('layouts.app') @section('content')
<div class="container">
<table class="table instrument">
        <thead>
            <th>Model</th>
            <th>Brand</th>
            <th>Quantity</th>
        </thead>
        <tbody>
            <tr>
                <td>{{ $instrument->model }}</td>
                <td> {{ $instrument->brand }}</td>
                <td> {{ $instrument->quantity }}</td>
            </tr>
        </tbody>
    </table>
    <form action="{{route('instruments.destroy', $instrument)}}" method="POST"> @csrf
        @method('DELETE')
       <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
@endsection
