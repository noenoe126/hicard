<!-- resources/views/search/results.blade.php -->

@extends('layouts.app-master')

@section('content')
    <div class="container">
        <h2>Search Results</h2>

        @if ($results->isEmpty())
            <p>No results found for your query.</p>
        @else
            <ul>
                @foreach ($results as $result)
                    <li>
                        <!-- Display relevant details for each result -->
                        @if ($result instanceof \App\Models\User)
                            User: {{ $result->fullname }} ({{ $result->username }})
                        @elseif ($result instanceof \App\Models\Post)
                            Post: {{ $result->title }}
                        @elseif ($result instanceof \App\Models\Product)
                            Product: {{ $result->name }}
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
