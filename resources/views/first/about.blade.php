@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">{{ $title }}</h1>
        <p class="lead">{{ $description}}</p>
    </div>
    <div class="row">
        <div class="col-md-8">
            {!! $about !!}
        </div>
        <div class="col-md-4">
            @include('first.sidebar')
        </div>
    </div>
</div>
@endsection
