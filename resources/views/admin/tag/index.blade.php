@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">Tags list</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @if($tags->isNotEmpty())
                                <table class="table table-striped table-vertical">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            @if(Auth::user()->can('edit-tags') || Auth::user()->can('remove-tags'))
                                                <th class="min-width text-right">Actions</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tags as $tag)
                                            <tr>
                                                <td>{{ $tag->name }}</td>
                                                <td class="min-width text-right">
                                                    @can('edit-tags')
                                                        <a href="{{ route('admin.tag.edit-tag', $tag) }}" class="btn btn-primary" title="Edit">
                                                            Edit
                                                        </a>
                                                    @endcan
                                                    @can('remove-tags')
                                                        {{ Form::open(['route' => ['admin.tag.remove-tag', $tag], 'method' => 'DELETE', 'class' => 'confirm d-inline']) }}
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
