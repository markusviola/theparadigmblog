@extends('layouts/app')

@section('content')
    <div class="row justify-content-center pt-4">
        <div class="col-7">
            <div class="card shadow neutral-round">
                <div class="container">
                    <div class="card-body">

                        <h2 class="card-title mb-1 alt-neutral">Account Settings</h2>
                        <hr class="mb-4">

                        <h6 class="card-subtitle mb-4 text-muted">
                            Your registered information are shown here. Some data can be updated.
                        </h6>

                        <div class="row mb-3">
                            <div class="col-4 alt-anti-neutral"><strong>Username:</strong></div>
                            <div class="col-8">{{ Auth::user()->username }}</div>
                        </div>

                        <div class="row">
                            <div class="col-4 alt-anti-neutral"><strong>Email Address:</strong></div>
                            <div class="col-8">{{ Auth::user()->email }}</div>
                        </div>
                        <hr class="divider">

                        <form action="{{ route('settings.update', Auth::user()->id) }}" method="POST">
                            @method('PATCH')

                            <div class="row mb-2 form-group">
                                <div class="col-4 alt-anti-neutral"><strong>URL:</strong></div>
                                <div class="col-8 p-0">
                                    <input
                                        class="form-control @error('url') is-invalid @enderror"
                                        type="text"
                                        placeholder="Enter your desired URL..."
                                        name="url"
                                        value="{{ old('url') ?? Auth::user()->url  }}"
                                    >
                                    @error('url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2 form-group">
                                <div class="col-4 alt-anti-neutral"><strong>New Password:</strong></div>
                                <div class="col-8 p-0">
                                    <input
                                        class="form-control @error('newPassword') is-invalid @enderror"
                                        type="password"
                                        name="newPassword"
                                    >
                                    @error('newPassword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-4 alt-anti-neutral"><strong>Confirm Password:</strong></div>
                                <div class="col-8 p-0">
                                    <input
                                        class="form-control @error('confirmPassword') is-invalid @enderror"
                                        type="password"
                                        name="confirmPassword"
                                    >
                                    @error('confirmPassword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <hr class="divider">
                            <div class="row mb-5 form-group">
                                <div class="col-4 alt-anti-neutral"><strong>Current Password:</strong></div>
                                <div class="col-8 p-0">
                                    <input
                                        class="form-control @error('currentPassword') is-invalid @enderror"
                                        type="password"
                                        placeholder="Required for update validation..."
                                        name="currentPassword"
                                    >
                                    @error('currentPassword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <button class="btn btn-anti-neutral text-white mb-1">Update Information</button>
                            </div>

                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
