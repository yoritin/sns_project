@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @foreach($posts as $post)
            @include('layouts.post')
            @endforeach
        </div>
    </div>
</div>
@endsection