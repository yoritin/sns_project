@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <ul>
                @foreach($posts as $post)
                @include('layouts.post')
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection