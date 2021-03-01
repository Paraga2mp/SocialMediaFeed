@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Theme Details') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Name: {{$theme->name}}</p>
                    <p>Email: {{$theme->cdn_url}}</p>
                    
                    </p>
                    @if(Route::has('themes.index'))
                        <a class="btn btn-info" href="{{route('themes.index')}}">Back to Themes</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
