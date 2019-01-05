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
            @foreach($posts as $post)
                <div class="card mb-4 card-post">
                    <img class="post-image" src="/images/{{ $post->image }}" style="height: 20%;">
                    <img class="post-author" src="{{ Gravatar::src($post->author->email, 256) }}" alt="Card image cap">
                    <div class="card-body">
                        <a href="{{ route('single-post', $post) }}" title="Show post">
                            <h4 class="post-title">
                               {{ $post->name }}
                            </h4>
                        </a>
                        <p class="card-text">
                            {!! str_limit($post->content, 250) !!}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-4 mt-3">
            @include('second.sidebar')
        </div>
    </div>
</div>
@endsection
