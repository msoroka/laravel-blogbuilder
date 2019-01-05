@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{ Form::model($setting, ['route' => ['admin.setting.update-setting', $setting], 'method' => 'PUT']) }}
                <div class="card shadow">
                    <div class="card-header">Blog settings</div>
                    <div class="card-body">
                        <h3>Main settings</h3>
                        <div class="row">
                            <div class="col">
                                <div class="form-group required">
                                    {{ Form::label('name', 'Name:', ['class' => 'control-label']) }}
                                    {{ Form::text('name', null, ['class' => 'form-control', 'required' => true]) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group required">
                                    {{ Form::label('description', 'Description:', ['class' => 'control-label']) }}
                                    {{ Form::textarea('description', null, ['class' => 'form-control', 'required' => true, 'rows' => 3]) }}
                                </div>
                            </div>
                        </div>
                        <h3>Socials</h3>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ Form::label('facebook', 'Facebook:', ['class' => 'control-label']) }}
                                    {{ Form::text('facebook', null, ['class' => 'form-control', 'required' => false]) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ Form::label('instagram', 'Highlighted Instagram post:', ['class' => 'control-label']) }}
                                    {{ Form::text('instagram', null, ['class' => 'form-control', 'required' => false]) }}
                                </div>
                            </div>
                        </div>
                        <h3>Blog owner: (can be empty)</h3>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ Form::label('owner_id', 'Owner:', ['class' => 'control-label']) }}
                                    {{ Form::select('owner_id', $users, null, ['class' => 'form-control my-editor', 'required' => false]) }}
                                </div>
                            </div>
                        </div>
                        <h3>Theme:</h3>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <img src="/images/first.png" width="50%">
                                    {{ Form::radio('theme', 'first' , $setting->theme) }} First <br>
                                    <hr>
                                    <img src="/images/second.png" width="50%">
                                    {{ Form::radio('theme', 'second' , $setting->theme) }} Second <br>
                                    <hr>
                                    <img src="/images/third.png" width="50%">
                                    {{ Form::radio('theme', 'third' , $setting->theme) }} Third <br>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ Form::label('about', 'About page:', ['class' => 'control-label']) }}
                                    {{ Form::textarea('about', null, ['class' => 'form-control my-editor']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                {{ Form::submit('Save', ['class' => 'btn btn-primary btn-block']) }}
                            </div>
                        </div>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
