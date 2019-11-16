<div class="post mb-3">
    <div class="user-icon">
        <img class="user-image" src="/storage/user_noimage.jpg" alt="noimage" width="40" height="40">
    </div>
    <div class="post-content">
        <div class="post-header">
            <div class="post-header-name">
                <a href="{{ action('UsersController@show', $post->user_id) }}">{{ $post->user->name }}</a>
            </div>

            @if (Auth::id() === $post->user_id)
            <div class="post-header-menu dropdown show">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    menu<span class="caret"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ action('PostsController@edit', $post) }}">編集する</a>
                    <form method="post" action="{{ url('posts', $post->id) }}">
                        @csrf
                        <input type="hidden" value="delete" name="_method">
                        <button class="dropdown-item" type="submit">
                            削除する
                        </button>
                    </form>
                </div>
            </div>
            @endif
        </div>
        <div class="post-body">{!! nl2br(e($post->content)) !!}</div>
        <div class="post-footer">
            <div class="footer-icon">
                @guest
                <i class="far fa-heart"></i>
                {{ \App\Like::where('post_id', $post->id)->count() }}
                @else
                    @if(Auth::id() === \App\Like::where('user_id', Auth::id())->where('post_id', $post->id)->first()['user_id'])
                    <i class="fas fa-heart red"></i>
                    {{ \App\Like::where('post_id', $post->id)->count() }}
                    @else
                    <form method="post" action="{{ url('/likes') }}">
                        @csrf
                        <input type="hidden" value="{{ $post->id }}" name="post_id">
                        <button type="submit"><i class="far fa-heart"></i></button>
                        {{ \App\Like::where('post_id', $post->id)->count() }}
                    </form>
                    @endif
                @endguest
            </div>
            <div class="footer-icon">
                <i class="far fa-comment comment-show" data-id="{{ $post->id }}"></i>
                {{ App\Comment::where('post_id', $post->id)->count() }}
            </div>
            <div class="footer-time">{{ $post->updated_at }}</div>
        </div>
        <div class="post-footer-comment" data-id="{{ $post->id }}">
            @foreach($post->comments as $comment)
            <div class="post-comment my-3">
                <p>{{ $comment->user->name }}</p>
                <p>{{ $comment->content }}</p>
            </div>
            @endforeach
            <form method="post" action="{{ url('/comments') }}">
                @csrf
                <div class="form-group mt-3">
                    <input type="hidden" value="{{ $post->id }}" name="post_id">
                    <textarea class="form-control" id="message-text" name="content"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Send comment</button>
            </form>
        </div>
    </div>
</div>