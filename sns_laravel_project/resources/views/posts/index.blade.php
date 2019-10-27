@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <ul>
                @foreach($posts as $post)
                <li class="post mb-3">
                    <div class="user-icon">
                        <img class="user-image" src="/storage/user_noimage.jpg" alt="noimage" width="40" height="40">
                    </div>
                    <div class="post-content">
                        <div class="post-header">
                            <a href="{{ action('UsersController@show', $post->user_id) }}">{{ $post->user->name }}</a>
                        </div>
                        <div class="post-body">{!! nl2br(e($post->content)) !!}</div>
                        <div class="post-footer">
                            <div class="footer-icon"><i class="far fa-heart"></i></div>
                            <div class="footer-icon"><i class="far fa-comment"></i></div>
                            <div class="footer-time">{{ $post->updated_at }}</div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection