@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="user-container">
                    <div class="card-body">
                        @if($user->image_path === null)
                        <img src="https://sns-project.s3-ap-northeast-1.amazonaws.com/user-icon/user_noimage.jpg" alt="user_noimage" width="277" height="277">
                        @else
                        <img src="{{ $user->image_path }}" alt="user_noimage" width="277" height="277">
                        @endif
                    </div>
                    <div class="card-body-name">{{ $user->name }}</div>
                    <div class="card-body">{{ $user->comment }}</div>
                    @if (Auth::id() === $user->id)
                    <div class="text-center mb-3">
                        <button type="button" class="user-btn mb-3" data-toggle="modal" data-target="#exampleModal">
                            プロフィール編集
                        </button>
                        <div>

                            @if (Auth::id() === 1)
                            <button class="user-btn" onclick="location.href='{{ action('UsersController@edit', Auth::id()) }}'">
                                {{ __('ユーザー設定') }}
                            </button>
                            <p>テストユーザーは設定出来ません</p>
                            @else
                            <button class="user-btn" onclick="location.href='{{ action('UsersController@edit', Auth::id()) }}'">
                                {{ __('ユーザー設定') }}
                            </button>
                            @endif
                        </div>
                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">プロフィール編集</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ url('/profile') }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <div class="form-group">
                                            <label for="post-user-icon" class="col-form-label">ユーザーアイコン</label>
                                            <input type="file" class="form-control" id="post-user-icon" name="image">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">自己紹介</label>
                                            <textarea class="form-control" id="message-text" name="comment">{{ $user->comment }}</textarea>
                                        </div>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                        <button type="submit" class="btn btn-primary">更新</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                        <!-- users.showの$user->idとrelationshipテーブルのfollowed_user_idが同じであればフォロー解除ボタンを表示する -->
                        @if($user->id === \App\Relationship::where('user_id', Auth::id())->where('followed_user_id', $user->id)->first()['followed_user_id'])
                        <form method="post" action="{{ url('/relationship') }}" class="text-center mb-3">
                            @csrf
                            <input type="hidden" value="delete" name="_method">
                            <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                            <input type="hidden" value="{{ $user->id }}" name="followed_user_id">
                            <button type="submit" class="user-btn">フォロー解除</button>
                        </form>
                        @else
                        <form method="post" action="{{ url('/relationship') }}" class="text-center mb-3">
                        @csrf
                            <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                            <input type="hidden" value="{{ $user->id }}" name="followed_user_id">
                            <button type="submit" class="user-btn">フォロー ＋</button>
                        </form>
                        @endif
                    @endif
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">follow</div>
                                <div class="card-count">{{ \App\Relationship::where('user_id', $user->id)->count() }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">follower</div>
                                <div class="card-count">{{ \App\Relationship::where('followed_user_id', $user->id)->count() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="d-none d-md-block user-border mb-3">
                <div class="user-header row">
                    <div class="user-header-item col-sm-3">
                        <p class="text">投稿数</p>
                        <p class="count">{{ \App\Post::where('user_id', $user->id)->count() }}</p>
                    </div>
                    <div class="user-header-item col-sm-3">
                        <p class="text">フォロー</p>
                        <p class="count">{{ \App\Relationship::where('user_id', $user->id)->count() }}</p>
                    </div>
                    <div class="user-header-item col-sm-3">
                        <p class="text">フォロワー</p>
                        <p class="count">{{ \App\Relationship::where('followed_user_id', $user->id)->count() }}</p>
                    </div>
                    <div class="user-header-item col-sm-3">
                        <p class="text">いいね！</p>
                        <p class="count">{{ \App\Like::where('user_id', $user->id)->count() }}</p>
                    </div>
                </div>
            </div>
            @foreach($user->posts()->orderBy('created_at', 'desc')->get() as $post)
            @include('layouts.post')
            @endforeach
        </div>
    </div>
</div>
@endsection