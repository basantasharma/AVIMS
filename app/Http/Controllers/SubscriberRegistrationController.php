<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SubscriberService;
use App\Models\SubscribersDetails;
use App\Models\InternetPackages;
use App\Models\IptvPackages;
use App\Models\RadCheck;

use App\Http\Controller\InternetPackagesController;


class SubscriberRegistrationController extends Controller
{
    public function registerSubscriber(Request $request)
    {
        
        if($request['account_enabled'])
        {
            $request['account_enabled'] = true;
        }
        else
        {
            $request['account_enabled'] = false;
        }
        if($request['portal_enabled'])
        {
            $request['portal_enabled'] = true;
        }
        else
        {
            $request['portal_enabled'] = false;
        }
        // dd(getType($request['portal_enabled']));
        if($request['subscriber_type'] === 'organization')
        {
            $request['organization_email'] = $request['email'];
            // $request['gender'] = null;
            $request['organization_pan'] = $request['pan'];
            $request->validate([
                'organization_name' => 'required|string|max:50',
                'organization_registration_number' => 'required|string|max:50',
                'organization_pan' => 'required|string|max:50',
            ]);
        }
        if($request['subscriber_type'] === 'home')
        {
            $request->validate([
                'first_name' => 'required|string|max:50',
                'middle_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'gender' => 'required|string|max:50',
                'occupation' => 'required|string|max:50',
                'father_full_name' => 'required|string|max:50',
                'mother_full_name' => 'required|string|max:50',
                'grand_father_full_name' => 'required|string|max:50',
                // 'spouse_full_name', this is optional so
                'refered_by' => 'required|string|max:50',
            ]);
        }
        
        $request->validate([
            'subscriber_username' => 'required|string|max:50',
            'subscriber_password' => 'required|string|max:50',
            'subscriber_type' => 'required|string|',
            'connection_type' => 'required|string',
            'pan',
            
            'identity_proof_type' => 'required|string',
            'identity_photo' => 'required|file|mimes:jpg,jpeg,png|max:1024',
            'account_enabled' => 'required|boolean',
            'portal_enabled' => 'required|boolean',
            'portal_username' => 'required|string|max:50',
            'portal_password' => 'required|string|max:50',
            'email' => 'required|string|max:75',

            // 'organization_email', yo database ma xaina email bhanekai organization email ho

            'Phone_number' => 'required|integer',
            'cellphone_number' => 'required|integer',
            'permanent_state' => 'required|string|max:50',
            'permanent_district' => 'required|string|max:50',
            'permanent_vdc/mun' => 'required|string|max:50',
            'permanent_ward_number' => 'required|string|max:50',
            'permanent_street' => 'required|string|max:50',
            'permanent_house_number' => 'required|string|max:50',
            'current_state' => 'required|string|max:50',
            'current_district' => 'required|string|max:50',
            'current_vdc/mun' => 'required|string|max:50',
            'current_ward_number' => 'required|string|max:50',
            'current_street' => 'required|string|max:50',
            'current_house_number' => 'required|string|max:50',
            'current_latitude' => 'required|string|max:50',
            'current_longitude' => 'required|string|max:50',
            
            'installed_by' => 'required|string|max:50',
            'access_point' => 'required|string|max:50',
            'drop_wire_used_serial_number' => 'required|string|max:50',
            'ip_type' => 'required|string|max:50',
            'ip_address' => 'required|string|max:50',
            'vlan_id' => 'required|integer|max:50',
            'cpe_model_name' => 'required|string|max:50',
            'cpe_serial_number' => 'required|string|max:50',
            'cpe_mac_address' => 'required|string|max:50',
            'lead_id' => 'required|integer',
            'lead_organization' => 'required|string|max:50',
            //validate internet package 
            'internet_package' => 'required|exists:internet_packages,id'

        ]);
        if($request['connection_type'] == 'ipoe')
        {
            $request['username'] = $request['subscriber_username'];
            $request['attribute'] = 'cleartext-password';
            $request['op'] = '==';
            $request['value'] = $request['subscriber_password'];
            $radcheck = RadCheck::create($request->only('username', 'attribute', 'op', 'value'));
            if($radcheck)
            {
                dd('Rad check ma package details add garne banauna baki xa');
            }
        }
        // Identity proof photo has to be processed
        $imageName = time().'.'.$request->identity_photo->getClientOriginalExtension();
        $request['identity_proof_photo'] = $imageName;
        $request['created_by'] = auth()->user()->username;
        $request['updated_by'] = auth()->user()->username;
        // dd($request);
        $user = SubscribersDetails::create($request->all());
        $path = $request->identity_photo->storeAs('public/images/registeredDocuments', $imageName);
        // dd($path);
        if($path)
        {
            $identity_proof_photo = $imageName;
            if($user)
            {
                $request['user_id'] = $user->id;
                $request['service_table_name'] = 'internet_packages';
                $request['service_id'] = $request['internet_package'];
                $internetMonths = (InternetPackages::select('service_duration'))->where('id', $request['internet_package'])->get()->pluck('service_duration');
                // dd($months[0]);
                $internetAddingTime = now()->addMonths($internetMonths[0]);
                $request['expires_at'] = $internetAddingTime;
                $subscriberService = SubscriberService::create($request->all());

                // $request['expires_at'] = SubscriberService::get('expires_at') +((new InternetPackagesController())->getInternetPackageById($request['internet_package']))[''] ;
                if($subscriberService)
                {
                    if($request['iptv_package'])
                    {
                        $request->validate([
                        'iptv_package' => 'required|exists:iptv_packages,id'
                        ]);
                        $iptvMonths = (IptvPackages::select('service_duration'))->where('id', $request['iptv_package'])->get()->pluck('service_duration');
                        $iptvAddingTime = now()->addMonths($iptvMonths[0]);
                        $request['expires_at'] = $iptvAddingTime;
                        $request['service_table_name'] = 'iptv_packages';
                        $request['service_id'] = $request['iptv_package'];
                        $subscriberService = SubscriberService::create($request->all());
                        if($subscriberService)
                        {
                            return redirect()->back()->with('success', "user Registered successfully");
                            // dd('user, subscriberService added');
                        }
                    }
                    return redirect()->back()->with('failed', 'Adding service failed')->with('success', 'User Registered successfully');
                }
                return redirect()->back()->with('success', "user Registered successfully")->with('failed', 'Subacription adding failed');
                // dd($user->id);

            }
        }
        $subscriber_username = $request['subscriber_username'];
        $subscriber_password = $request['subscriber_password'];
        $subscriber_type = $request['subscriber_type'];
        $connection_type = $request['connection_type'];
        //packages details is to get

        $first_name = $request['first_name'];
        $middle_name = $request['middle_name'];
        $last_name = $request['last_name'];
        $gender = $request['gender'];
        $occupation = $request['occupation'];
        $pan = $request['pan'];
        $father_full_name = $request['father_full_name'];
        $mother_full_name = $request['mother_full_name'];
        $grand_father_full_name = $request['grand_father_full_name'];
        $spouse_full_name = $request['spouse_full_name'];
        $identity_proof_type = $request['identity_proof_type'];
        
        $account_enabled = $request['account_enabled'];
        $portal_enabled = $request['portal_enabled'];
        $portal_username = $request['portal_username'];
        $portal_password = $request['portal_password'];
        $email = $request['email'];
        $refered_by = $request['refered_by'];

        $organization_name = $request['organization_name'];
        // $organization_email = $request['email'];
        $organization_registration_number = $request['organization_registration_number'];

        $Phone_number = $request['Phone_number'];
        $cellphone_number = $request['cellphone_number'];
        $permanent_state = $request['permanent_state'];
        $permanent_district = $request['permanent_district'];
        $permanent_vdc = $request['permanent_vdc/mun'];
        $permanent_ward_number = $request['permanent_ward_number'];
        $permanent_street = $request['permanent_street'];
        $permanent_house_number = $request['permanent_house_number'];
        $current_state = $request['current_state'];
        $current_district = $request['current_district'];
        $current_vdc = $request['current_vdc/mun'];
        $current_ward_number = $request['current_ward_number'];
        $current_street = $request['current_street'];
        $current_house_number = $request['current_house_number'];
        $current_latitude = $request['current_latitude'];
        $current_longitude = $request['current_longitude'];
        
        $installed_by = $request['installed_by'];
        $access_point = $request['access_point'];
        $drop_wire_used_serial_number = $request['drop_wire_used_serial_number'];
        $ip_type = $request['ip_type'];
        $ip_address = $request['ip_address'];
        $vlan_id = $request['vlan_id'];
        $cpe_model_name = $request['cpe_model_name'];
        $cpe_serial_number = $request['cpe_serial_number'];
        $cpe_mac_address = $request['cpe_mac_address'];
        $lead_id = $request['lead_id'];
        $lead_organization = $request['lead_organization'];
    }
}
