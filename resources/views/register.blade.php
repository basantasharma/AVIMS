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

   
    
    <form action="/register" method="post" id="formgroup">
      @csrf
      @method('post')

      
        <h3 class="mb-1 text-center">Subscriber Registration</h3>
        <div class="row justify-content-start">
          <h4>Basic Information</h4><hr>
  
          <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
            <div class="form-floating">
              <input type="text" class="form-control"  id="Subscriber_username" name="Subscriber_username" placeholder="User Name">
              <label for="Subscriber_username">User Name</label><br>
            </div>
          </div>
  
          <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
            <div class="form-floating">
              <input type="text" class="form-control" id="Subscriber_password" name="Subscriber_password" placeholder="User Password">
              <label for="Subscriber_password">User Password</label><br>
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
                <option selected value="internet">50 Mbps 1months</option>
                <option value="internet">50 Mbps 3months</option>
                <option value="internet">50 Mbps 6months</option>
                <option value="internet">50 Mbps 12months</option>
                <option value="internet">150 Mbps 12months</option>
              </select>
              <label for="internet_package">Select Internet Package</label>
            </div>
          </div>
          <div class="col-12 col-xxl-6 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
            <div class="form-floating">
              <select class="form-control" id="iptv_package" name="iptv_package">
                <option selected value="none">None</option>
                <option value="iptv">With TV</option>
              </select>
              <label for="internet_package">Select Internet Package</label>
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
      
      
      
        
          <div class="row mt-2">
            <h4>Subscriber Information</h4><hr>
            
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="Subscriber_firstname" name="Subscriber_firstname" placeholder="First Name">
                <label for="Subscriber_firstname">First Name</label><br>
              </div>
            </div>
    
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="Subscriber_middlename" name="Subscriber_middlename" placeholder="Middle Name">
                <label for="Subscriber_username">Middle Name</label><br>
              </div>
            </div>
    
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="Subscriber_lastname" name="Subscriber_lastname" placeholder="Last Name">
                <label for="Subscriber_lastname">Last Name</label><br>
              </div>
            </div>
          
      
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3 form-group">
              <h6>Gender:</h6>
              <input type="radio" id="male" name="gender" value="male">
              <label for="male">Male</label>
              <input type="radio" id="female" name="gender" value="female">
              <label for="female">Female</label>
              <input type="radio" id="other" name="gender" value="other">
              <label for="other">Other</label>
            </div>
    
    
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="Subscriber_occupation" name="Subscriber_occupation" placeholder="occupation">
                <label for="Subscriber_occupation">occupation</label><br>
              </div>
            </div>
    
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="Subscriber_pan" name="Subscriber_pan" placeholder="pan">
                <label for="Subscriber_pan">PAN</label><br>
              </div>
            </div>
    
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="Subscriber_fathername" name="Subscriber_fathername" placeholder="fathername">
                <label for="Subscriber_fathername">Father's Full Name</label><br>
              </div>
            </div>
    
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="Subscriber_mothername" name="Subscriber_mothername" placeholder="mothername">
                <label for="Subscriber_mothername">Mother's Full Name</label><br>
              </div>
            </div>
    
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="Subscriber_grandparentname" name="Subscriber_grandparentname" placeholder="grandparentname">
                <label for="Subscriber_grandparentname">Grandparent's Full Name</label><br>
              </div>
            </div>
    
            
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="Subscriber_spousename" name="Subscriber_spousename" placeholder="spouseName">
                <label for="Subscriber_spousename">Spouse's Full Name</label><br>
              </div>
            </div>
    
    
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
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
    
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="identity_proof_photo">Identity Proof Photo:</label>
              <input type="file" class="form-control" id="identity_proof_photo" name="identity_proof_photo">
            </div>
    
    
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="Subscriber_email" name="Subscriber_email" placeholder="subscriberemail">
                <label for="Subscriber_email">Subscriber's Email</label><br>
              </div>
            </div>
    
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="Subscriber_referedby" name="Subscriber_referedby" placeholder="subscriberreferedby">
                <label for="Subscriber_referedby">Referred By</label><br>
              </div>
            </div>
    
          </div>
        
     

        
          <div class="row mt-2">
            <h4>Contact Information</h4><hr>
            
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="tel" class="form-control" id="Subscriber_contact" name="Subscriber_contact" placeholder="contact">
                <label for="Subscriber_contact">Phone Number</label><br>
              </div>
            </div>
        
            <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="tel" class="form-control" id="Subscriber_cellcontact" name="Subscriber_cellcontact" placeholder="cellcontact">
                <label for="Subscriber_cellcontact">Cell Phone Number</label><br>
              </div>
            </div>
        
            <h4>Permanent Address</h4>
            
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
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
        
            </div></div>
        
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
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
        
            </div></div>
        
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
              <select class="form-control" id="permanent_vdcmun" name="permanent_vdcmun">
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
        
            </div></div>
        
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
              <select class="form-control" id="permanent_ward" name="permanent_ward">
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
        
            </div></div>
        
        
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="Subscriber_streetname" name="Subscriber_streetname" placeholder="streetname">
                <label for="Subscriber_lastname">Street Name</label><br>
              </div>
            </div>
          
        
        
        
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="Subscriber_streetnumber" name="Subscriber_streetnumber" placeholder="streetnumber">
                <label for="Subscriber_occupation">Street Number</label><br>
              </div>
            </div>
        
          
            <h4>Current Address</h4>
            
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
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
        
            </div></div>
        
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
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
        
            </div></div>
        
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
              <select class="form-control" id="permanent_vdcmun" name="permanent_vdcmun">
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
        
            </div></div>
        
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
              <select class="form-control" id="permanent_ward" name="permanent_ward">
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
        
            </div></div>
        
        
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="Subscriber_streetname" name="Subscriber_streetname" placeholder="streetname">
                <label for="Subscriber_lastname">Street Name</label><br>
              </div>
            </div>
          
        
        
        
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
              <div class="form-floating">
                <input type="text" class="form-control" id="Subscriber_streetnumber" name="Subscriber_streetnumber" placeholder="streetnumber">
                <label for="Subscriber_occupation">Street Number</label><br>
              </div>
            </div>
        
        
          </div>
        
              
     
            
        
              <div class="row mt-2">
                <h4>Installation Information</h4><hr>
                
                <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="installername" name="installername" placeholder="installername">
                    <label for="installername">Installer's Name</label><br>
                  </div>
                </div>
        
                <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="accesspoint" name="accesspoint" placeholder="accesspoint">
                    <label for="accesspoint">Access Point's Name</label><br>
                  </div>
                </div>
        
                <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="dropwire" name="dropwire" placeholder="dropwire">
                    <label for="dropwire">Drop-wire Serial Number</label><br>
                  </div>
                </div>
        
                
        
                <div class="col-12 col-xxl-6 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
                  <div class="form-floating">
                  <select class="form-control" id="iptype" name="iptype">
                    <option selected>Select IP Type</option>
                      <option value="static">static</option>
                    <option value="dynamic">Dynamic</option>
                    
                  </select>
                  <label for="iptype">IP Type</label></label>
        
                </div></div>
        
                <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="ipadd" name="ipadd" placeholder="ipadd">
                    <label for="ipadd">IP Address</label><br>
                  </div>
                </div>
        
                <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="vlanid" name="vlanid" placeholder="vlanid">
                    <label for="vlanid">VLAN ID</label><br>
                  </div>
                </div>
        
                <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="cpemodel" name="cpemodel" placeholder="cpemodel">
                    <label for="cpemodel">CPE Model</label><br>
                  </div>
                </div>
        
                <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="cpemacadd" name="cpemacadd" placeholder="cpemacadd">
                    <label for="cpemacadd">CPE Mac Address</label><br>
                  </div>
                </div>
        
                <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="leadid" name="leadid" placeholder="leadid">
                    <label for="leadid">Lead ID</label><br>
                  </div>
                </div>
        
                <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="orgname" name="orgname" placeholder="orgname">
                    <label for="orgname">Organization's Name</label><br>
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
{{-- <div class="container">
  <div class="row">
    <form action="/register" method="post" id="registrationForm">
      <div class="col-12 col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3" id="subscriberType">
        <!-- <label for="type">Select Subscriber Type:</label> -->
        <label for="subscriber_type" id="typeSelectPlaceholder" class="">Select Subscriber Type</label>
  
        <select class="form-control" id="subscriber_type" name="subscriber_type">
          <option selected>Select Subscriber Type</option>
          <option value="home">Home User</option>
          <option value="organization">Organization User</option>
        </select>
      </div>
  
      <!-- Personal Information Section -->
      <!-- Personal Information Section -->
      <div id="personalInfo" class="hidden">
        <form id="form_personal_information" enctype="multipart/form-data">
          <h2>Personal Information</h2>
          <div class="row mb-3">
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="first_name">First Name:</label><br>
              <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
  
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="middle_name">Middle Name:</label><br>
              <input type="text" class="form-control" id="middle_name" name="middle_name" required>
            </div>
  
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="last_name">Last Name:</label><br>
              <input type="text" class="form-control" id="last_name" name="last_name">
            </div>
          <!-- </div>
  
          <div class="row mb-3"> -->
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3 form-group">
              <h6>Gender:</h6>
              <input type="radio" id="male" name="gender" value="male">
              <label for="male">Male</label>
              <input type="radio" id="female" name="gender" value="female">
              <label for="female">Female</label>
              <input type="radio" id="other" name="gender" value="other">
              <label for="other">Other</label>
            </div>
  
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3 form-group">
              <label for="occupation">Occupation:</label>
              <input type="text" class="form-control" id="occupation" name="occupation">
            </div>
  
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3 form-group">
              <label for="pan">PAN:</label><br>
              <input type="text" class="form-control" id="pan" name="pan">
            </div>
          <!-- </div>
  
          <div class="row mb-3"> -->
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="father_full_name">Father's Full Name:</label>
              <input type="text" class="form-control" id="father_full_name" name="father_full_name">
            </div>
  
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="mother_full_name">Mother's Full Name:</label>
              <input type="text" class="form-control" id="mother_full_name" name="mother_full_name">
            </div>
  
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="grand_father_full_name">Grandparent's Full Name:</label>
              <input type="text" class="form-control" id="grand_father_full_name" name="grand_father_full_name">
            </div>
          <!-- </div>
  
          <div class="row mb-3"> -->
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="spouse_full_name">Spouse's Full Name:</label>
              <input type="text" class="form-control" id="spouse_full_name" name="spouse_full_name">
            </div>
  
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="identity_proof_type">Identity Proof Type:</label>
              <select class="form-control" id="identity_proof_type" name="identity_proof_type">
                <option selected>Document Type</option>
                <option value="nationalIdentityCard">National Identity Card</option>
                <option value="citizenship">Citizenship</option>
                <option value="passport">Passport</option>
                <option value="drivingLicense">Driving License</option>
                <option value="other">Other</option>
              </select>
            </div>
  
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="identity_proof_photo">Identity Proof Photo:</label>
              <input type="file" class="form-control" id="identity_proof_photo" name="identity_proof_photo">
            </div>
          <!-- </div>
  
          <div class="row mb-3"> -->
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="portal_user_name">Portal Username:</label>
              <input type="text" class="form-control" id="portal_user_name" name="portal_user_name">
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="portal_password">Portal Password:</label>
              <input type="password" class="form-control" id="portal_password" name="portal_password">
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="portal_enabled">Portal Enabled:</label><br>
              <div class="form-switch">
                <input type="checkbox" id="portal_enabled" class="form-check-input" role="switch" name="portal_enabled">
              </div>
            </div>
          <!-- </div>
  
          <div class="row mb-3"> -->
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="subscriber_email">Subscriber's Email:</label><br>
              <input type="email" class="form-control" id="subscriber_email" name="subscriber_email">
            </div>
  
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="referred_by">Referred By:</label><br>
              <input type="text" class="form-control" id="referred_by" name="referred_by">
            </div>
          </div>
        </form>
      </div>
  
      <!-- Additional sections for Contact Information, Organizational Information, and Installation Information would go here
      Contact Information Section  -->
      <div id="contactInfo" class="hidden">
        <form form id="form_contact_information" enctype="multipart/form-data">
          <h2>Contact Information</h2>
          <div class="row mb-3">
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="phone_number">Phone Number:</label>
              <input type="tel" class="form-control" id="phone_number" name="phone_number">
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="cellphone_number">Cell Phone Number:</label>
              <input type="tel" class="form-control" id="cellphone_number" name="cellphone_number">
              <!-- Add more fields as needed -->
            </div>
          <!-- </div> -->
  
          <h5> Permanent Address</h5>
          <!-- <div class="row mb-3"> -->
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="permanent_state">State:</label>
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
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="permanent_district">District:</label>
              <select class="form-control" id="permanent_district" name="permanent_district">
                <option selected>Select District</option>
                <option value="chitwan">Chitwan</option>
                <option value="Pokhara">Pokhara</option>
                <option value="Kathmandu">Kathmandu</option>
                <option value="Rupandehi">Rupandehi</option>
                <option value="Bhaktapur">Bhaktapur</option>
                <option value="Lalitpur">Lalitpur</option>
                <option value="Kanchanpur">Kanchanpur</option>
              </select>
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="permanent_vdc/mun">VDC/Municipality:</label>
              <select class="form-control" id="permanent_vdc/mun" name="permanent_vdc/mun">
                <option selected>Select VDC/Municipality</option>
                <option value="chitwan">Khairahani</option>
                <option value="Pokhara">Bharatpur</option>
              </select>
            </div>
          <!-- </div>
  
          <div class="row mb-3"> -->
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="permanent_ward_number">Ward:</label>
              <select class="form-control" id="permanent_ward_number" name="permanent_ward_number">
                <option selected>Select Ward</option>
                <option value="1">Koshi</option>
                <option value="2">Madhesh</option>
                <option value="3">Bagmati</option>
              </select>
            </div>
  
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="permanent_street">Street Name:</label>
              <input type="text" class="form-control" id="permanent_street" name="permanent_street">
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="permanent_home_number">Home Number:</label>
              <input type="text" class="form-control" id="permanent_home_number" name="permanent_home_number">
            </div>
          <!-- </div> -->
  
          <h5> Current Address</h5>
          <!-- <div class="row mb-3"> -->
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="current_state">State:</label>
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
            </div>
  
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="current_district">District:</label>
              <select class="form-control" id="current_district" name="current_district">
                <option selected>Select District</option>
                <option value="chitwan">Chitwan</option>
                <option value="Pokhara">Pokhara</option>
                <option value="Kathmandu">Kathmandu</option>
                <option value="Rupandehi">Rupandehi</option>
                <option value="Bhaktapur">Bhaktapur</option>
                <option value="Lalitpur">Lalitpur</option>
                <option value="Kanchanpur">Kanchanpur</option>
              </select>
            </div>
  
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="current_vdc/mun">VDC/Municipality:</label>
              <select class="form-control" id="current_vdc/mun" name="current_vdc/mun">
                <option selected>Select VDC/Municipality</option>
                <option value="chitwan">Khairahani</option>
                <option value="Pokhara">Bharatpur</option>
              </select>
            </div>
          <!-- </div>
  
          <div class="row mb-3"> -->
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="current_ward_number">Ward:</label>
              <select class="form-control" id="current_ward_number" name="current_ward_number">
                <option selected>Select Ward</option>
                <option value="1">Koshi</option>
                <option value="2">Madhesh</option>
                <option value="3">Bagmati</option>
              </select>
            </div>
  
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="current_street">Street Name:</label>
              <input type="text" class="form-control" id="current_street" name="current_street">
            </div>
  
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="current_house_number">House Number:</label>
              <input type="text" class="form-control" id="current_house_number" name="current_house_number">
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="latitude">Latitude:</label>
              <input type="text" class="form-control" id="latitude" name="latitude">
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="longitude">Longitude :</label>
              <input type="text" class="form-control" id="longitude" name="longitude">
            </div>
          </div>
        </form><br>
      </div>
  
      <!-- Organizational Information Section -->
      <div id="organizationInfo" class="hidden">
        <form form id="form_organizaion_information" enctype="multipart/form-data">
          <h2>Organizational Information</h2>
          <div class="row mb-3">
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="organization_name">Organization Name:</label>
              <input type="text" class="form-control" placeholder="Enter Organization's Name" id="organization_name" name="organization_name">
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="organization_pan">PAN:</label>
              <input type="text" class="form-control" placeholder="Enter PAN Number" id="organization_pan" name="organization_pan">
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="organization_phone">Organization's Phone Number:</label>
              <input type="text" class="form-control" placeholder="Enter Organization's Phone " id="organization_phone" name="organization_phone">
            </div>
          <!-- </div>
          <div class="row mb-3"> -->
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="organization_cellphone_number">Organization's Cell Phone:</label>
              <input type="text" class="form-control" placeholder="Enter Organization's Cell" id="organization_cellphone_number" name="organization_cellphone_number">
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="organization_email">Organization Email:</label>
              <input type="text" class="form-control" placeholder="Enter Organizational Email" id="organization_email" name="organization_email">
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="organization_reg_number">Registration Number:</label>
              <input type="text" class="form-control" placeholder="Enter Registration Number" id="organization_reg_number" name="organization_reg_number">
            </div>
          </div>
          <!-- Add more fields as needed -->
        </form>
      </div>
  
      <!-- Installation Information Section -->
      <div id="installationInfo" class="hidden">
        <form form id="form_installation_information" enctype="multipart/form-data">
          <h2>Installation Information</h2>
          <div class="row mb-3">
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="installed_by">Installer's Name:</label>
              <input type="text" class="form-control" placeholder="Enter Installer's Name" id="installed_by" name="installed_by">
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="access_point">Access Point's Name:</label>
              <input type="text" class="form-control" placeholder="Enter Access Point's Name" id="access_point" name="access_point">
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="drop_wire_used_serial_number">Drop Wire Serial Number:</label>
              <input type="text" class="form-control" placeholder="Enter Drop Wire's Serial" id="drop_wire_used_serial_number" name="drop_wire_used_serial_number">
            </div>
          <!-- </div>
          <div class="row mb-3"> -->
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="ip_type">IP Type:</label>
              <select class="form-control" id="ip_type" name="ip_type">
                <option selected>Select IP Type</option>
                <option value="1">static</option>
                <option value="2">Dynamic</option>
              </select>
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="ip_address">Ip Address:</label>
              <input type="text" class="form-control" placeholder="Enter IP Address" id="ip_address" name="ip_address">
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="vlan_id">VLAN ID:</label>
              <input type="text" class="form-control" placeholder="Enter VLAN ID" id="vlan_id" name="vlan_id">
            </div>
          <!-- </div>
          <div class="row mb-3"> -->
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="cpe_model">CPE Model:</label>
              <input type="text" class="form-control" placeholder="Enter CPE Model Number" id="cpe_model" name="cpe_model">
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="cpe_mac">CPE MAC Address:</label>
              <input type="text" class="form-control" placeholder="Enter CPE MAC address" id="cpe_mac" name="cpe_mac">
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="cpe_serial_number">CPE Serial Number:</label>
              <input type="text" class="form-control" placeholder="Enter CPE Serial Number" id="cpe_serial_number" name="cpe_serial_number">
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="plan_id">Plan Id</label>
              <select class="form-control" id="plan_id" name="plan_id">
                <option selected>Select Plan Id</option>
                <option value="tdihom100012">tdihom100012</option>
                <option value="tdihom050012">tdihom050012</option>
                <option value="custom">Custom</option>
              </select>            
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="plan_name">Plan Name</label>
              <input type="text" class="form-control" placeholder="Enter Plan Name" id="plan_id" name="plan_id">
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="plan_bandwidth">Plan Bandwidth</label>
              <input type="text" class="form-control" placeholder="Enter Plan Bandwidth" id="plan_bandwidth" name="plan_bandwidth">
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="plan_duration">Plan Duration</label>
              <input type="text" class="form-control" placeholder="Enter Plan duration in Months" id="plan_duration" name="plan_duration">
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="plan_price">Plan Price</label>
              <input type="text" class="form-control" placeholder="Enter Plan price" id="plan_price" name="plan_price">
            </div>
            <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="lead_id">Lead ID:</label>
              <input type="text" class="form-control" placeholder="Enter Lead ID" id="lead_id" name="lead_id">
            </div>
          <!-- </div>
          <div class="row mb-3"> -->
            <!-- <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
              <label for="orgName">Organization Name:</label>
              <input type="text" class="form-control" placeholder="Enter Organization's Name" id="orgName" name="orgName">
            </div> -->
          </div>
        </form>
      </div>
  
      <div class="buttons d-flex justify-content-between" id='buttons'>
        <button class="btn btn-outline-dark" type="button" id="prevBtn">Previous</button>
        <button class="btn btn-outline-dark ms-auto" type="button" id="nextBtn">Next</button>
        <button class="btn btn-outline-dark" type="Submit" id="submitbtn">Submit</button>
      </div>
    </form>
  </div>
</div> --}}



      {{-- <div class="form-outline mb-2">
        <label class="form-label" for="typeUserNameX-2">User Name</label>
        <input name="username" type="text" id="typeUserNameX-2" class="form-control form-control-md" placeholder="User Name" />
      </div>

      <div class="form-outline mb-2">
        <label class="form-label" for="typeEmailX-2">Email</label>
        <input name="email" type="email" id="typeEmailX-2" class="form-control form-control-md" placeholder="example@abc.com" />
      </div>

      <div class="form-outline mb-2">
        <label class="form-label" for="typePasswordX-2">Password</label>
        <input name="password" type="password" id="typePasswordX-2" class="form-control form-control-md" placeholder="********" />
      </div>

      <div class="form-outline mb-2">
        <label class="form-label" for="password_confirmation">Confirm Password</label>
        <input name="password_confirmation" type="password" id="password_confirmation" class="form-control form-control-md" placeholder="********" />
      </div>
      <div class="form-outline mb-2">
        <label class="form-label" for="typeModelNameX-2">CPE Model Name</label>
        <input name="router_model_name" type="text" id="typeModelNameX-2" class="form-control form-control-md" placeholder="Model Name" oninput="this.value = this.value.toUpperCase()"/>
      </div>
      <div class="form-outline mb-2">
        <label class="form-label" for="typeSerialNumberX-2">CPE Serial Number</label>
        <input name="router_serial_no" type="text" id="typeSerialNumberX-2" class="form-control form-control-md" placeholder="Serial Number" oninput="this.value = this.value.toUpperCase()" />
      </div>
      <div class="text-center">
        <button class="btn btn-info" type="submit">Register</button>
      </div>

      <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? 
        <a href="/login" class="link-danger">Login</a>
      </p> --}}



@endsection


@section('script-end')
@vite("resources/js/registerform.js")
@vite("resources/js/selectservice.js")
@endsection