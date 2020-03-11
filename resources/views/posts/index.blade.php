@extends('layouts.app')

@section('content')

<section class="posts-section">

    @auth <a href="/posts/create">Create a new post</a>  @endauth

    @foreach($posts as $post)


    <div class="post">
    
        <div class="post-header">
            <a href=/posts/{{ $post->id }}><h2>{{$post->title}}</h2></a>
            <p class="text">Posted by <a href=/posts/author/{{$post->user->id}} >{{$post->user->name}}</a> on {{$post->created_at}} |  {{$post->comments->count()}} comments </p> 
        </div>

        <div class="post-body">
            <p>{{$post->description}}</p>
        </div>

        <div class="post-footer">
            <p class="text">Posted in <a href=/posts/{{$post->category}} >{{$post->category}}</a> |</p> 
        </div>
    
    </div>

    @endforeach

    {{$posts->links()}}

</section>

@endsection



