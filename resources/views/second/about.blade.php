@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5 mb-3">
        <div class="col-md-8">
            <strong><h1 class="blog-title">{{ $title }}</h1></strong>
        </div>
        <div class="col-md-4 ml-auto" style="margin-top: 15px;">
            @isset($date)
                <strong><p class="date">{{ $date }}</p></strong>
            @endisset
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mt-3">
            {!! $about !!}
        </div>
        <div class="col-md-4 mt-3">
            @include('second.sidebar')
        </div>
    </div>
</div>
@endsection
