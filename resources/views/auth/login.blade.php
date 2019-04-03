@extends('layouts.app')

@section('content')

    <div class="container h-75">
        <div class="row h-75 justify-content-center align-items-center">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-at"></i></span>
                            </div>
                            <input
                                    id="email"
                                    type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email"
                                    placeholder="e-mail"
                                    value="{{ old('email') }}"
                                    required autofocus
                                    data-_extension-text-contrast="">
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                            </div>
                            <input
                                    id="password"
                                    type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password"
                                    placeholder="Password"
                                    required
                                    data-_extension-text-contrast="">
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col pr-2">
                                <button type="submit" class="btn btn-block btn-primary" data-_extension-text-contrast="">{{ __('auth.login') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
