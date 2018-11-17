@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{ Form::model($category, ['route' => ['admin.category.update-category', $category], 'method' => 'PUT']) }}
                <div class="card shadow">
                    <div class="card-header">Edit category</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group required">
                                    {{ Form::label('name', 'Name:', ['class' => 'control-label']) }}
                                    {{ Form::text('name', null, ['class' => 'form-control', 'required' => true]) }}
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group required">
                                    @if($category->isRoot() && App\Models\Category::whereNull('parent_id')->count() == 1)
                                        <p class="text-center">If you want to edit parent of this category, you have to create another root element.</p>
                                    @else
                                        {{ Form::label('parent_id', 'Parent:', ['class' => 'control-label']) }}
                                        {{ Form::select('parent_id', $categories, null, ['class' => 'form-control', 'required' => false]) }}
                                    @endif
                                </div>
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
