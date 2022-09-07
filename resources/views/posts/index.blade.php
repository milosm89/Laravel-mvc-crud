@extends('components.layout')
@extends('components.flash-message')
@section('content')


<div class="blog-wrapper">
  <h2>Posts</h2>
  @if (auth()->id())
    <div class="btn-holder">
        <a href="posts/create">Create Post</a>
    </div>
  @endif
  @if (count($posts) == 0)
    <p>Post dom't exists</p>
  @endif
  @foreach ($posts as $post)
    <div class="posts">
      <h3>{{$post->title}}</h3>
      <div class="text-wrap">
        <p>{{$post->text}}</p>
      </div>
      <p>Created at: {{date('d-m-Y', strtotime($post->created_at))}}</p>
      <a class="read-btn" href="posts/{{$post->id}}">Read</a> 
      <hr>
  </div>
  @endforeach
</div>
    
@endsection