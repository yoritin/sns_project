<div class="post mb-3">
    <div class="user-icon">
        <img class="user-image" src="/storage/user_noimage.jpg" alt="noimage" width="40" height="40">
    </div>
    <div class="post-content">
        <div class="post-header">
            <a href="{{ action('UsersController@show', $post->user_id) }}">{{ $post->user->name }}</a>
            @if (Auth::id() === $post->user_id)
            <a href="{{ action('PostsController@edit', $post) }}" class="edit">[Edit]</a>
            @endif
        </div>
        <div class="post-body">{!! nl2br(e($post->content)) !!}</div>
        <div class="post-footer">
            <div class="footer-icon"><i class="far fa-heart">12</i></div>
            <div class="footer-icon"><i class="far fa-comment"></i></div>
            <div class="footer-time">{{ $post->updated_at }}</div>
        </div>
        <div class="post-comment">
            <p>username</p>
            <p>comment 1</p>
        </div>
    </div>
</div>