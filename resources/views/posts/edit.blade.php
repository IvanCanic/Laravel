@extends('layouts.app')

@section('content')


<section id="createpost">

    <Form action=/posts/{{ $post->id}} method="POST">

    @csrf

    @method('PATCH')

        <div class="f">
            <label for="title" >Title</label>
            <input type="text" name="title" id="title" value={{ $post->title }}>
            @error('title') <div class="errorfield"> {{ $message }} </div> @enderror
        </div>
        <div class="f">
            <label for="category">Category</label>
            <select id="category" name="category">
                <option value="movie">Movie</option>
                <option value="tvshow">Tv Show</option>
        </select>
        </div>
        <div class="f">
            <label for="description">Post body</label>
            <textarea name="description" id="description" cols="30" rows="10" >

             {{ $post->description }}    

            </textarea>
            @error('description') <div class="errorfield"> {{ $message }} </div> @enderror
        </div>
        <div class="f">
            <input type="submit" value="Update your post">
        </div>
       
    </Form>

</section>

@endsection