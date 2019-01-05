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
            <div class="card">
                <div class="card-body">
                    <h2 class="post-title">
                           {{ $post->name }}
                    </h2>
                    <p class="post-meta">
                        Posted on: {{ $post->created_at->format('Y-m-d') }} by: <a href="{{ route('single-author', $post->author->id) }}"  title="Show post">{{ $post->author->full_name }}</a> in <a href="{{ route('single-category', $post->category) }}"  title="Show post">{{ $post->category->name }}</a>
                    </p>
                    <p class="post-tags">
                        Tags:
                        @foreach($post->tags as $tag)
                            <a href="{{ route('single-tag', $tag) }}"  title="Show post">{{ $tag->name }}</a>
                        @endforeach
                    </p>
                    <p class="card-text post-content">
                        {!! $post->content !!}
                    </p>
                    <div class="fb-like mt-2" data-href="{{ route('single-post', ['id' => $post->id]) }}" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                    <div id="disqus_thread" class="mt-2"></div>
                    <script>
                        var disqus_config = function () {
                        this.page.url = '{{ Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = '{{ $post->id }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };
                        
                        (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = 'https://blog-builder.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-3">
            @include('second.sidebar')
        </div>
    </div>
</div>
@endsection
