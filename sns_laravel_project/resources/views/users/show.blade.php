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
    </div>
</div>
@endsection