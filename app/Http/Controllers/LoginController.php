<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/article/list';
    public function view()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $userdata = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (User::where('email', $userdata['email'])->first()->password === $userdata['password']) {
            return true;
        } else {
            return redirect('login');
        }
    }
}
