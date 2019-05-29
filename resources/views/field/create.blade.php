<?php
/**
 * @var \App\Models\Entity $entity
 */
?>

@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card mb-4 mt-2">
            <div class="card-header bg-white font-weight-bold">
                {{ $entity->display_name .' - '. __('resource.create') .' '. __('field.field') }}
            </div>
            <div class="card-body">
                <form class="form-row" action="{{ route('entities.fields.store', ['entity_id' => $entity->id]) }}" method="post">
                    @csrf

                    <input type="hidden"
                           name="entity_id"
                           value="{{ $entity->id }}"
                    >

                    <label class="sr-only" for="name">{{ __('field.name') }}</label>
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

                    <label class="sr-only" for="display_name">{{ __('field.display name') }}</label>
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

                    <label class="sr-only" for="type_id">{{ __('type.type') }}</label>
                    <select class="form-control mt-2" id="type_id" name="type_id">
                        @foreach(\App\Models\Type::all() as $type)
                            <option value="{{ $type->id }}" {{ old('type_id') != $type->id ?: 'selected' }}>{{ $type->name }}</option>
                        @endforeach
                    </select>

                    <div class="invalid-feedback">
                        {{ $errors->first('type_id') }}
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">{{ __('resource.create') }}</button>
                </form>
            </div>
        </div>
    </div>

@endsection