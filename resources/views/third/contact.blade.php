@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5 mb-4">
        <div class="col-md-8">
            <strong><h1 class="blog-title">{{ $title }}</h1></strong>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mt-3">
            @include('partials.contact-form')
        </div>
        <div class="col-md-4 mt-3">
            @include('third.sidebar')
        </div>
    </div>
</div>
@endsection
