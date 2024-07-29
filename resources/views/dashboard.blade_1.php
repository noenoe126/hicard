<!-- dashboard.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard hi</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Cars</h5>
                <p class="card-text">{{ $totalCars }}</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">Total Lands</h5>
                <p class="card-text">{{ $totalLands  }}</p>
            </div>
        </div>
    </div>
@endsection
