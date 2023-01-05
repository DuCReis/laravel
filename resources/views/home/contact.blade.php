@extends('layouts.app')

@section('title', 'Contact Page')

@section('content')
    <h1>Contact Page</h1>
    <p>Hello this is a contact!</p>

    @can('home.secret')
        <p>
            <a href="{{ route('home.secret') }}">
                Go to special contact details!
            </a>
        </p>
    @endcan
@endsection