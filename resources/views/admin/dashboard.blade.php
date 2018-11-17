@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h1>Panel administracyjny</h1>
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.post.list-posts') }}">
                        <button class="btn btn-primary btn-lg">
                            Posty
                        </button>
                    </a> 
                </div>
                <div class="col-12" style="margin-top: 10px;">
                    <a href="{{ route('admin.user.list-users') }}">
                        <button class="btn btn-primary btn-lg">
                            Użytkownicy
                        </button>
                    </a>
                </div>
                <div class="col-12" style="margin-top: 10px;">
                    <a href="{{ route('admin.category.list-categories') }}">
                        <button class="btn btn-primary btn-lg">
                            Kategorie
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
