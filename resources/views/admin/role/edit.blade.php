@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{ Form::model($role, ['route' => ['admin.role.update-role', $role], 'method' => 'PUT']) }}
                <div class="card shadow">
                    <div class="card-header">Edit role</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group required">
                                    {{ Form::label('name', 'Name:', ['class' => 'control-label']) }}
                                    {{ Form::text('name', null, ['class' => 'form-control', 'required' => true]) }}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group required">
                                    {{ Form::label('slug', 'Slug:', ['class' => 'control-label']) }}
                                    {{ Form::text('slug', null, ['class' => 'form-control', 'required' => true]) }}
                                </div>
                            </div>
                        </div>
                        <h4 class="text-center">Role permissions</h4>
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
                                                <td><input type="checkbox" name="permissions[]" value="{{ $permission->id }}" 
                                                {{ $permission->roles->contains($role) == 0 ?: 'checked' }}></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
