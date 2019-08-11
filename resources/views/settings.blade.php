@extends('layouts/app')

@section('content')
    <div class="row justify-content-center pt-4">
        <div class="col-7">
            <div class="card shadow">
                <div class="container">
                    <div class="card-body">
                        <h1 class="card-title mb-1">Account Settings</h1>
                        <hr class="mb-3">
                        <h6 class="card-subtitle mb-4 text-muted">Your registered information are shown here. Some data can be updated.</h6>
                        <div class="row mb-3">
                            <div class="col-4 text-muted"><strong>Username:</strong></div>
                            <div class="col-8">{{ Auth::user()->username }}</div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-muted"><strong>Email Address:</strong></div>
                            <div class="col-8">{{ Auth::user()->email }}</div>
                        </div>
                        <hr class="divider">
                        <form action="{{ route('settings.update', Auth::user()->id) }}" method="POST">
                            @method('PATCH')
                            <div>{{ $errors->first('url') }}</div>
                            <div class="row mb-2 form-group">
                                <div class="col-4 text-muted"><strong>URL:</strong></div>
                                <input class="col-8 form-control col-8" type="text" placeholder="Enter your desired URL..." name="url" value="{{ old('url') ?? Auth::user()->url  }}">
                            </div>
                            <div>{{ $errors->first('newPass') }}</div>
                            <div class="row mb-2 form-group">
                                <div class="col-4 text-muted"><strong>New Password:</strong></div>
                                <input class="col-8 form-control" type="password" name="newPass">
                            </div>
                            <div>{{ $errors->first('confirmPass') }}</div>
                            <div class="row form-group">
                                <div class="col-4 text-muted"><strong>Confirm Password:</strong></div>
                                <input class="col-8 form-control" type="password" name="confirmPass">
                            </div>
                            <hr class="divider">
                            <div>{{ $errors->first('currentPass') }}</div>
                            <div class="row mb-5 form-group">
                                <div class="col-4 text-muted"><strong>Current Password:</strong></div>
                                <input class="col-8 form-control" type="password" placeholder="Required for update validation..." name="currentPass">
                            </div>
                            <div class="row justify-content-center">
                                <button class="btn btn-primary">Update Information</button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
