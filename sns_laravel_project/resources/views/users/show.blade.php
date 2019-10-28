@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <ul>

                <!-- if (Auth::id と {user_id} が一致したら)))) -->
                    <!-- フォローしたユーザーのpost -->
                <!-- else -->
                    <!-- それぞれのユーザーのユーザーのpost -->

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
                    <div class="card-body">{{ Auth::id() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection