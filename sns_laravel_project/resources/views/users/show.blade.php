@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <ul>
                @foreach($user->posts as $post)
                @include('layouts.post')
                @endforeach
            </ul>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="user-container">
                    <div class="card-body ">
                        <img src="/storage/user_noimage.jpg" alt="user_noimage" width="250" height="250">
                    </div>
                    <div class="card-body">{{ $user->name }}</div>
                    <div class="card-body">comment</div>
                    {{ Auth::id() }} : {{ $user->id }}
                    @if (Auth::id() === $user->id)
                    <form action="" class="text-center mb-3">
                        <button type="submit" class="user-btn">プロフィール編集</button>
                    </form>
                    @else
                    <form action="" class="text-center mb-3">
                        <button type="submit" class="user-btn">フォロー ＋</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection