@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{ Form::model($user, ['route' => ['admin.user.update-user', $user], 'method' => 'PUT']) }}
                <div class="card shadow">
                    <div class="card-header">Edit user</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group required">
                                    {{ Form::label('first_name', 'First name:', ['class' => 'control-label']) }}
                                    {{ Form::text('first_name', null, ['class' => 'form-control', 'required' => true]) }}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group required">
                                    {{ Form::label('last_name', 'Last name:', ['class' => 'control-label']) }}
                                    {{ Form::text('last_name', null, ['class' => 'form-control', 'required' => true]) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group required">
                                    {{ Form::label('nickname', 'Nickname:', ['class' => 'control-label']) }}
                                    {{ Form::text('nickname', null, ['class' => 'form-control', 'required' => true]) }}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group required">
                                    {{ Form::label('email', 'E-mail', ['class' => 'control-label']) }}
                                    {{ Form::text('email', null, ['class' => 'form-control', 'required' => true]) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group required">
                                    {{ Form::label('password', 'Password:', ['class' => 'control-label']) }}
                                    {{ Form::password('password', ['class' => 'form-control', 'required' => false]) }}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group required">
                                    {{ Form::label('password_confirmation', 'Password confirmation:', ['class' => 'control-label']) }}
                                    {{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => false]) }}
                                </div>
                            </div>
                        </div>
                        @can('assign-roles')
                            <h4 class="text-center">Roles</h4>
                            <div class="row">
                                <div class="col">
                                    <table class="table table-bordered table-vertical">
                                        <thead>
                                            <tr>
                                                <th>Role</th>
                                                <th>Assign</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($roles as $role)
                                                <tr>
                                                    <td>{{ $role->name }}</td>
                                                    <td><input type="checkbox" name="roles[]" value="{{ $role->id }}" 
                                                    {{ $user->roles->contains($role) == 0 ?: 'checked' }}></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endcan
                        @can('assign-permissions')
                            <h4 class="text-center">Permissions</h4>
                            <div class="row">
                                <div class="col">
                                    <table class="table table-bordered table-vertical">
                                        <thead>
                                            <tr>
                                                <th>Permission</th>
                                                <th>Assign</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($permissions as $permission)
                                                <tr>
                                                    <td>{{ $permission->name }}</td>
                                                    <td>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" 
                                                        {{ $user->permissions->contains($permission) == 0 ?: 'checked' }}
                                                        @foreach($user->roles as $role)
                                                            {{ $role->permissions->contains($permission) == 0 ?: 'checked ' . 'disabled'  }}
                                                        @endforeach
                                                        >
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endcan
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                {{ Form::submit('Edit', ['class' => 'btn btn-primary btn-block']) }}
                            </div>
                        </div>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
