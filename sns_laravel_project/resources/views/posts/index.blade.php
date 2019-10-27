@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <ul>
                <li class="post mb-3">
                    <div class="user-icon">
                        <img class="user-image" src="/storage/user_noimage.jpg" alt="noimage" width="40" height="40">
                    </div>
                    <div class="post-content">
                        <div class="post-header">username</div>
                        <div class="post-body">Hello World</div>
                        <div class="post-footer">
                            <div class="footer-icon"><i class="far fa-heart"></i></div>
                            <div class="footer-icon"><i class="far fa-comment"></i></div>
                            <div class="footer-time">2019/04/06</div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection