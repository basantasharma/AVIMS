<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriberRegistrationController extends Controller
{
    public function registerSubscriber(Request $request)
    {
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
        $identity_proof_photo = $request['identity_proof_photo'];
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
        dd(getType($request['portal_enabled']));
        if($subscriber_type === 'organization')
        {
            $request['organization_email'] = $request['email'];
            $request['organization_pan'] = $request['pan'];
            $request->validate([
                'organization_name' => 'required|string|max:50',
                'organization_registration_number' => 'required|string|max:50',
                'organization_pan' => 'required|string|max:50',
            ]);
        }
        if($subscriber_type === 'home')
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
            
            'identity_proof_type',
            // 'identity_proof_photo',
            'account_enabled',
            'portal_enabled',
            'portal_username',
            'portal_password',
            'email',

            // 'organization_email', yo database ma xaina email bhanekai organization email ho

            'Phone_number',
            'cellphone_number',
            'permanent_state',
            'permanent_district',
            'permanent_vdc/mun',
            'permanent_ward_number',
            'permanent_street',
            'permanent_house_number',
            'current_state',
            'current_district',
            'current_vdc/mun',
            'current_ward_number',
            'current_street',
            'current_house_number',
            'current_latitude',
            'current_longitude',
            
            'installed_by',
            'access_point',
            'drop_wire_used_serial_number',
            'ip_type',
            'ip_address',
            'vlan_id',
            'cpe_model_name',
            'cpe_serial_number',
            'cpe_mac_address',
            'lead_id',
            'lead_organization'

        ]);
        dd($request);
    }
}
