@extends('components.layout')

@section('content')
<div class="create-wrapper">
    <h4>Edit Post</h4>
    <form method="POST" action="/posts/{{$post->id}}">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{$post->title}}">
        <textarea name="text">{{$post->text}}</textarea>
        <br>
        <button type="submit" name="submit">Edit post</button>
    </form>
</div>
@endsection
	