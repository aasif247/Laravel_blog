<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function register_post(Request $request)
	{
    	     $validatedData = $request->validate([
        	'name' => 'required',
        	'password' => 'required|min:5',
            'confirmpassword' => 'required|min:5',
        	'email' => 'required|email|unique:users'
    	     ], [
        	'name.required' => 'Name is required',
        	'password.required' => 'Password is required'
    	     ]);
 
    	     $validatedData['password'] = bcrypt($validatedData['password']);
    	     $user = User::create($validatedData);

    	     Auth::login($user);
  	 
    	     return redirect()->route('dashboard');
	}
    
    public function login()
    {
        return view('auth.login');
    }

    public function login_post(Request $request)
	{
    	      $credentials = $request->only('email', 'password');
    	      $remember = $request->input('remember');

    	      if (Auth::attempt($credentials, $remember)) {
        	     $request->session()->regenerate();

        	     return redirect()->route('dashboard');
    	      }

    	      return redirect()->back()
              ->withErrors(['invalid' =>'The email & password is wrong'])
              ->withInput($request->only('email', 'remember'));
	}


    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('auth/login');
}
}
