<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
class LoginController extends Controller
{
    
    public function view()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $data = User::where('email', $request->email)->first();

        if ($data != NULL) {
            if ($data->email == $request->email && Hash::check($request->password, $data->password)) {
                return redirect()->route('article.index');
            } else {
                return redirect()->route('login');
            }
        } else {
            dd('Null Data');
        }
    }
}
