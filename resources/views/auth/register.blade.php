@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card neutral-round shadow">
                <div class="card-body">
                    <div class="text-center">
                        <h4 class="alt-neutral">{{ __('Join our community!') }}</h4>
                        <span class="text-muted">Start writing articles and inspire millions!</span>
                    </div>
                    <hr class="mt-3 mb-3 divider">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right alt-anti-neutral"><strong>{{ __('Username') }}</strong></label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right alt-anti-neutral"><strong>{{ __('E-Mail Address') }}</strong></label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right alt-anti-neutral"><strong>{{ __('Password') }}</strong></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right alt-anti-neutral"><strong>{{ __('Confirm Password') }}</strong></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="isAdmin" class="col-md-4 col-form-label text-md-right alt-anti-neutral"><strong>{{ __('User Status') }}</strong></label>

                            <div class="col-md-6">
                                <select id="isAdmin" class="form-control" name="isAdmin">
                                    <option value="" disabled>Select Access Permission</option>
                                    @foreach ($user->isAdminOptions() as $optionKey => $optionValue)
                                        <option value="{{ $optionKey }}" {{ $user->isAdmin == $optionValue ? 'selected' : '' }}>{{ $optionValue }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">For testing purposes only.</small>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mt-4">
                            <button type="submit" class="btn btn-anti-neutral text-white">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
