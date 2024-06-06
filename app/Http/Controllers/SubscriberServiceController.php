<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Controllers\SubscriberController;


use App\Models\RadCheck;
use App\Models\SubscriberService;
use App\Models\OrganizationPolicy;
use App\Models\Organizations;

use Carbon\Carbon;

class SubscriberServiceController extends Controller
{
    public function getExpiredUserDetails(Request $request){
        if(\Auth::guard('web')->check()){
            $organization = auth()->user()->organization;
            if($organization == 'astavision'){
                $userDetails = \DB::select('SELECT sd.id, sd.subscriber_username, sd.cpe_serial_number, sd.phone_number, sd.lead_organization, ss.service_table_name, ss.expires_at, ss.extended_till, ip.service_upload_bandwidth, ip.service_download_bandwidth, org.orgname, org.branch, op.extend_days FROM subscribers_details sd INNER JOIN subscriber_service ss ON sd.id = ss.user_id INNER JOIN internet_packages ip ON ss.service_id = ip.id INNER JOIN organizations org ON sd.lead_organization = org.orgname INNER JOIN organization_policy op ON org.id = op.org_id WHERE ss.service_table_name = ? OR ss.service_table_name = ?;', ['internet_packages', 'iptv_packages']);
            }
            else{
                $userDetails = \DB::select('SELECT sd.id, sd.subscriber_username, sd.cpe_serial_number, sd.phone_number, sd.lead_organization, ss.service_table_name, ss.expires_at, ss.extended_till, ip.service_upload_bandwidth, ip.service_download_bandwidth, org.orgname, org.branch, op.extend_days FROM subscribers_details sd INNER JOIN subscriber_service ss ON sd.id = ss.user_id INNER JOIN internet_packages ip ON ss.service_id = ip.id INNER JOIN organizations org ON sd.lead_organization = org.orgname INNER JOIN organization_policy op ON org.id = op.org_id WHERE ss.service_table_name = ? OR ss.service_table_name = ? AND sd.lead_organization = ?;', ['internet_packages', 'iptv_packages', $organization]);
            }
        }
        if(\Auth::guard('sub')->check()){
            $organization = \Auth::user()->lead_organization;
            // $userDetails = \DB::select('SELECT sd.id, sd.subscriber_username, sd.cpe_serial_number, sd.phone_number, sd.lead_organization, ss.service_table_name, ss.expires_at, ss.extended_till, ip.service_upload_bandwidth, ip.service_download_bandwidth FROM subscribers_details sd INNER JOIN subscriber_service ss ON sd.id = ss.user_id INNER JOIN internet_packages ip ON ss.service_id = ip.id WHERE ss.service_table_name = ? OR ss.service_table_name = ? AND sd.lead_organization = ? AND sd.id = ?;', ['internet_packages', 'iptv_packages', $organization, \Auth::user()->id]);
            $userDetails = \DB::select('SELECT ss.*, op.extend_days FROM subscriber_service ss INNER JOIN subscribers_details sd ON ss.user_id = sd.id INNER JOIN organizations od ON sd.lead_organization = od.orgname INNER JOIN organization_policy op ON od.id = op.org_id WHERE ss.user_id = ?;', [\Auth::user()->id]);
        }
        return $userDetails;
    }

    public function extends(Request $request){
        if(\Auth::guard('sub')->check()){
            $organizations = Organizations::select()->where('orgname', $request->user()->lead_organization)->get();
        $organizationPolicy = OrganizationPolicy::select()->where('org_id', $organizations[0]->id)->get();
        $subscriberServices = SubscriberService::select()->where('user_id', $request->user()->id)->get();
        $extended_till = Carbon::now()->addDays($organizationPolicy[0]->extend_days);
        foreach($subscriberServices as $subscriberService){
            if($subscriberService->extended_till == null)
            {
                $result = SubscriberService::where('id', $subscriberService->id)->update([
                    'extended_till' => $extended_till
                ]);
                // if($result & $subscriberService->service_table_name == 'internet_packages'){
                //     $result = RadCheck::where('attribute', 'Expiration')->where('username', $request->user()->subscriber_username)->update(['value' => $extended_till->format('d M Y')]);
                //     if($result)
                //     {
                //         // return redirect()->back()->with('success', 'Successfully edtended');
                //     }
                //     else{
                //         // return redirect()->back()->with('failed', 'Failed to extend in radius table');
                //     }
                // }
                // else{
                //     // return redirect()->back()->with('failed', 'Failed to extend user');
                // }
            }
            else{
                // return redirect()->back()->with('failed', 'You are already extended');
            }
        }
        dd('sakyo ta');
        }

    }





    //old code
    public function extendSubscriber(Request $request)
    {
        
        $this->extend($request);
        if(\Auth::guard('web')->check())
        {
            $request->validate([
                'id' => 'required|exists:subscriber_service,user_id|exists:subscribers_details,id'
            ]);
            $organization = \Auth::user()->organization;
            $user = (new SubscriberController())->getSubscriberByID($request->id);
            
            if($user){
                $databaseExpiryDate = SubscriberService::select('service_table_name','extended_till')->where('user_id', $user[0]->id)->get();

                dd($databaseExpiryDate);

                
            }
            else{
                return redirect()->back()->with('failed', 'Not allowed for provided user');
            }

        }
        else{

        }
        return redirect()->back()->with('failed', 'You do not have permission to perform this action');
    }

    public function extend(Request $request)
    {
        $organization = \Auth::user()->lead_organization;
        // kun organization ko kun user ko kun service extend garne? logic goes here
        $expiredAccounts = $this->getExpiredAccounts($request);
        if($expiredAccounts->isNotEmpty())
        {
            foreach($expiredAccounts as $account)
            {
                if(!$account->extended_till){
                    // dd($account->extend_days);
                    print_r(' '.$account->extend_days);
                    $newExpiresAt = \Carbon\Carbon::now()->addDays($account->extend_days);
                    // $newExpiresAt = \Carbon\Carbon::parse($account->expires_at)->addDays($account->extend_days);
                    // print_r($newExpiresAt);
                    // $users = (new SubscriberController())->getSubscriberByIdwithoutLogin($account->user_id);
                    // dd($users);

                }
                // var_dump($account->user_id);
                // if($users)
                // {
                    
                // }
                //this $extendUser is working
                // $extendedUser = SubscriberService::where('id', $account->id)
                // ->update(['extended_till' => $newExpiresAt]);
                // if($extendedUser){
                //     $expirydate = RadCheck::where('username', $user[0]->subscriber_username)->where('attribute', 'Expiration')->get();
                // }
                // else{

                //     dd($expiredAccounts);
                // }
            }
            dd($expiredAccounts);
        }
        else
        {
            dd('no expired accounts');
            return 1;
        }
    }
    public function getExpiredAccounts(Request $request)
    {
        if(\Auth::guard('web')->check())
        {
            $leadorg = \Auth::user()->organization;
            if($leadorg == 'astavision')
            {
                $user = SubscriberService::select('subscriber_service.*', 'subscribers_details.lead_organization', 'subscribers_details.subscriber_username', 'organization_policy.extend_days')
                ->join('subscribers_details', 'subscriber_service.user_id', '=', 'subscribers_details.id')
                ->join('organizations', 'subscribers_details.lead_organization', '=', 'organizations.orgname')
                ->join('organization_policy', 'organizations.id', '=', 'organization_policy.org_id')
                ->where(function ($query) {
                    $query->where('subscriber_service.expires_at', '<', \Carbon\Carbon::now()); // Users whose expiration date is in the past
                })
                ->get();
            }
            else{
                $user = SubscriberService::select('subscriber_service.*', 'subscribers_details.lead_organization', 'subscribers_details.subscriber_username', 'organization_policy.extend_days')
                ->join('subscribers_details', 'subscriber_service.user_id', '=', 'subscribers_details.id')
                ->join('organizations', 'subscribers_details.lead_organization', '=', 'organizations.orgname')
                ->join('organization_policy', 'organizations.id', '=', 'organization_policy.org_id')
                ->where(function ($query) {
                    $query->where('subscriber_service.expires_at', '<', \Carbon\Carbon::now()); // Users whose expiration date is in the past
                })
                ->where('lead_organization', $leadorg)
                ->get();
            }
            if($user->isNotEmpty()){
                return $user;
            }
            else{
                return false;
            }
        }
        elseif(\Auth::guard('sub')->check()){
            $user = SubscriberService::select('subscriber_service.*', 'subscribers_details.lead_organization', 'subscribers_details.subscriber_username', 'organization_policy.extend_days')
            ->join('subscribers_details', 'subscriber_service.user_id', '=', 'subscribers_details.id')
            ->join('organizations', 'subscribers_details.lead_organization', '=', 'organizations.orgname')
            ->join('organization_policy', 'organizations.id', '=', 'organization_policy.org_id')
            ->where(function ($query) {
                $query->where('subscriber_service.expires_at', '<', \Carbon\Carbon::now()); // Users whose expiration date is in the past
            })
            ->where('user_id', \Auth::user()->id)
            ->get();
            dd($user);
        }
        else
        {
            return redirect()->back()->with('failed', 'Not allowed to perform that action');
        }
    }

    public function rechargeUser(Request $request)
    {
        
    }
}
