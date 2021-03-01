@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Details') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Name: {{$user->name}}</p>
                    <p>Email: {{$user->email}}</p>
                    <p>Current Roles:
                    @foreach($user->roles as $role)
                        {{$role->name}}
                    @endforeach
                    </p>
                    @if(Route::has('users.index'))
                        <a class="btn btn-info" href="{{route('users.index')}}">Back to Users</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
