@extends('layouts.app')

@section('content')
<div class="container">

    @foreach($posts as $post)
        <div class="card" style="margin-top: 25px;">
            <div class="card-body">
                <h4 class="card-title">
                    Post title: {{ $post->name }}
                </h4>
                <hr>
                <p class="card-text">
                    Category: {{ $post->category->parents }}
                </p>
                <hr>
                <p class="card-text">
                    Author: {{ $post->author->full_name }}
                </p>
                <hr>
                <p class="card-text">
                    Status: {{ $post->status_name }}
                </p>
                <hr>
                <p class="card-text">
                    Tags:
                    @foreach($post->tags as $tag)
                        {{ $tag->name }}
                    @endforeach
                </p>
                <hr>
                <a href="{{ route('single-post', $post) }}" class="btn btn-primary" title="Edit">
                    Read more
                </a>
            </div>
        </div>
    @endforeach

    <div class="card mt-4">
        <div class="card-body">
            <div class="row">
                <div class="col-3">Sign to newsletter!</div>
                <div class="col-9">
                    {{ Form::open(['route' => 'newsletter.subscribe']) }}
                        <div class="row">
                            <div class="col-9">
                                {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail adress', 'required' => true]) }}
                            </div>
                            <div class="col-3">
                                {{ Form::submit('Sign', ['class' => 'btn btn-outline-secondary btn-block']) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    @if($facebook || $instagram || $owner)
        <div class="card mt-4">
            <div class="card-body">
                <div class="row">
                    @isset($facebook)
                        <div class="col">
                            <div class="fb-page" data-href="{{ $facebook }}" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="{{ $facebook }}" class="fb-xfbml-parse-ignore"><a href="{{ $facebook }}">Facebook</a></blockquote></div>
                        </div>
                    @endisset
                    @isset($instagram)
                        <div class="col">
                            <iframe width="320" height="560" src="{{ $instagram }}" frameborder="0"></iframe>
                        </div>
                    @endisset
                    @isset($owner)
                        @if(Gravatar::exists($owner->email))
                            <div class="col">
                                <img src="{{ Gravatar::src($owner->email, 256) }}">
                            </div>
                        @endif
                    @endisset
                </div>
            </div>
        </div>
    @endif

</div>
@endsection
