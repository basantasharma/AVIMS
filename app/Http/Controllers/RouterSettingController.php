<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Carbon\Carbon;



//TO do essential

// Account database
// router uses information table 
// router configuration status table and all the required models

class RouterSettingController extends Controller
{
    public function showRouterSettingPage()
    {
        return view('routersetting');
    }
    //$id = OUI - product class - serial number

    public function refreshWifiPower($id)
    {
        $refreshUrl = 'http://1.1.1.2:7557/devices/'.$id.'/tasks?connection_request';
        $requiredData = '{"name": "refreshObject", "objectName": "InternetGatewayDevice.LANDevice.1.WiFi.X_HW_Txpower"}';
        $ch1 = curl_init($refreshUrl);
        curl_setopt($ch1, CURLOPT_POST, true);
        curl_setopt($ch1, CURLOPT_POSTFIELDS, $requiredData);
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch1);
        $code = curl_getinfo($ch1)["http_code"];
        curl_close($ch1);
        if($code === 200)
        {
            return true;
        }
        else 
        {
            return false;
        }
    }

    //returns true if success to refresh 
    public function refreshWifiNumbers($id)
    {
        $refreshUrl = 'http://1.1.1.2:7557/devices/'.$id.'/tasks?connection_request';
        $requiredData = '{"name": "refreshObject", "objectName": "InternetGatewayDevice.LANDevice.1.WiFi.RadioNumberOfEntries"}';
        $ch1 = curl_init($refreshUrl);
        curl_setopt($ch1, CURLOPT_POST, true);
        curl_setopt($ch1, CURLOPT_POSTFIELDS, $requiredData);
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch1);
        $code = curl_getinfo($ch1)["http_code"];
        curl_close($ch1);
        if($code === 200)
        {
            return true;
        }
        else 
        {
            return false;
        }
    }

    //returns true if refress success else false
    public function refreshLANDeviceHost($id)
    {
        $refreshUrl = 'http://1.1.1.2:7557/devices/'.$id.'/tasks?connection_request';
        // $requiredData = '{"name": "refreshObject", "objectName": ""}';
        $requiredData = '{"name": "refreshObject", "objectName": "InternetGatewayDevice.LANDevice.1.Hosts"}';
        $ch1 = curl_init($refreshUrl);
        curl_setopt($ch1, CURLOPT_POST, true);
        curl_setopt($ch1, CURLOPT_POSTFIELDS, $requiredData);
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch1);
        $code = curl_getinfo($ch1)["http_code"];
        curl_close($ch1);
        if($code === 200)
        {
            return true;
        }
        else 
        {
            return false;
        }
    }

    //returns an array with key valye as supported bands
    public function getSupportedFrequencyBand($id)
    {
        $bands = array();
        if($this->refreshWifiNumbers($id))
        {
            $url = 'http://1.1.1.2:7557/devices?query=%7B%22_id%22%3A%22'.$id.'%22%7D&projection=InternetGatewayDevice.LANDevice.1.WiFi';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                die('cURL error: ' . curl_error($ch));
            }
            curl_close($ch);
            $data = json_decode($response, true);
            for($i=1;$i<=$data[0]['InternetGatewayDevice']['LANDevice'][1]['WiFi']['RadioNumberOfEntries']['_value'];$i++)
            {
                if($data[0]['InternetGatewayDevice']['LANDevice'][1]['WiFi']['Radio'][$i]['OperatingFrequencyBand']['_value'] === "2.4GHz")
                    $bands[1] = $data[0]['InternetGatewayDevice']['LANDevice'][1]['WiFi']['Radio'][$i]['OperatingFrequencyBand']['_value'];
                if($data[0]['InternetGatewayDevice']['LANDevice'][1]['WiFi']['Radio'][$i]['OperatingFrequencyBand']['_value'] === "5GHz")
                    $bands[5] = $data[0]['InternetGatewayDevice']['LANDevice'][1]['WiFi']['Radio'][$i]['OperatingFrequencyBand']['_value'];
            }
            return $bands;
        }
        else
        {
            return false;
        }
    }

    //returns id of requested cpe serial number
    public function getIdFromSerial($serial)
    {
        $url = 'http://1.1.1.2:7557/devices?query=%7B%22_deviceId._SerialNumber%22%3A%22'.$serial.'%22%7D&projection=_Id';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            die('cURL error: ' . curl_error($ch));
        }
        curl_close($ch);
        $data = json_decode($response, true);
        if(array_key_exists(0, $data)){
            return $data[0]['_id'];
        }
        else{
            dd($data);
        }
    }

    //converts datetime to current timezone
    public function convertLastBoot($data)
    {
        // Assuming you have the client's timezone stored in a variable $clientTimezone
        $clientTimezone = 'Asia/Kathmandu'; // Example timezone

        // Convert the timestamp to the client's timezone
        $timestamp = $data;
        $date = Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $timestamp, 'UTC');
        $date->setTimezone($clientTimezone);
        
        // Format the date for display
        $formattedDate = $date->format('Y-m-d H:i:s');


        $duration = (Carbon::now())->diff($formattedDate);

        return $duration;
    }


    public function getRouterInfo()
    {
        if(\Auth::guard('web')->check()){
            if(request()->has('cpe_serial_number')){
                $id = $this->getIdFromSerial($request->cpe_serial_number);
            }
            else{
                return redirect()->back()->with("failed", "You must pass a serial Number.");
            }
        }
        else
        {
            $id = $this->getIdFromSerial(\Auth::user()->cpe_serial_number);
        }
        $availableFrequencyBands = $this->getSupportedFrequencyBand($id);
        $info = array();
        if($this->refreshWifiPower($id))
        {
            $url = 'http://1.1.1.2:7557/devices?query=%7B%22_id%22%3A%22'.$id.'%22%7D&projection=InternetGatewayDevice.LANDevice.1.WiFi.X_HW_Txpower,_lastBoot';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                die('cURL error: ' . curl_error($ch));
            }
            curl_close($ch);
            $data = json_decode($response, true);
            $info["active"] = 'Active';
            $info["lastBoot"] = $this->convertLastBoot($data[0]['_lastBoot']);
            $info["routerPower"] = $data[0]['InternetGatewayDevice']['LANDevice'][1]['WiFi']['X_HW_Txpower']['_value'];
            $data = json_encode($info);
            return $data;
        }
        else
        {
            $info["active"] = 'Offline';
            $info["lastBoot"] = [];
            $info["routerPower"] = 'null';
            $data = json_encode($info);
            return $data;
        }
    }
    //returns everything needed to display in router page
    public function getRouterSettingInfo(Request $request)
    {
        if(\Auth::guard('web')->check()){
            if(request()->has('cpe_serial_number')){
                $id = $this->getIdFromSerial($request->cpe_serial_number);
            }
            else{
                return redirect()->back()->with("failed", "You must pass a serial Number.");
            }
        }
        else
        {

            $id = $this->getIdFromSerial(\Auth::user()->cpe_serial_number);
        }
        $availableFrequencyBands = $this->getSupportedFrequencyBand($id);
        $projection = "";
        $info = array();
        $Devices = array();
        if($this->refreshLANDeviceHost($id))
        {
            foreach($availableFrequencyBands as $key => $value)
            {
                $projection .= "InternetGatewayDevice.LANDevice.1.WLANConfiguration.".$key.".SSID,InternetGatewayDevice.LANDevice.1.WLANConfiguration.".$key.".SSIDAdvertisementEnabled,InternetGatewayDevice.LANDevice.1.WLANConfiguration.".$key.".Enable,InternetGatewayDevice.LANDevice.1.WLANConfiguration.".$key.".ChannelsInUse,InternetGatewayDevice.LANDevice.1.WLANConfiguration.".$key.".X_HW_RFBand,InternetGatewayDevice.LANDevice.1.WLANConfiguration.".$key.".PossibleChannels";
                if($value !== end($availableFrequencyBands))
                {
                    $projection .= ",";
                }
            }
            $url = 'http://1.1.1.2:7557/devices?query=%7B%22_id%22%3A%22'.$id.'%22%7D&projection=InternetGatewayDevice.LANDevice.1.WiFi.X_HW_Txpower,_lastBoot,InternetGatewayDevice.LANDevice.1.Hosts,'.$projection;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                die('cURL error: ' . curl_error($ch));
            }
            curl_close($ch);
            $data = json_decode($response, true);
            $DevicesData = $data[0]['InternetGatewayDevice']['LANDevice'][1]['Hosts'];
            for($i=1; $i<=$DevicesData["HostNumberOfEntries"]['_value']; $i++)
            {
                if($DevicesData['Host'][$i])
                {
                    $Devices[] = $DevicesData['Host'][$i];
                }
            }
            usort($Devices, function($a, $b) {
                return $b['Active']['_value'] <=> $a['Active']['_value'];
            });
            usort($Devices, function($a, $b) {
                if($a['Active']['_value'] & $b['Active']['_value'])
                    return $b['X_HW_RSSI']['_value'] <=> $a['X_HW_RSSI']['_value'];
            });
            $info["active"] = 'Active';
            $info["lastBoot"] = $this->convertLastBoot($data[0]['_lastBoot']);
            $info["routerPower"] = $data[0]['InternetGatewayDevice']['LANDevice'][1]['WiFi']['X_HW_Txpower']['_value'];
            $info["Devices"] = $Devices;
            foreach($availableFrequencyBands as $key => $value)
            {
                $info['noOfWifi'][$key] = $data[0]['InternetGatewayDevice']['LANDevice'][1]['WLANConfiguration'][$key];
            }
            $data = json_encode($info);
            return $data;
        }
        else
        {
            $info["active"] = 'Offline';
            $info["lastBoot"] = [];
            $info["routerPower"] = 'null';
            $info["Devices"] = [];
            $info["noOfWifi"][] = [];
            $data = json_encode($info);
            return $data;
        }
    }

    public function rebootRouter(Request $request)
    {
        // dd($request);
        if(\Auth::guard('web')->check()){
            if(request()->has('cpe_serial_number')){
                $id = $this->getIdFromSerial($request->cpe_serial_number);
                if(!$id)
                {
                    return redirect()->back()->with('failed', 'couldnot reboot the provided CPE');
                }
            }
            else{
                return redirect()->back()->with("failed", "You must pass a serial Number.");
            }
        }
        else
        {
            $id = $this->getIdFromSerial(\Auth::user()->cpe_serial_number);
            if(!$id)
                {
                    return redirect()->back()->with('failed', 'couldnot reboot the provided CPE');
                }
        }
        if($this->refreshWifiPower($id))
        {

            $rebootUrl = 'http://1.1.1.2:7557/devices/'.$id.'/tasks?connection_request';
            $requiredData = '{"name": "reboot"}';
            $ch1 = curl_init($rebootUrl);
            curl_setopt($ch1, CURLOPT_POST, true);
            curl_setopt($ch1, CURLOPT_POSTFIELDS, $requiredData);
            curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch1);
            $code = curl_getinfo($ch1)["http_code"];
            curl_close($ch1);
            if($code === 200)
            {
                return redirect()->back()->with('success', "Successfully Rebooted your router")->with('info', "Your Router will be Active within few Minutes");
            }
            else 
            {
                return redirect()->back()->with('failed', "Failed to Reboot your router");
            }
        }
        else
        {
            return redirect()->back()->with('failed', "Router is currently offline");
        }

    }
    
    public function routerSetting(Request $request)
    {
        if(\Auth::guard('web')->check()){
            if(request()->has('cpe_serial_number')){
                $id = $this->getIdFromSerial($request->cpe_serial_number);
            }
            else{
                return redirect()->back()->with("failed", "You must pass a serial Number.");
            }
        }
        else
        {
            $id = $this->getIdFromSerial(\Auth::user()->cpe_serial_number);
        }
        // dd($request);
        $SSID1 = $request['SSID2_4GHz'];
        $SSID5 = $request['SSID5GHz'];
        $newPassPhrase1 = $request['newPassword2_4GHz'];
        $newPassPhrase5 = $request['newPassword5GHz'];
        $hideSSID1 = $request['SSIDAdvertisementEnabled2_4GHz'];
        $hideSSID5 = $request['SSIDAdvertisementEnabled5GHz'];
        $WLANEnable1 = $request['WLANEnable2_4GHz'];
        $WLANEnable5 = $request['WLANEnable5GHz'];
        // dd($WLANEnable5);
        $parameterValues = array();
        if($newPassPhrase1)
            $parameterValues[] = ["InternetGatewayDevice.LANDevice.1.WLANConfiguration.1.PreSharedKey.1.PreSharedKey", $newPassPhrase1, "xsd:string"];
        if($SSID1)
            $parameterValues[] = ["InternetGatewayDevice.LANDevice.1.WLANConfiguration.1.SSID", $SSID1, "xsd:string"];
        if($hideSSID1 === 'on')
            $parameterValues[] = ["InternetGatewayDevice.LANDevice.1.WLANConfiguration.1.SSIDAdvertisementEnabled", false, "xsd:boolean" ];
        else
            $parameterValues[] = ["InternetGatewayDevice.LANDevice.1.WLANConfiguration.1.SSIDAdvertisementEnabled", true, "xsd:boolean" ];
        if($WLANEnable1 === 'on')
            $parameterValues[] = ["InternetGatewayDevice.LANDevice.1.WLANConfiguration.1.Enable", true, "xsd:boolean" ];
        else
            $parameterValues[] = ["InternetGatewayDevice.LANDevice.1.WLANConfiguration.1.Enable", false, "xsd:boolean" ];

        if($newPassPhrase5)
            $parameterValues[] = ["InternetGatewayDevice.LANDevice.1.WLANConfiguration.5.PreSharedKey.1.PreSharedKey", $newPassPhrase5, "xsd:string"];
        if($SSID5)
            $parameterValues[] = ["InternetGatewayDevice.LANDevice.1.WLANConfiguration.5.SSID", $SSID5, "xsd:string"];
        if($hideSSID5 === 'on')
            $parameterValues[] = ["InternetGatewayDevice.LANDevice.1.WLANConfiguration.5.SSIDAdvertisementEnabled", false, "xsd:boolean" ];
        else
            $parameterValues[] = ["InternetGatewayDevice.LANDevice.1.WLANConfiguration.5.SSIDAdvertisementEnabled", true, "xsd:boolean" ];
        if($WLANEnable5 === 'on')
            $parameterValues[] = ["InternetGatewayDevice.LANDevice.1.WLANConfiguration.5.Enable", true, "xsd:boolean" ];
        else
            $parameterValues[] = ["InternetGatewayDevice.LANDevice.1.WLANConfiguration.5.Enable", false, "xsd:boolean" ];
        // dd($parameterValues);
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            ])->post('http://1.1.1.2:7557/devices/'.$id.'/tasks?connection_request', [
                "name" => "setParameterValues",
                "parameterValues" => $parameterValues
            ]);
        if($response)
        {
            return back()->with('success', "Setting Saved");
        }
    }
}
