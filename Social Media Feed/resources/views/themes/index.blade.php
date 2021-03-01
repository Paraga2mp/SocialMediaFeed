@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Manage Themes') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-info btn-sm" href="{{ route('themes.create') }}">Create New Theme</a>

                   <table class="table table-hover">
                   <thead>
                   <tr>
                    <th scope="col">ThemeID</th>
                    <th scope="col">Name</th>
                    <th scope="col"></th>
                   </tr>
                   </thead>
                   <tbody>
                    @foreach($themes as $theme)
                        <tr>
                            <th scope="row">{{ $theme->id }}</th>
                            <td>{{$theme->name}}</td>
                        <td>
                        @if(Route::has('themes.show'))
                            <a class="btn btn-info btn-sm" href="{{ route('themes.show', $theme->id) }}">Show</a>
                            <a class="btn btn-info btn-sm" href="{{ route('themes.edit', $theme->id) }}">Edit</a>
                        @endif
                        <form action="{{route('themes.destroy', $theme->id)}}" method="POST" style="...">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        </td>
                        </tr>
                    
                    @endforeach
                   </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
