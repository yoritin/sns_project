@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
                <form method="post" action="{{ url('/') }}">
                    @csrf
                    {{ method_field('patch') }}
                    <div class="form-group row">
                        <label for="content" class="col-md-4 col-form-label text-md-right">
                            {{ __('content') }}
                        </label>
                        <div class="col-md-6">
                            <input type="hidden" name="id" value="{{ $post->id }}">
                            <textarea id="content" type="text" class="form-control" name="content" requred autocomplete="current-text" cols="30" rows="10">{{ $post->content }}</textarea>
                            @if ($errors->has('content'))
                            <span class="error">{{ $errors->first('content') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection