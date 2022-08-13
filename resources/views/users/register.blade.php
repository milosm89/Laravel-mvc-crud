@extends('components.layout')
@section('content')
<div class="wrapper">
    <div class="index-login-signup">
        <h4>SIGN UP</h4>
        <form method="POST" action="/users">
            @csrf
            <input type="text" name="name" placeholder="Username">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="password_confirmation" placeholder="Repeat Password">
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