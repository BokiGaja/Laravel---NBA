<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['logout']]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('show-login');
    }

    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        AuthService::login($request);
        return redirect()->route('show-teams');
    }
}
