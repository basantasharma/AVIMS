@extends('./layouts/base')
@section('title', 'Register-Telnet')
@section('headerLeft', 'Register NAS')
@section('registernas', 'active')
@section('menuregister', 'menu-open')


@section('scripts-top')

@endsection

@section('body')

<div class="container-fluid">
  <div class="row justify-content-center">  
      <div class="col-12 col-xxl-6 col-xl-8 col-lg-8 col-md-8 col-sm-12">
        <form action="/registernas" id= "nasForm" method="post">
          @csrf
          @method('post')

          <div class="nasform">

            <div class="row justify-content-start">
              <h3 class="mb-1 text-center">Nas Form</h3>

              <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                <div class="form-floating">
                  <input type="text" class="form-control"  id="nasId" name="nasId" placeholder="Nas ID" value="{{ old('nasId') }}">
                  <label for="nasId">Nas ID</label>
                </div>
              </div>

              <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                <div class="form-floating">
                  <input type="text" class="form-control"  id="nasName" name="nasname" placeholder="Nas Name (Ip address)" pattern="^((\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$" required value="{{ old('nasname') }}">
                  <label for="nasName">Nas Name (IP address)</label>
                </div>
              </div>

              <div class="col-12 col-xxl-6  col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                <div class="form-floating">
                  <input type="text" class="form-control"  id="nasShortName" name="shortname" placeholder="Nas Short Name" value="{{ old('shortname') }}">
                  <label for="nasShortName">Short Name</label>
                </div>
              </div>

              
              <div class="col-12 col-xxl-6 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="form-floating">
                  <select class="form-control" id="nasType" name="type" >
                    <option value="">Select Nas Type</option>
                    <option value="generic" {{ (old('type') == 'generic')? 'selected' : '' }}>Generic</option>
                    <option value="mikrotik" {{ (old('type') == 'mikrotik')? 'selected' : '' }}>Mikrotik</option>
                    <option value="cisco" {{ (old('type') == 'cisco')? 'selected' : '' }}>CISCO</option>
                    <option value="ubnt" {{ (old('type') == 'ubnt')? 'selected' : '' }}>UBNT Access point</option>
                  </select>
                  <label for="nasType">Select Nas Type</label>
                </div>
              </div>
              

              <div class="col-12 col-xxl-6  col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                <div class="form-floating">
                  <input type="text" class="form-control"  id="nasPorts" name="ports" placeholder="Nas Ports" value="{{ old('ports') }}">
                  <label for="nasPorts">Ports (comma Separated)</label>
                </div>
              </div>

              <div class="col-12 col-xxl-6  col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                <div class="form-floating">
                  <input type="password" class="form-control"  id="nasSecret" name="secret" placeholder="Nas Secret" value="{{ old('secret') }}">
                  <label for="nasSecret">Secret</label>
                </div>
              </div>

              <div class="col-12 col-xxl-6  col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                <div class="form-floating">
                  <input type="text" class="form-control"  id="nasServer" name="server" placeholder="Nas server" value="{{ old('server') }}">
                  <label for="nasServer">Server</label>
                </div>
              </div>

              <div class="col-12 col-xxl-6  col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                <div class="form-floating">
                  <input type="text" class="form-control"  id="nasCommunity" name="community" placeholder="Nas Community" value="{{ old('community') }}">
                  <label for="nasCommunity">Community</label>
                </div>
              </div>

              <div class="col-12 col-xxl-12  col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                <div class="form-floating">
                  <input type="text" class="form-control"  id="nasdescription" name="description" placeholder="Nas Description" value="{{ old('description') }}">
                  <label for="nasdescription">Description</label>
                </div>
              </div><br>

            
              
            </div>  
            <div class="row justify-content-center">
              <button type="submit" class="btn btn-outline-dark col-12 col-xxl-3 col-xl-2 col-lg-6 col-md-6 col-sm-6 mb-3 ">Submit</button></div>
          </div>
       
        </form>
      </div>
   
  </div>
</div>
@endsection


@section('script-end')

@endsection