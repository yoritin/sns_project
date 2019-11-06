@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="user-header mb-3">
                <div class="user-header-item">
                    <p>follow</p>
                    <p>{{ \App\Relationship::where('user_id', $user->id)->count() }}</p>
                </div>
                <div class="user-header-item">
                    <p>follower</p>
                    <p>{{ \App\Relationship::where('followed_user_id', $user->id)->count() }}</p>
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
                        @if (Auth::id() === 1)
                        <form action="" class="text-center mb-3">
                            <button type="submit" class="user-btn" disabled>編集できません</button>
                        </form>
                        @else
                        <form action="" class="text-center mb-3">
                            <button type="submit" class="user-btn">プロフィール編集</button>
                        </form>
                        @endif
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
                        <ul>
                            <!-- follower -->
                            @forelse($user->followed_relationships as $followed_relationship)
                            <li>{{ $followed_relationship->pivot->user_id }}</li>
                            @empty
                            <li>いないよ！</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection