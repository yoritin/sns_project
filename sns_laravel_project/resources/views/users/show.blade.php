@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="user-header mb-3">
                <div class="user-header-item">
                    <p>follow</p>
                    <p>12</p>
                </div>
                <div class="user-header-item">
                    <p>follower</p>
                    <p>12</p>
                </div>
                <div class="user-header-item">
                    <p>like</p>
                    <p>12</p>
                </div>
            </div>
            @foreach($user->posts as $post)
            @include('layouts.post')
            @endforeach
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="user-container">
                    <div class="card-body ">
                        <img src="/storage/user_noimage.jpg" alt="user_noimage" width="250" height="250">
                    </div>
                    <div class="card-body-name">{{ $user->name }}</div>
                    <div class="card-body">comment</div>
                    @if (Auth::id() === $user->id)
                    <form action="" class="text-center mb-3">
                        <button type="submit" class="user-btn">プロフィール編集</button>
                    </form>
                    @else
                    <form method="post" action="{{ url('/relationship') }}" class="text-center mb-3">
                        @csrf
                        <p>{{ Auth::id() }} : {{ $user->id }}</p>
                        <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                        <input type="hidden" value="{{ $user->id }}" name="followed_user_id">
                        <button type="submit" class="user-btn">フォロー ＋</button>
                    </form>
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
    </div>
</div>
@endsection