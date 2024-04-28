<?php

namespace App\Http\Controllers;

use App\Models\SubscribersDetails;
// use App\Models\User;


use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function viewAllUsers(Request $request) 
    {
        $organization = auth()->user()->organization;
        if($organization == 'astavision'){
            $userDetails = \DB::select('SELECT sd.id, sd.subscriber_username, sd.phone_number, sd.lead_organization, ss.service_table_name, ss.expires_at, ip.service_upload_bandwidth, ip.service_download_bandwidth FROM subscribers_details sd INNER JOIN subscriber_service ss ON sd.id = ss.user_id INNER JOIN internet_packages ip ON ss.service_id = ip.id WHERE ss.service_table_name = ?;', ['internet_packages']);
        }
        else{
            $userDetails = \DB::select('SELECT sd.id, sd.subscriber_username, sd.phone_number, sd.lead_organization, ss.service_table_name, ss.expires_at, ip.service_upload_bandwidth, ip.service_download_bandwidth FROM subscribers_details sd INNER JOIN subscriber_service ss ON sd.id = ss.user_id INNER JOIN internet_packages ip ON ss.service_id = ip.id WHERE ss.service_table_name = ? AND sd.lead_organization = ?;', ['internet_packages', $organization]);
        }
        // dd($packageId);
        // dd($this->getAllSubscribers());

        return view('usersdetails')->with('userDetails', $userDetails);
    }

    //it will get all users registered in the database 
    public function getAllSubscribers()
    {
        $leadorg = \Auth::user()->organization;
        if($leadorg == 'astavision')
        {
            $alluser = SubscribersDetails::select('id','subscriber_username', 'phone_number')->get();
        }
        else{

            $alluser = SubscribersDetails::select('id','subscriber_username', 'phone_number')->where('lead_organization', $leadorg)->get();
        }
        return $alluser;
    }
}
