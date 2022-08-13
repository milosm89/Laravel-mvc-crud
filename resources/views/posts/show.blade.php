@extends('components.layout')
@section('content')

<div class="post-wrapper">
    <h2>{{$post->title}}</h2>
    <p>{{$post->text}}</p>
    <p>created at: {{date('d-m-Y', strtotime($post['created_at'])) }} </p>
</div>
    
@endsection
