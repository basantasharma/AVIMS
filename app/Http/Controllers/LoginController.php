<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function showLoginPage()
    {
        return view('login');
    }
    public function startLogin(Request $request)
    {
        $request->validate([
            'email'           => 'required',
            'password'        => 'required',

        ]);

        if(auth()->guard('sub')->attempt(['email' => $request->email, 'password' => $request->password], $request->rememberme))
        {
            return redirect('/')->with('success', "Account successfully Logged in.");
        }
        elseif(\Auth::attempt($request->only('email', 'password'), $request->rememberme))
        {
            return redirect('/')->with('success', "Account successfully Logged in.");
        }
        else
        {
            return redirect()->back()->with('failed', 'Failed to Login. Bad credentials');
        }
        // if (auth()->guard('sub')->attempt(['email' => $email, 'password' => $password])) {
        //     // Company is logged in
        // }


    }

    public function logout(Request $request)
    {
        \Auth::logout(); //this is considered as leatest method
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();

        // session()->flush();
        // //\Session::flash();

        // auth()->logout();
        // //\Auth::logout();

        return redirect('/')->with('success', 'Logged Out successfully');
    }

    
}
