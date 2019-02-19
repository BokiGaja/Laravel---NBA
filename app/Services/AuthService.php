<?php
/**
 * Created by PhpStorm.
 * User: nemanjagajic
 * Date: 2/15/19
 * Time: 9:55 PM
 */

namespace App\Services;


use App\Mail\VerifyAccount;
use App\User;
use Illuminate\Support\Facades\Mail;

class AuthService
{

    public static function login($loginData)
    {
        $loginData->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // Login, attempt will try to login with credentials (email, password)
        if (!auth()->attempt($loginData->only(['email', 'password'])))
        {
            return back()->withErrors([
                'message' => 'Wrong login credentials!'
            ]);
        }
    }

    public static function register($registerData)
    {
        // Validation
        $registerData->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);
        $verifyToken = bcrypt(str_shuffle('abcde'));
        // Remove '/' so there will be no problem when calling url
        $verifyToken = str_replace('/', '', $verifyToken);
        $data = $registerData->only([
            'email', 'name', 'password'
        ]);
        // Encryption with bcrypt helper
        $data['password'] = bcrypt($data['password']);
        $data['verify_token'] = $verifyToken;
        // Creation
        $user = User::create($data);
        Mail::to($registerData->email)->send(new VerifyAccount(
           $user->name, $verifyToken
        ));
        // Login user
        auth()->login($user);
    }
}