@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">Users list</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <table class="table table-striped table-vertical">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Nickname</th>
                                        <th>E-mail</th>
                                        @if(Auth::user()->can('edit-users') || Auth::user()->can('remove-users'))
                                            <th class="min-width text-right">Actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->full_name}}</td>
                                            <td>{{ $user->nickname }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td class="min-width text-right">
                                                @can('edit-users')
                                                    <a href="{{ route('admin.user.edit-user', $user) }}" class="btn btn-primary" title="Edit">
                                                        Edit
                                                    </a>
                                                @endcan
                                                @can('remove-users')
                                                    {{ Form::open(['route' => ['admin.user.remove-user', $user], 'method' => 'DELETE', 'class' => 'confirm d-inline']) }}
                                                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger" title="Delete">
                                                            Delete
                                                        </button>
                                                    {{ Form::close() }}
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
