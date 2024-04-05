<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Nas;

class NasRegistrationController extends Controller
{
    //
    public function showRegisternasPage()
    {
        // if(\Auth::user())
        // {
        //     \Auth::logout(); //this is considered as leatest method
 
        //     $request->session()->invalidate();
     
        //     $request->session()->regenerateToken();
        // }
        return view('registernas');
    }
    
    public function registerNas()
    {
        $request->validade([
            'nasname' => 'required',
            'shortname' => 'required',
            'secret' => 'required'
        ]);
        $nas = Nas::create($request->all());
        if($nas)
        {
            return redirect()->back()->with('success', 'Nas added successfully');
        }
        else
        {
            return redirect()->back()->with('failed', 'Failed to add Nas')->withInput();
        }
    }
}
