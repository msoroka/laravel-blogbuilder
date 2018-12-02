@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">Posts list</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @if($posts->isNotEmpty())
                                <table class="table table-striped table-vertical">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Category</th>
                                            <th>Created at</th>
                                            <th>Author</th>
                                            @if(Auth::user()->can('edit-posts') || Auth::user()->can('remove-posts'))
                                                <th class="min-width text-right">Actions</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>{{ $post->name }}</td>
                                                <td>{{ $post->status_name }}</td>
                                                <td>{{ $post->category->name }}</td>
                                                <td>{{ $post->created_at }}</td>
                                                <td>{{ $post->author->full_name }}</td>
                                                <td class="min-width text-right">
                                                    @can('edit-posts')
                                                        <a href="{{ route('admin.post.edit-post', $post) }}" class="btn btn-primary" title="Edit">
                                                            Edit
                                                        </a>
                                                    @endcan
                                                    @can('remove-posts')
                                                        {{ Form::open(['route' => ['admin.post.remove-post', $post], 'method' => 'DELETE', 'class' => 'confirm d-inline']) }}
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
