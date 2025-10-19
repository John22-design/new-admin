<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class LoginBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login-basic');
  }

  public function login(Request $request)
  {
    // Validate the request
    $validator = Validator::make($request->all(), [
      'email-username' => 'required|string',
      'password' => 'required|string|min:6',
    ]);

    if ($validator->fails()) {
      return back()
        ->withErrors($validator)
        ->withInput($request->except('password'));
    }

    $loginField = $request->input('email-username');
    $password = $request->input('password');

    // Determine if login field is email or username
    $fieldType = filter_var($loginField, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

    // Attempt to authenticate the user
    $credentials = [
      $fieldType => $loginField,
      'password' => $password
    ];

    if (Auth::attempt($credentials, $request->has('remember-me'))) {
      // Authentication passed
      $request->session()->regenerate();

      // Redirect to intended page or dashboard
      return redirect()->intended('/dashboard')->with('success', 'Welcome back!');
    }

    // Authentication failed
    return back()
      ->withErrors(['email-username' => 'The provided credentials do not match our records.'])
      ->withInput($request->except('password'));
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/auth/login')->with('success', 'You have been logged out successfully.');
  }
}
