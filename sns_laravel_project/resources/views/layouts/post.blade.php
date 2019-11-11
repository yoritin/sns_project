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
                    <a class="dropdown-item" href="#">削除する</a>
                </div>
            </div>
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