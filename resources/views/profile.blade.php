@extends('layouts/app')

@section('title','{{ Auth::user()->username }}')

@section('content')
    <div class="row justify-content-center">
        <div class="col-9">
            <h1>{{ Auth::user()->blogTitle }}</h1>
            <hr>
            <h4 class="text-muted">{{ Auth::user()->blogDesc }}</h4>

            <br>
            Blog posts go here...
        </div>
    </div>
    
@endsection