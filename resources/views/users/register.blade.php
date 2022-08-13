@extends('components.layout')
@section('content')
<div class="wrapper">
    <div class="index-login-signup">
        <h4>SIGN UP</h4>
        <form method="POST" action="/users">
            @csrf
            <input type="text" name="name" placeholder="Username">
            @error('name')
            <p class="error">{{$message}}</p>
            @enderror
            <input type="text" name="email" placeholder="Email">
            @error('email')
            <p class="error">{{$message}}</p>
            @enderror
            <input type="password" name="password" placeholder="Password">
            @error('password')
            <p class="error">{{$message}}</p>
            @enderror
            <input type="password" name="password_confirmation" placeholder="Repeat Password">
            @error('password_confirmation')
            <p class="error">{{$message}}</p>
            @enderror
            <br>
            <button type="submit" name="submit">SIGN UP</button>
        </form>
        <p>
            You alreday have account?
            <a href="/login">Login</a>
        </p>
    </div> 
</div>
@endsection