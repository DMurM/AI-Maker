<!-- resources/views/assets/assets.blade.php -->
@extends('layouts.app')

@section('title', 'Assets Page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('components.sidebar')
            </div>
            <div class="col-md-9">
                <h1>Assets Page</h1>
                <!-- Add the content for the assets page here -->
            </div>
        </div>
    </div>
@endsection
