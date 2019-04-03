@php /** @var \App\Models\Type[] $types */ @endphp

@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card mt-2">
            <div class="card-header bg-dark text-light d-flex justify-content-between align-items-center">
                <div>{{ __('type.types') }}</div>
                <a class="btn btn-success btn-sm"
                   href="{{ route('types.create') }}"
                   data-toggle="tooltip"
                   data-placement="left"
                   data-original-title="{{ __('resource.create') }}"
                ><i class="fa fa-fw fa-plus"></i></a>
            </div>
            <div class="card-body p-0">
                <table class="table table-light mb-0">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('field.name') }}</th>
                        <th scope="col" class="text-right">{{ __('resource.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($types as $type)
                        <tr>
                            <th scope="row">{{ $type->id }}</th>
                            <td>{{ $type->name }}</td>
                            <td>
                                <div class="float-right">
                                    <a class="btn btn-primary btn-sm text-light"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       data-original-title="{{ __('resource.edit') }}"
                                    ><i class="fa fa-fw fa-edit"></i></a>
                                    <button type="submit"
                                            class="btn btn-danger btn-sm text-light"
                                            form="type_{{ $type->id }}_delete_form"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            data-original-title="{{ __('resource.delete') }}"
                                    ><i class="fa fa-fw fa-trash"></i></button>
                                    <form
                                            action="{{ route('types.destroy', ['id' => $type->id]) }}"
                                            id="type_{{ $type->id }}_delete_form"
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