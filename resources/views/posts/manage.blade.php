@extends('components.layout')

@section('content')
<div class="manage-wrap">
    <h3>Manage Posts</h3>
    @if (count($posts) == 0)
        <h2>You don't have created post yet!</h2>
    @endif
    @foreach ($posts as $post)
    <div class="info-holder">
        <div class="text-holder">
           <p>{{$post->title}}</p> 
        </div>
        <div class="button-wrap">
            <div class="edit-holder">
                <a href="/posts/{{$post->id}}/edit">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                    Edit
                </a>
            </div>
            <div class="delete-holder">
                <form method="POST" action="/posts/{{$post->id}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn-red">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection