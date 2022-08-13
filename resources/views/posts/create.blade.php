@extends('components.layout')

@section('content')
<div class="create-wrapper">
    <h4>Create Post</h4>
    <form method="POST" action="/posts">
        @csrf
        <input type="hidden" name="user_id" value="1">
        <input type="text" name="title" placeholder="Enter tht title">
        @error('title')
        <p class="error">{{$message}}</p>
        @enderror
        <textarea name="text" placeholder="Write the text"></textarea>
        @error('text')
        <p class="error">{{$message}}</p>
        @enderror
        <br>
        <button type="submit" name="submit">Create post</button>
    </form>
</div>
@endsection
	