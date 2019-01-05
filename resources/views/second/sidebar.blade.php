@if($owner || $facebook || $instagram || $latestPosts->isNotEmpty())
    <div class="card card-sidebar">
        <div class="card-body">
            <div class="row">
                @if($latestPosts->isNotEmpty())
                    <div class="col-12">
                        <div class="card" style="width: 100%;">
                            <div class="card-body card-body-sidebar">
                                <h5 class="card-title">Latest posts:</h5>
                                @foreach($latestPosts as $post)
                                    <li class="sidebar-list">
                                        <a href="{{ route('single-post', $post) }}"  title="Show post">
                                            {{ $post->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="card" style="width: 100%;">
                            <div class="card-body card-body-sidebar">
                                <h5 class="card-title">Categories:</h5>
                                @foreach($categories as $category)
                                    @if($category->posts->count() > 0)
                                        <li class="sidebar-list">
                                            <a href="{{ route('single-category', $category) }}"  title="Show post">
                                                {{ $category->name }} ({{ $category->posts_counter }})
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                @isset($facebook)
                    <div class="col-12 mt-4">
                        <div class="fb-page social" data-href="{{ $facebook }}" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="{{ $facebook }}" class="fb-xfbml-parse-ignore"><a href="{{ $facebook }}">Facebook</a></blockquote></div>
                    </div>
                @endisset
                @isset($instagram)
                    <div class="col-12 mt-4">
                        <iframe class="social" height="520" src="{{ $instagram }}" frameborder="0"></iframe>
                    </div>
                @endisset
                @if($latestPosts->isNotEmpty())
                    <div class="col-12 mt-4">
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title">Sign to newsletter!</h5>
                                {{ Form::open(['route' => 'newsletter.subscribe']) }}
                                    {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail adress', 'required' => true]) }}
                                    {{ Form::submit('Sign', ['class' => 'btn btn-primary btn-block mt-2']) }}
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endif