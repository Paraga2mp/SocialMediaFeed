@extends('layouts.app')

@section('content')



<!-- @foreach($users as $user)
    @foreach($user->roles as $role)

        @if($role->name != 'User Administrator')
         return redirect()->route('login');
        @endif

    @endforeach
@endforeach -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Administrative Users') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-info btn-sm" href="{{ route('users.create') }}">Create New Admin User</a>

                   <table class="table table-hover">
                   <thead>
                   <tr>
                    <th scope="col">UserID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Roles</th>
                    <th scope="col"></th>
                   </tr>
                   </thead>
                   <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                        <td>
                        
                        @foreach($user->roles as $role)
                            <label class="badge badge-success">{{$role->name}}</label>
                            <!-- @if($role->name != 'User Administrator')
                                return redirect('login');
                            @endif -->
                        @endforeach
                        </td>
                        <td>
                        @if(Route::has('users.show'))
                            <a class="btn btn-info btn-sm" href="{{ route('users.show', $user->id) }}">Show</a>
                            <a class="btn btn-info btn-sm" href="{{ route('users.edit', $user->id) }}">Edit</a>
                        @endif
                        <form action="{{route('users.destroy', $user->id)}}" method="POST" style="...">
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
