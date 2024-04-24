<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\InternetPackages;

class InternetPackagesController extends Controller
{
    //
    public function addInternetPackage(Request $request)
    {
        $request['created_by'] = auth()->user()->username;
        $request['updated_by'] = auth()->user()->username;
        if($request['service_isactive'])
        {
            $request['service_isactive'] = true;
        }
        else
        {
            $request['service_isactive'] = false;
        }
        $request->validate([
            'service_name' => 'required|string|max:50',
            'service_isactive' => 'required|boolean',
            'service_price' => 'required|integer',
            'service_duration' => 'required|integer|min:1|max:12',
            'service_upload_bandwidth' => 'required|integer',
            'service_download_bandwidth' => 'required|integer',
            'service_limit_daily' => 'required|integer',
            'service_limit_monthly' => 'required|integer',
            'service_limit_scope' => 'required|integer',
            'service_description' => 'required|string|max:250',
        ]);
        $internetPackage = InternetPackages::create($request->all());
        if($internetPackage)
        {
            return redirect()->back()->with('success', 'package added successfully');
        }
        else
        {
            return redirect()->back()->with('failed', 'sorry data packages cannot be added')->withInput();
        }
        // dd($request);
    }

    public function getInternetPackages()
    {
        $packages = array();
        $registeredPackages = InternetPackages::get()->where('created_by', \Auth::user()->organization);
        foreach($registeredPackages as $package)
        {
            $packages[] = $package;
        }
        return $packages;
        // dd($packages);
        
    }
    public function getInternetPackageById($id)
    {
        $package = array();
        $registeredPackage = InternetPackages::get()->where('created_by', \Auth::user()->organization)->where('id', $id);
        // dd($registeredPackages);
        // foreach($registeredPackage as $package)
        // {
        //     $packages[] = $package;
        // }
        return $registeredPackage;
        // dd($packages);
        
    }

}
