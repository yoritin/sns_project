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
            <div class="footer-icon"><i class="far fa-heart">12</i></div>
            <div class="footer-icon"><i class="far fa-comment" data-toggle="modal" data-target="#exampleModal"></i></div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New comment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ url('/comments') }}">
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Comment:</label>
                                    <textarea class="form-control" id="message-text"></textarea>
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Send comment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-time">{{ $post->updated_at }}</div>
        </div>
        <div class="post-comment">
            <p>username</p>
            <p>comment 1</p>
        </div>
    </div>
</div>