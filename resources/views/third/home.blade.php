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
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-4">
                        <div class="card card-post mb-4">
                            <div class="card-body">
                                <img src="/images/{{ $post->image }}">
                                <a href="{{ route('single-post', $post) }}" title="Show post">
                                    <h4 class="post-title mt-2">
                                       {{ $post->name }}
                                    </h4>
                                </a>
                                <p class="card-text">
                                    {!! str_limit($post->content, 200) !!}
                                </p>
                                <p class="post-author">
                                    <a href="{{ route('single-author', $post->author->id) }}"  title="Show post">{{ $post->author->full_name }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-4 mt-3">
            @include('third.sidebar')
        </div>
    </div>
</div>
@endsection
