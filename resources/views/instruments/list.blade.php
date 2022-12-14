@extends('layouts.app') @section('content')
    <div class="container">
        <table class="table instrument">
            <thead>
                <th>Model</th>
                <th>Brand</th>
                <th>Quantity</th>
                <th>Category</th>
            </thead>
            <tbody>
                @foreach ($instruments as $instrument)
                    <tr>
                        <td>{{ $instrument->model }}</td>
                        <td>{{ $instrument->brand }}</td>
                        <td>{{ $instrument->quantity }}</td>
                        <td>{{ $instrument->category_id }}</td>
                        <td>
                            <form action="{{ route('instruments.edit', $instrument) }}" method="POST">
                                @csrf
                                @method('GET')
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('instruments.destroy', $instrument) }}" method="POST"> @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                        </td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
