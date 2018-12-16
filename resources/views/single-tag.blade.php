@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mt-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="post-title">
                       All posts with tag: {{ $tag->name }}
                    </h2>
                </div>
            </div>
            @foreach($posts as $post)
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="post-title">
                           {{ $post->name }}
                        </h2>
                        <p class="post-meta">
                            Posted on: {{ $post->created_at->format('Y-m-d') }} by: {{ $post->author->full_name }} in <a href="{{ route('single-category', $post->category) }}"  title="Show post">{{ $post->category->name }}</a>
                        </p>
                        <p class="post-tags">
                            Tags:
                            @foreach($post->tags as $tag)
                                <a href="{{ route('single-tag', $tag) }}"  title="Show post">{{ $tag->name }}</a>
                            @endforeach
                        </p>
                        <p class="card-text">
                            {!! str_limit($post->content, 250) !!}
                        </p>
                        <a href="{{ route('single-post', $post) }}" class="btn btn-primary" title="Show post">
                            Read more
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-4 mt-3">
            @include('partials.sidebar')
        </div>
    </div>
</div>
@endsection
