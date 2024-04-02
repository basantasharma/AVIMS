@extends('./layouts/base')
@section('title', 'Register-Telnet')
@section('headerLeft', 'Register')
@section('register', 'active')


@section('scripts-top')
        {{-- @vite('resources/css/registerform.css') --}}

@endsection

@section('body')

<div class="row justify-content-center">
  <div class=" col-12 col-xxl-6 col-xl-8 col-lg-8 col-md-8 col-sm-12">

   
    
    <form action="/subscriberregister" method="post" id="formgroup" enctype="multipart/form-data">
      @csrf
      @method('post')

     

        <div class="step step-1 active">
          <div class="row justify-content-start">
            <h3 class="mb-1 text-center">Subscriber Registration</h3>
            <h4>Basic Information</h4><hr>
    
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control"  id="Subscriber_username" name="Subscriber_username" placeholder="User Name">
                <label for="Subscriber_username">User Name</label>
              </div>
            </div>
    
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="Subscriber_password" name="Subscriber_password" placeholder="User Password">
                <label for="Subscriber_password">User Password</label>
              </div>
            </div>
    
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3" id="subscriberType">
              <div class="form-floating">
                <select class="form-control" id="subscriber_type" name="subscriber_type">
                  <option selected value="home">Home User</option>
                  <option value="organization">Organization User</option>
                </select>
                <label for="subscriber_type" id="typeSelectPlaceholder" class="">Select Subscriber Type</label>
              </div>
            </div>
    
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3" id="connectionType">
              <div class="form-floating">
                <select class="form-control" id="connection_type" name="connection_type">
                  <option selected value="ppoe">PPOE</option>
                  <option value="ipoe">IPoE</option>
                  <option value="static">Static IP</option>
                </select>
                <label for="connection_type" id="connectionSelectPlaceholder" class="">Select Connection Type</label>
              </div>
            </div>
    
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="account_enabled">Account Enabled:</label>
              <div class="form-switch fs-4">
                <input type="checkbox" id="account_enabled" class="form-check-input" role="switch" name="account_enabled" checked>
              </div>
            </div>
    
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="portal_enabled">Portal Enabled:</label>
              <div class="form-switch fs-4">
                <input type="checkbox" id="portal_enabled" class="form-check-input" role="switch" name="portal_enabled" checked>
              </div>
            </div>
    
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="portal_user_name" name="portal_user_name" placeholder="Portal Username">
                <label for="portal_user_name">Portal Username:</label>
              </div>
            </div>
    
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="password" class="form-control" id="portal_password" name="portal_password" placeholder="Portal Password">
                <label for="portal_password">Portal Password:</label>
              </div>
            </div>
    
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <select class="form-control" id="internet_package" name="internet_package">
                  @foreach($availableInternetPackages as $package)
                    <option value="{{ $package->id }}">{{ $package->service_download_bandwidth }} Mbps for {{ $package->service_duration }} months</option>
                  @endforeach
                </select>
                <label for="internet_package">Select Internet Package</label>
              </div>
            </div>
            
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <select class="form-control" id="iptv_package" name="iptv_package">
                  <option value="">None</option>
                  @foreach($availableIptvPackages as $package)
                    <option value="{{ $package->id }}">{{ (int)$package->no_of_HD_channels + (int)$package->no_of_SD_channels }} Channels for {{ $package->service_duration }} months</option>
                  @endforeach
                </select>
                <label for="internet_package">Select Iptv Package</label>
              </div>
            </div>
    
            {{-- <div class="col-12">
              <ol type="1" class="row p-0" id="">
                <div id="serviceList1" class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-3">
                  <li class="border border-2 border-secondary p-2">
                      <label for="service_table">Select service Table</label>
                      <select class="form-control" id="service_table" name="service_table">
                        <option selected>Select Service table</option>
                        <option value="internet">Internet</option>
                        <option value="ip_tv">IP TV</option>
                        <option value="netflix">Netflix</option>
                      </select>
            
                      <label for="package_id">Select service Id</label>
                      <select class="form-control" id="package_id" name="package_id">
                        <option selected>Select Service Id</option>
                        <option value="123">sda122s2</option>
                        <option value="456">hhr12kg3</option>
                        <option value="135">asd223</option>
                      </select>
                  </li>
                </div>
              </ol>
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <a type="button" class="form-control btn btn-outline-dark" id="add_service">Add Service</a>
              <a type="button" class="form-control btn btn-outline-danger" id="remove_service" hidden>remove Service</a>
            </div> --}}
    
          </div>

        </div>
        
      
        <div class="step step-2">
          <div class="row mt-2">
            <h4>Subscriber Information</h4><hr>
            
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3" id="orgname" style="display: none" >
              <div class="form-floating">
                <input type="text" class="form-control" id="organization_name" name="organization_name" placeholder="Organization Name">
                <label for="organization_name">Organization Name</label><br>
              </div>
            </div>

            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3" id="orgreg" style="display: none"  >
              <div class="form-floating">
                <input type="text" class="form-control" id="organization_registration_number" name="organization_registration_number" placeholder="Organization Registration">
                <label for="organization_registration_number">Organization Registration Number</label><br>
              </div>
            </div>

            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3" id="subscriber_firstname">
              <div class="form-floating">
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                <label for="first_name">First Name</label><br>
              </div>
            </div>
    
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3" id="subscriber_middlename">
              <div class="form-floating">
                <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name">
                <label for="middle_name">Middle Name</label><br>
              </div>
            </div>
    
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3" id="subscriber_lastname">
              <div class="form-floating">
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                <label for="last_name">Last Name</label><br>
              </div>
            </div>
          
      
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3 form-group" id="gender">
              <h6>Gender:</h6>
              <input type="radio" id="male" name="gender" value="male">
              <label for="male">Male</label>
              <input type="radio" id="female" name="gender" value="female">
              <label for="female">Female</label>
              <input type="radio" id="other" name="gender" value="other">
              <label for="other">Other</label>
            </div>
    
    
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3" id="subscriber_occupation">
              <div class="form-floating">
                <input type="text" class="form-control" id="occupation" name="occupation" placeholder="occupation">
                <label for="occupation">occupation</label><br>
              </div>
            </div>
    
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3" >
              <div class="form-floating">
                <input type="text" class="form-control" id="pan" name="pan" placeholder="pan">
                <label for="pan">PAN</label><br>
              </div>
            </div>
    
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3" id="fatherdiv">
              <div class="form-floating">
                <input type="text" class="form-control" id="father_full_name" name="father_full_name" placeholder="Father Full Name">
                <label for="father_full_name">Father's Full Name</label><br>
              </div>
            </div>
    
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3" id="motherdiv">
              <div class="form-floating">
                <input type="text" class="form-control" id="mother_full_name" name="mother_full_name" placeholder="Mother full Name">
                <label for="mother_full_name">Mother's Full Name</label><br>
              </div>
            </div>
    
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3" id="grandparentdiv">
              <div class="form-floating">
                <input type="text" class="form-control" id="grand_father_full_name" name="grand_father_full_name" placeholder="Grand Father Full Name">
                <label for="grand_father_full_name">Grandparent's Full Name</label><br>
              </div>
            </div>
    
            
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3" id="spousediv">
              <div class="form-floating">
                <input type="text" class="form-control" id="spouse_full_name" name="spouse_full_name" placeholder="Spouse Full Name">
                <label for="spouse_full_name">Spouse's Full Name</label><br>
              </div>
            </div>
    
    
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3" id="identity">
              <div class="form-floating">
              <select class="form-control" id="identity_proof_type" name="identity_proof_type">
                <option selected>Document Type </option>
                <option value="nationalIdentityCard">National Identity Card</option>
                <option value="citizenship">Citizenship</option>
                <option value="passport">Passport</option>
                <option value="drivingLicense">Driving License</option>
                <option value="other">Other</option>
              </select>
              <label for="identity_proof_type">Identity Proof Type:</label>
    
            </div></div>
    
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <label for="identity_proof_photo">Identity Proof Photo:</label>
              <input type="file" class="form-control" id="identity_proof_photo" name="identity_proof_photo">
            </div>
    
    
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3" >
              <div class="form-floating">
                <input type="text" class="form-control" id="email" name="email" placeholder="Subscriber Email">
                <label for="email">Subscriber's Email</label><br>
              </div>
            </div>
    
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="refered_by" name="refered_by" placeholder="Refered By">
                <label for="refered_by">Referred By</label><br>
              </div>
            </div>
    
          </div>
        </div>
          

        <div class="step step-3">
          <div class="row mt-2">
            <h4>Contact Information</h4><hr>
            
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="tel" class="form-control" id="Phone_number" name="Phone_number" placeholder="Phone Number">
                <label for="Phone_number">Phone Number</label><br>
              </div>
            </div>
        
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="tel" class="form-control" id="cellphone_number" name="cellphone_number" placeholder="cellcontact">
                <label for="cellphone_number">Cell Phone Number</label><br>
              </div>
            </div>
        
            <h4>Permanent Address</h4>
            
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <select class="form-control" id="permanent_state" name="permanent_state">
                  <option selected>Select State</option>
                  <option value="Koshi">Koshi</option>
                  <option value="Madhesh">Madhesh</option>
                  <option value="Bagmati">Bagmati</option>
                  <option value="Gandaki">Gandaki</option>
                  <option value="Lumbini">Lumbini</option>
                  <option value="Karnali">Karnali</option>
                  <option value="Sudurpashchim">Sudurpashchim</option>
                </select>
                <label for="permanent_state">State</label>
              </div>
            </div>
        
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <select class="form-control" id="permanent_district" name="permanent_district">
                  <option selected>Select District</option>
                  <option value="Koshi">Koshi</option>
                  <option value="Madhesh">Madhesh</option>
                  <option value="Bagmati">Bagmati</option>
                  <option value="Gandaki">Gandaki</option>
                  <option value="Lumbini">Lumbini</option>
                  <option value="Karnali">Karnali</option>
                  <option value="Sudurpashchim">Sudurpashchim</option>
                </select>
                <label for="permanent_state">District</label>
              </div>
            </div>
        
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <select class="form-control" id="permanent_vdcmun" name="permanent_vdc/mun">
                  <option selected>Select VDC/Municipality</option>
                  <option value="Koshi">Koshi</option>
                  <option value="Madhesh">Madhesh</option>
                  <option value="Bagmati">Bagmati</option>
                  <option value="Gandaki">Gandaki</option>
                  <option value="Lumbini">Lumbini</option>
                  <option value="Karnali">Karnali</option>
                  <option value="Sudurpashchim">Sudurpashchim</option>
                </select>
                <label for="permanent_vdcmun">VDC/MUNICIPALITY</label>
              </div>
            </div>
        
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <select class="form-control" id="permanent_ward" name="permanent_ward_number">
                  <option selected>Select Ward</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                </select>
                <label for="permanent_ward">Ward</label></label>
              </div>
            </div>
        
        
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="Subscriber_permanent_streetname" name="permanent_street" placeholder="Subscriber_permanent_streetname">
                <label for="Subscriber_permanent_streetname">Street Name</label><br>
              </div>
            </div>
          
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="Subscriber_permanent_housenumber" name="Subscriber_permanent_housenumber" placeholder="Subscriber_permanent_housenumber">
                <label for="Subscriber_permanent_housenumber">House Number</label><br>
              </div>
            </div>
            <h4>Current Address <input type="checkbox" class="form-check-input ms-4 fs-5" id="copy-address" name="same_as_permanent" placeholder="Same As permanent">
              <label for="copy-address" class="fs-5">same as permanent</label></h4>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <select class="form-control" id="current_state" name="current_state">
                  <option selected>Select State</option>
                  <option value="Koshi">Koshi</option>
                  <option value="Madhesh">Madhesh</option>
                  <option value="Bagmati">Bagmati</option>
                  <option value="Gandaki">Gandaki</option>
                  <option value="Lumbini">Lumbini</option>
                  <option value="Karnali">Karnali</option>
                  <option value="Sudurpashchim">Sudurpashchim</option>
                </select>
                <label for="current_state">State</label>
              </div>
            </div>
        
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <select class="form-control" id="current_district" name="current_district">
                  <option selected>Select District</option>
                  <option value="Koshi">Koshi</option>
                  <option value="Madhesh">Madhesh</option>
                  <option value="Bagmati">Bagmati</option>
                  <option value="Gandaki">Gandaki</option>
                  <option value="Lumbini">Lumbini</option>
                  <option value="Karnali">Karnali</option>
                  <option value="Sudurpashchim">Sudurpashchim</option>
                </select>
                <label for="current_district">District</label>
              </div>
            </div>
        
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <select class="form-control" id="current_vdcmun" name="current_vdc/mun">
                  <option selected>Select VDC/Municipality</option>
                  <option value="Koshi">Koshi</option>
                  <option value="Madhesh">Madhesh</option>
                  <option value="Bagmati">Bagmati</option>
                  <option value="Gandaki">Gandaki</option>
                  <option value="Lumbini">Lumbini</option>
                  <option value="Karnali">Karnali</option>
                  <option value="Sudurpashchim">Sudurpashchim</option>
                </select>
                <label for="current_vdcmun">VDC/MUNICIPALITY</label>
              </div>
            </div>
        
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <select class="form-control" id="current_ward" name="current_ward">
                  <option selected>Select Ward</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                </select>
                <label for="current_ward">Ward</label>
              </div>
            </div>
        
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="Subscriber_current_streetname" name="Subscriber_current_streetname" placeholder="Subscriber_current_streetname">
                <label for="Subscriber_current_streetname">Street Name</label><br>
              </div>
            </div>
        
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="Subscriber_current_housenumber" name="Subscriber_current_housenumber" placeholder="Subscriber_current_housenumber">
                <label for="Subscriber_current_housenumber">House Number</label><br>
              </div>
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="current_latitude" name="current_latitude" placeholder="Current Latitude">
                <label for="current_latitude">Current Latitude</label><br>
              </div>
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="current_longitude" name="current_longitude" placeholder="Current Longitude">
                <label for="current_longitude">Current Longitude</label><br>
              </div>
            </div>
          </div>
        </div>
          
        <div class="step step-4">
          <div class="row mt-2">
            <h4>Installation Information</h4><hr>
            
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="installed_by" name="installed_by" placeholder="installername">
                <label for="installed_by">Installer's Name</label><br>
              </div>
            </div>
    
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="access_point" name="access_point" placeholder="accesspoint">
                <label for="access_point">Access Point's Name</label><br>
              </div>
            </div>
    
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="drop_wire_used_serial_number" name="drop_wire_used_serial_number" placeholder="dropwire Serial Number">
                <label for="drop_wire_used_serial_number">Drop-wire Serial Number</label><br>
              </div>
            </div>

            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
              <select class="form-control" id="ip_type" name="ip_type">
                <option selected>Select IP Type</option>
                  <option value="static">static</option>
                <option value="dynamic">Dynamic</option>
                
              </select>
              <label for="ip_type">IP Type</label>
    
            </div></div>
    
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="ip_address" name="ip_address" placeholder="ipadd">
                <label for="ip_address">IP Address</label><br>
              </div>
            </div>
    
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="vlan_id" name="vlan_id" placeholder="vlanid">
                <label for="vlan_id">VLAN ID</label><br>
              </div>
            </div>
    
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="cpe_model_name" name="cpe_model_name" placeholder="cpemodel">
                <label for="cpe_model_name">CPE Model</label><br>
              </div>
            </div>
    
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="cpe_mac_address" name="cpe_mac_address" placeholder="cpemacadd">
                <label for="cpe_mac_address">CPE Mac Address</label><br>
              </div>
            </div>
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="cpe_serial_number" name="cpe_serial_number" placeholder="CPE Serial Number">
                <label for="cpe_serial_number">CPE Serial Number</label><br>
              </div>
            </div>
    
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="lead_id" name="lead_id" placeholder="leadid">
                <label for="lead_id">Lead ID</label><br>
              </div>
            </div>
    
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="lead_organization" name="lead_organization" placeholder="Lead Organization">
                <label for="lead_organization">Lead Organization</label><br>
              </div>
            </div>
    
          </div>
        </div>
          
            
      
    <div class="buttons" style="display: flex; justify-content: space-between" >
      <button type="button" id="prevbtn" class="btn btn-outline-danger">Previous</button>
      <button type="button" id="nxtbtn" class="btn btn-outline-secondary px-4">Next</button>
      <button type="submit" id="submitbtn" class="btn btn-outline-success" >Submit</button>
    </div>

    </form>
  </div>
</div>

@endsection


@section('script-end')
@vite("resources/js/registerform.js")
{{-- @vite("resources/js/selectservice.js") --}}
@endsection