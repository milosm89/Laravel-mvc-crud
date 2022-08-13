@extends('components.layout')
@section('content')
<div class="wrapper">
    <div class="index-login-login">
        <h4>LOGIN</h4>
        <form method="POST" action="/users/authenticate">
            @csrf
            <input type="text" name="email" placeholder="Email">
            @error('email')
            <p>{{$message}}</p>
            @enderror
            <input type="password" name="password" placeholder="Password">
            <br>
            <button type="submit" name="submit">LOGIN</button>
        </form>
        <p>
            Don't have account
            <a href="/register">Register</a>
        </p>
    </div>  
</div>
@endsection