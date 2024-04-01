<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\InternetPackages;

class InternetPackagesController extends Controller
{
    //
    public function addInternetPackage(Request $request)
    {
        if($request['service_isactive'])
        {
            $request['service_isactive'] = true;
        }
        $request->validate([
            'service_name' => 'required|string|max:50',
            'service_isactive' => 'required|boolean|max:50',
            'service_price' => 'required|integer|max:50',
            'service_duration' => 'required|number|min:1|max:12',
            'service_upload_bandwidth' => 'required|integer|max:50',
            'service_download_bandwidth' => 'required|integer|max:50',
            'service_limit_daily' => 'required|integer|max:50',
            'service_limit_monthly' => 'required|integer|max:50',
            'service_limit_scope' => 'required|integer|max:50',
            'service_description' => 'required|string|max:250',
        ]);
        $internetPackage = InternetPackages::create($request->all());
        if($internetPackage)
        {
            return redirect()->back()->with('success', 'package added successfully');
        }
        dd($request);
    }

    public function getInternetPackages()
    {
        $packages = array();
        $registeredPackages = InternetPackages::get();
        foreach($registeredPackages as $package)
        {
            $packages[] = $package;
        }
        dd($packages);
        
    }
}
