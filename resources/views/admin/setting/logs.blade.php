@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">Logs</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @if($logs->isNotEmpty())
                                <table class="table table-striped table-vertical">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>User</th>
                                            <th>Properties</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($logs as $log)
                                            <tr>
                                                <td>{{ $log->description }}</td>
                                                <td>{{ $log->user ? $log->user->full_name : 'Null'}}</td>
                                                <td><a class="btn btn-primary" data-toggle="collapse" href="#log{{ $log->id }}" role="button" aria-expanded="false" aria-controls="log{{ $log->id }}">Properties</a></td>
                                                <td>{{ $log->created_at }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <div class="collapse" id="log{{ $log->id }}">
                                                        <div class="card card-body">
                                                            {{ $log->properties }}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h3 class="text-center">Nothing to show</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
