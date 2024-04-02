<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\IptvPackages;

class IptvPackagesController extends Controller
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
            'no_of_HD_channels' => 'required|integer',
            'no_of_SD_channels' => 'required|integer',
            'service_description' => 'required|string|max:250',
        ]);
        $iptvPackage = IptvPackages::create($request->all());
        if($iptvPackage)
        {
            return redirect()->back()->with('success', 'package added successfully');
        }
        else
        {
            return redirect()->back()->with('failed', 'sorry data packages cannot be added')->withInput();
        }
        // dd($request);
    }

    public function getIptvPackages()
    {
        $packages = array();
        $registeredPackages = IptvPackages::get();
        foreach($registeredPackages as $package)
        {
            $packages[] = $package;
        }
        return $packages;
        // dd($packages);
        
    }
}
