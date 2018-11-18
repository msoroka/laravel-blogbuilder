@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">Roles list</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @if($roles->isNotEmpty())
                                <table class="table table-vertical">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            @if((Auth::user()->can('edit-roles') || Auth::user()->can('remove-roles')) && $roles->count() > 1)
                                                <th class="min-width text-right">Actions</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr>
                                                <td>{{ $role->name }}</td>
                                                <td>{{ $role->slug }}</td>
                                                @if($role->slug != 'admin')
                                                    <td class="min-width text-right">
                                                        @can('edit-roles')
                                                            <a href="{{ route('admin.role.edit-role', $role) }}" class="btn btn-primary" title="Edit">
                                                                Edit
                                                            </a>
                                                        @endcan
                                                        @can('remove-roles')
                                                            {{ Form::open(['route' => ['admin.role.remove-role', $role], 'method' => 'DELETE', 'class' => 'confirm d-inline']) }}
                                                                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger" title="Delete">
                                                                    Delete
                                                                </button>
                                                            {{ Form::close() }}
                                                        @endcan
                                                    </td>
                                                @endif
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
