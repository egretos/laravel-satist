<?php
/**
 * @var $model \App\Models\Entity
 */
?>

@extends('layouts.app')

@section('content')

    <div class="container">

        <h2 class="mb-4">{{ $model->display_name }}</h2>

        <div class="card mb-4">
            <div class="card-header font-weight-bold bg-dark text-light d-flex justify-content-between align-items-center">
                <div>{{ __('field.fields') }}</div>
                <a class="btn btn-success btn-sm"
                   href="{{ route('entities.fields.create', ['entity_id' => $model->id]) }}"
                   data-toggle="tooltip"
                   data-placement="left"
                   data-original-title="{{ __('resource.create') }}"
                ><i class="fa fa-fw fa-plus"></i></a>
            </div>
            <div class="card-body">
                <table class="table mb-0">
                    <thead>
                    <tr>
                        <th scope="col">{{ __('field.name') }}</th>
                        <th scope="col">{{ __('field.display name') }}</th>
                        <th scope="col">{{ __('type.type') }}</th>
                        <th scope="col" class="text-right">{{ __('resource.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($model->fields as $field)
                        <tr>
                            <td>{{ $field->name }}</td>
                            <td>{{ $field->display_name }}</td>
                            <td>{{ $field->type->name }}</td>
                            <td>
                                <div class="float-right">
                                    <button type="submit"
                                            class="btn btn-danger btn-sm text-light"
                                            form="type_{{ $model->id }}_delete_form"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            data-original-title="{{ __('resource.delete') }}"
                                    ><i class="fa fa-fw fa-trash"></i></button>
                                    <form
                                            action="{{ route('entities.fields.destroy', [
                                            'entity_id' => $model->id,
                                            'id' => $field->id
                                            ]) }}"
                                            id="type_{{ $model->id }}_delete_form"
                                            method="POST"
                                    >
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection