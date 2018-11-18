@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">Categories list</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @if($categories->isNotEmpty())
                                <table class="table table-bordered table-vertical">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Parent</th>
                                            @if(Auth::user()->can('edit-categories') || Auth::user()->can('remove-categories'))
                                                <th class="min-width text-right">Actions</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr style="background: {{ $category->parent ?:"#eee" }}">
                                                <td>
                                                    {{ $category->name}}
                                                </td>
                                                <td>
                                                    @if($category->parent)
                                                        <strong>(parent: {{ $category->parent->name }})</strong>
                                                    @else
                                                        <strong>(root element)</strong>
                                                    @endif
                                                </td>
                                                <td class="min-width text-right">
                                                    @can('edit-categories')
                                                        <a href="{{ route('admin.category.edit-category', $category) }}" class="btn btn-primary" title="Edit">
                                                            Edit
                                                        </a>
                                                    @endcan
                                                    @can('remove-categories')
                                                        {{ Form::open(['route' => ['admin.category.remove-category', $category], 'method' => 'DELETE', 'class' => 'confirm d-inline']) }}
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
