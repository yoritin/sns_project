@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="post" action="{{ action('UsersController@show', $user) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">
                        {{ __('name') }}
                    </label>
                    <div class="col-md-6">
                        <input id="name" type="name" class="form-control" name="name" required autocomplete="name" autofocus value="{{ $user->name }}">
                        @if ($errors->has('name'))
                        <span class="error">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">
                        {{ __('email') }}
                    </label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus value="{{ $user->email }}">
                        @if ($errors->has('email'))
                        <span class="error">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">
                        {{ __('password') }}
                    </label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" autocomplete="password" autofocus>
                        @if ($errors->has('password'))
                        <span class="error">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('更新') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection