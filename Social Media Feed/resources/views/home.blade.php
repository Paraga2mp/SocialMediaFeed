@extends('layouts.app')

@section('content')


<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
    
            <div class="card">

            <div class="card-body">
            @if (session('status'))
                <div class="alert alert-danger" role="alert">
                    {{ session('status') }}
                </div>
            @endif


             <h3>Recent Posts</h3>
             <div class="text-right">
             @if(is_object(Auth::user()))
                <a class="btn btn-info btn-sm" href="{{ route('posts.create') }}">Create New Post</a>
                </div>
            @endif

             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                
                </div>
                    <div class="">
                        @foreach($posts as $post)
                        <div class="card mb-3">
                            <img class="card-img-top" src='{{$post->image_url}}' alt="Card image cap">
                            <div class="card-body text-left">
                                <h5 class="card-title">{{$post->title}}</h5>
                                <p class="card-text">{{$post->caption}}</p>
                                <p class="card-text"><small class="text-muted">Last Updated {{$post->updated_at->diffForHumans()}}</small></p>
                                
                                <div class="btn-group" role="group">
                                @if(is_object(Auth::user()))
                                   
                                    @if( Auth::user()->id == $post->user_id)
                                    <a href="{{route('posts.edit', $post->id)}}"><button type="button" class="btn btn-info btn-sm">Edit Post</a>
                                    @endif
                                   
                                    @if( Auth::user()->id == $post->user_id  || (Auth::user()->hasRole('Moderator')) )
                                    <form action="{{route('posts.destroy', $post)}}" method="POST" class="float-left">
                                    @csrf
                                    {{method_Field('DELETE')}}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    @endif 

                                @endif  
                            </div>
                            </div>
                        </div>
                        @endforeach
                            
                        </option>     
                </div>

            </div>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection




