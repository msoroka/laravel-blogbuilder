@extends('layouts.app')

@section('content')
<div class="container">
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
            <p class="card-text">
                Content: {!! $post->content !!}
            </p>
            <div id="disqus_thread"></div>
            <script>

            /**
            *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
            *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
            
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
@endsection
