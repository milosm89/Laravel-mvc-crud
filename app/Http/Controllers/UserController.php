<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // Show Login Form
    public function login() {
        return view('users.login');
    }
    // Show Create Form
    public function create() {
        return view('users.register');
    }
    // Store New User
    public function store(Request $request) {
  
        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        //Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create user
        $user = User::create($formFields);

        // Login
        auth()->login($user);
        return redirect('/')->with('message', 'User created and logged in!');
    }
    //Logout User 
    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have been logged out!');
    }
    // Authenticate User 
    public function authenticate(Request $request) {
        $formFields = $request->validate([

            'email' => 'required',
            'password' => 'required'
        ]);
 
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function destroy(Request $request, $id) {

        $users = User::find($id);
        $data = $users->posts;
        foreach ($data as $key) {
            $key->delete();
        }
        $users->delete();
        auth()->logout();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'User deleted successfully!');
    }
}
