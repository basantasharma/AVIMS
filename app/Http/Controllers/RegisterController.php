<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;


use Illuminate\Auth\Events\Registered;

use App\Http\Controllers\InternetPackagesController;
use App\Http\Controllers\IptvPackagesController;

class RegisterController extends Controller
{
    //
    public function showRegisterPage()
    {
        // if(\Auth::user())
        // {
        //     \Auth::logout(); //this is considered as leatest method
 
        //     $request->session()->invalidate();
     
        //     $request->session()->regenerateToken();
        // }
        $registeredInternetPackages = (new InternetPackagesController())->getInternetPackages();
        $registeredIptvPackages = (new IptvPackagesController())->getIptvPackages();
        return view('register')->with('availableInternetPackages',$registeredInternetPackages)->with('availableIptvPackages', $registeredIptvPackages);
    }

    public function startRegistration(Request $request)
    {
        // dd($request);
        $request->validate([
            'name'                  => 'required|string|max:30',
            'username'              => 'required|string|max:20',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed|min:8',
            'organization'          => 'required',
            'branch'                => 'required',
            'department'            => 'required'
        ]);



        $user = User::create([
            'name'                  => $request->name,
            'username'              => $request->username,
            'email'                 => $request->email,
            'password'              => $request->password,
            'organization'          => $request->organization,
            'branch'                => $request->branch,
            'department'            => $request->department
        ]);

        if(!is_null($user))
        {
            // event(new Registered($user));

            //now send the verification link to the user 
            // we can use mail function



            // if(\Auth::attempt($request->only('email', 'password')))
            // {
            //     return redirect('/')->with('success', "Account successfully registered.");
            
            // }
            
                return redirect('/')->with('success', "User successfully registered.");
        }
        else
        {
            return redirect()->back();

            // return view('register',[
            //     'name'            => $request->name,
            //     'username'        => $request->username,
            //     'email'           => $request->email,
            // ]); 
            //return back()->with("failed", "Alert! Failed to register");
        }
    }
    public function showSystemUserRegisterPage()
    {
        return view('registersystemuser');
    }
}
