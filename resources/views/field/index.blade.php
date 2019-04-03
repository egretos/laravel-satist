
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card mt-2">
            <div class="card-header bg-dark text-light d-flex justify-content-between align-items-center">
                <div>{{ __('field.fields') }}</div>
                <a class="btn btn-success btn-sm"><i class="fa fa-fw fa-plus"></i></a>
            </div>
            <div class="card-body p-0">
                <table class="table table-light mb-0">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection