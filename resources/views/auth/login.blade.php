@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('login') }}" class="row">
                @csrf
                <div class="form-border col-md-6 offset-md-3">
                    <p class="my-3 form-title">{{ __('ログイン') }}</p>
                    <div class="form-group">
                        <label for="email" class="col-form-label text-md-right">{{ __('メールアドレス') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label text-md-right">{{ __('パスワード') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                            <label class="form-check-label" for="remember">
                                {{ __('ログインを記憶') }}
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            {{ __('ログイン') }}
                        </button>
                        <div>
                            <a href="{{ url('/register') }}">アカウントをお持ちでない方はこちら</a>
                        </div>
                    </div>
                    <div class="form-group">
                        
                    </div>
                </div>
            </form>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input value="testuser@example.com" id="email" type="hidden" name="email">
                <input value="testuser" id="password" type="hidden" name="password">
                <input type="hidden" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <div class="form-group row mb-0 mt-3">
                    <div class="col-md-6 offset-md-3">
                        <button type="submit" class="btn btn-primary">
                            {{ __('簡単ログイン') }}
                        </button>
                        <p>※テストユーザーとしてログインできます。</p>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
