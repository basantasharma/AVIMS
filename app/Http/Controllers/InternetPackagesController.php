<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'service_duration' => 'required|string|max:50',
            'service_upload_bandwidth' => 'required|integer|max:50',
            'service_download_bandwidth' => 'required|integer|max:50',
            'service_limit_daily' => 'required|integer|max:50',
            'service_limit_monthly' => 'required|integer|max:50',
            'service_limit_scope' => 'required|integer|max:50',
            'service_description' => 'required|string|max:250',
        ]);
        dd($request);
    }
}
