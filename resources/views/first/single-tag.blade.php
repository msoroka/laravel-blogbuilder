@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">{{ $title }}</h1>
        <p class="lead">{{ $description}}</p>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="post-title">
                       All posts with tag: {{ $tag->name }}
                    </h2>
                </div>
            </div>
            @foreach($posts as $post)
                <div class="card mb-4 card-post">
                    <div class="row">
                        <div class="col-4">
                            <img src="/images/{{ $post->image }}" height="1555px">
                        </div>
                        <div class="col">
                            <div class="card-block">
                                <a href="{{ route('single-post', $post) }}" title="Show post">
                                   <h3 class="post-title">
                                        {{ $post->name }}
                                    </h3>
                                </a>
                                <p class="post-tags">
                                    Tags:
                                    @foreach($post->tags as $tag)
                                        <a href="{{ route('single-tag', $tag) }}"  title="Show post">{{ $tag->name }}</a>
                                    @endforeach
                                </p>
                                <p class="card-text">
                                    {!! str_limit($post->content, 250) !!}
                                </p>
                                <p class="post-meta">
                                    {{ $post->author->full_name }}, {{ $post->created_at->format('d F Y') }}, <a href="{{ route('single-category', $post->category) }}"  title="{{ $post->category->name }}">{{ $post->category->name }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-4">
            @include('first.sidebar')
        </div>
    </div>
</div>
@endsection
