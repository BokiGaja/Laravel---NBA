<?php

namespace App\Http\Controllers;
use App\Services\AuthService;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'store', 'verify']]);
    }
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        AuthService::register($request);
        return redirect()->route('show-teams');

    }

    public function verify($token)
    {
            User::where('verify_token', $token)->update(array('email_verified_at' => now()));
            session()->flash('message', 'You have verified your account');
            return redirect()->route('show-login');
    }
}
