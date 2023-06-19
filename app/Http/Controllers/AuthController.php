<?php

namespace App\Http\Controllers;

use session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\AuthSignInRequest;
use App\Http\Requests\Auth\AuthSignUpRequest;

class AuthController extends Controller
{
  public function index()
  {
    $data = [
      'title' => 'SPK Pemilihan Course Web Programming | Sign In',
    ];

    return view('auth.signin', $data);
  }

  public function signUp()
  {
    $data = [
      'title' => 'SPK Pemilihan Course Web Programming | Sign Up',
    ];

    return view('auth.signup', $data);
  }

  public function store(AuthSignUpRequest $request)
  {
    $validate = $request->validated();

    $validate['password'] = Hash::make($validate['password']);

    User::create($validate);

    return redirect('/login')->with('success', 'Your account has been created!');
  }

  public function authenticate(AuthSignInRequest $request)
  {
    $credentials = $request->validated();

    // autentikasi user
    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      return redirect()->intended('/dashboard');
    }

    // sign in gagal
    return back()->with('failed', "Sign in failed, please try again");
  }

  public function signOut(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login')->with('success', 'You have been logged out!');

    // Auth::logout();
    //     $request -> session()-> invalidate();
    //     $request -> session()-> regenerate();

    //     return redirect('/');
  }
}
