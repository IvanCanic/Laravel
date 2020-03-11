@extends('layouts.app')

@section('content')

<section class="posts-section">


    <div class="post">
    
        <div class="post-header">
            <h2>{{$post->title}}</h2>
            <p class="text">Posted by <a href=/posts/author/{{$post->user->id}} >{{$post->user->name}}</a> on {{$post->created_at}} | {{$post->comments->count()}} comments </p> 
        </div>

        <div class="post-body">
            <p>{{$post->description}}</p>
        </div>

        <div class="post-footer">
            <p class="text">Posted in <a href=/posts/{{$post->category}} >{{$post->category}}</a> |</p>

            <div class="btn-container">

                    @auth

                    <a class="btn-edit" href={{ $post->id}}/edit class="edit-post" >Edit your post</a>
                    <form action={{$post->id}} method="POST">

                    @csrf 

                    @method('DELETE')

                        <input type="submit" value="Delete your post">

                    </form>

                    @endauth


            </div>

            
        </div>
    
    </div>

    <div class="comments">
        @foreach ($comments as $comment)

        <div class="comment">
            <h5>Posted by {{$comment->nickname}} on <span>{{$comment->created_at}}</span></h5>
            
            <p>{{$comment->comment}}</p>
        </div>
         
        @endforeach
    </div>

    <div class="make-comment">
        <form action=/posts/comment/{{$post->id}} method="POST">

        @csrf
        
            <div class="f">
                <label for="nickname">Nickname</label>
                <input type="text" name="nickname" id="nickname" value={{ old('nickname')}}>
                @error('nickname') <div class="errorfield"> {{ $message }} </div> @enderror
            </div>
            <div class="f">
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment" cols="30" rows="10">{{ old('comment')}}</textarea>
                @error('comment') <div class="errorfield"> {{ $message }} </div> @enderror
            <div class="f">
                <input type="submit" id="submite-comment" value="Make a comment...">
            </div>

        </form>
    </div>

    <a class="back-button" href="/posts">Back to the posts</a>

</section>

@endsection
