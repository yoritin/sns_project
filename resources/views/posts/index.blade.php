@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @forelse($posts as $post)
            @include('layouts.post')
            @empty
            <div class="post mb-3">
                <div class="user-icon">
                    <img class="user-image" src="https://sns-project.s3-ap-northeast-1.amazonaws.com/user-icon/user_noimage.jpg" alt="noimage" width="40" height="40">
                </div>
                <div class="post-content">
                    <div class="post-header">
                        <div class="post-header-name">
                            <a href="">全てを知っている案内人</a>
                        </div>
                    </div>
                    <div class="post-body">こんにちは！ここにはフォローしたユーザーの投稿が表示されます</div>
                    <div class="post-body">新着投稿から面白いユーザーを見つけてフォローしてみましょう！</div>
                    <div class="post-body">ユーザーページへ行くとフォローできます！</div>
                    <div><a href="{{ url('/posts/new-info') }}">さっそく新着投稿を見てみる</a></div>
                    <div class="post-footer">
                        <div class="footer-icon">
                            <a href="">
                                <i class="far fa-heart"></i>
                            </a>
                        </div>
                        <div class="footer-icon">
                            <i class="far fa-comment comment-show" data-id="1"></i>
                            1
                        </div>
                        <div class="footer-time">2019-11-22 17:50:18</div>
                    </div>
                    <div class="post-footer-comment" data-id="1">
                        <div class="post-comment my-3">
                            <p>全てを知っている案内人</p>
                            <p>ここで投稿に対してコメントを追加することができます。</p>
                        </div>
                        <form>
                            <div class="form-group mt-3">
                                <textarea class="form-control" id="message-text" name="content"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">コメントする</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforelse
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection