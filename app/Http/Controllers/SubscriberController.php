<?php

namespace App\Http\Controllers;

use App\Models\SubscribersDetails;
// use App\Models\User;


use Illuminate\Http\Request;

class SubscriberController extends Controller
{


    //it will get all users registered in the database 
    public function getAllSubscribers()
    {
        $leadorg = \Auth::user()->organization;
        if($leadorg == 'astavision')
        {
            $alluser = SubscribersDetails::select('id','subscriber_username')->get();
        }
        else{

            $alluser = SubscribersDetails::select('id','subscriber_username')->where('lead_organization', $leadorg)->get();
        }
        return $alluser;
    }
}
