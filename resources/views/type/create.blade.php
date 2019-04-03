@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card mb-4 mt-2">
            <div class="card-header bg-white font-weight-bold">
                {{ __('resource.create') }} {{ __('type.type') }}
            </div>
            <div class="card-body">
                <form class="form-row" action="{{ route('types.store') }}" method="post">
                    @csrf

                    <label class="sr-only" for="name">Name</label>
                    <input type="text"
                           class="form-control mr-sm-2{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           id="name"
                           name="name"
                           placeholder="{{ __('field.name') }}"
                           data-_extension-text-contrast="">
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>

                    <button type="submit" class="btn btn-primary mt-2" data-_extension-text-contrast="">{{ __('resource.create') }}</button>
                </form>
            </div>
        </div>
    </div>

@endsection