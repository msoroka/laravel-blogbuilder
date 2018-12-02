@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{ Form::open(['route' => ['admin.post.store-post']]) }}
                <div class="card shadow">
                    <div class="card-header">Create post</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group required">
                                    {{ Form::label('name', 'Post name:', ['class' => 'control-label']) }}
                                    {{ Form::text('name', null, ['class' => 'form-control', 'required' => true]) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group required">
                                    {{ Form::label('content', 'Content:', ['class' => 'control-label']) }}
                                    {{ Form::textarea('content', null, ['class' => 'form-control my-editor']) }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                @can('status-posts')
                                    <div class="form-group required">
                                        {{ Form::label('status', 'Status:', ['class' => 'control-label']) }}
                                        {{ Form::select('status', $statuses, null, ['class' => 'form-control my-editor', 'required' => true]) }}
                                    </div>
                                @endcan
                                @can('assign-posts')
                                    <div class="form-group required">
                                        {{ Form::label('author_id', 'Author:', ['class' => 'control-label']) }}
                                        {{ Form::select('author_id', $users, Auth::user()->id, ['class' => 'form-control', 'required' => true]) }}
                                    </div>
                                @endcan
                                <div class="form-group required">
                                    {{ Form::label('category_id', 'Category:', ['class' => 'control-label']) }}
                                    {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'required' => true]) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('tags[]', 'Tags:', ['class' => 'control-label']) }}
                                    {{ Form::select('tags[]', $tags, null, ['class' => 'form-control', 'multiple' => 'multiple', 'required' => false]) }}
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                {{ Form::submit('Create', ['class' => 'btn btn-primary btn-block']) }}
                            </div>
                        </div>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
