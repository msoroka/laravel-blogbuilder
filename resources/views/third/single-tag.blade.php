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
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="post-title">
                       All posts with tag: {{ $tag->name }}
                    </h2>
                </div>
            </div>
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
                                    {{ $post->author->full_name }}
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
