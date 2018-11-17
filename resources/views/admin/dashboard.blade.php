@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h1>Admin dashboard</h1>
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.post.list-posts') }}">
                        <button class="btn btn-primary btn-lg">
                            Posts
                        </button>
                    </a> 
                </div>
                <div class="col-12" style="margin-top: 10px;">
                    <a href="{{ route('admin.user.list-users') }}">
                        <button class="btn btn-primary btn-lg">
                            Users
                        </button>
                    </a>
                </div>
                <div class="col-12" style="margin-top: 10px;">
                    <a href="{{ route('admin.role.list-roles') }}">
                        <button class="btn btn-primary btn-lg">
                            Roles
                        </button>
                    </a>
                </div>
                <div class="col-12" style="margin-top: 10px;">
                    <a href="{{ route('admin.category.list-categories') }}">
                        <button class="btn btn-primary btn-lg">
                            Categories
                        </button>
                    </a>
                </div>
                <div class="col-12" style="margin-top: 10px;">
                    <a href="{{ route('admin.tag.list-tags') }}">
                        <button class="btn btn-primary btn-lg">
                            Tags
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
