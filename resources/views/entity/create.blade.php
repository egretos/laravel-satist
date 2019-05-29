@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card mb-4 mt-2">
            <div class="card-header bg-white font-weight-bold">
                {{ __('resource.create') }} {{ __('entity.entity') }}
            </div>
            <div class="card-body">
                <form class="form-row" action="{{ route('entities.store') }}" method="post">
                    @csrf

                    <label class="sr-only" for="name">Name</label>
                    <input type="text"
                           class="form-control mr-sm-2{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           id="name"
                           name="name"
                           placeholder="{{ __('field.name') }}"
                           data-_extension-text-contrast=""
                           value="{{ old('name') }}"
                    >
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>

                    <label class="sr-only" for="name">Uer Name</label>
                    <input type="text"
                           class="form-control mr-sm-2{{ $errors->has('name') ? ' is-invalid' : '' }} mt-2"
                           id="display_name"
                           name="display_name"
                           placeholder="{{ __('field.display name') }}"
                           data-_extension-text-contrast=""
                           value="{{ old('display_name') }}"
                    >
                    <div class="invalid-feedback">
                        {{ $errors->first('display_name') }}
                    </div>

                    <button type="submit" class="btn btn-primary mt-2" data-_extension-text-contrast="">{{ __('resource.create') }}</button>
                </form>
            </div>
        </div>
    </div>

@endsection