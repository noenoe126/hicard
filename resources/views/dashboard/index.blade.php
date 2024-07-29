<!-- resources/views/dashboard/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>
    <div>
        <!-- Display your data here -->
        <p><strong>Make:</strong> {{ $car->make }}</p>
        <p><strong>Model:</strong> {{ $car->model }}</p>
        @foreach ($cars as $car)
        <tr>
            <td>{{ $car->make }}</td>
</tr>
            <p>{{ $item->attribute }}</p> <!-- Replace 'attribute' with your actual model attribute -->
        @endforeach
    </div>
@endsection
