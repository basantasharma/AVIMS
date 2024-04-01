@extends('./layouts/base')
@section('title', 'Register-Telnet')
@section('headerLeft', 'Register NAS')
@section('registernas', 'active')


@section('scripts-top')

@endsection

@section('body')

<div class="container-fluid">
  <div class="row justify-content-center">  
      <div class="col-12 col-xxl-6 col-xl-8 col-lg-8 col-md-8 col-sm-12">
        <form id= "nasForm" method="post">
          @csrf
          @method('post')

          <div class="nasform">

            <div class="row justify-content-start">
              <h3 class="mb-1 text-center">Nas Form</h3>

              <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                <div class="form-floating">
                  <input type="text" class="form-control"  id="nasId" name="nasId" placeholder="Nas ID">
                  <label for="nasId">Nas ID</label>
                </div>
              </div>

              <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                <div class="form-floating">
                  <input type="text" class="form-control"  id="nasName" name="nasName" placeholder="Nas Name">
                  <label for="nasName">Nas Name</label>
                </div>
              </div>

              <div class="col-12 col-xxl-6  col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                <div class="form-floating">
                  <input type="text" class="form-control"  id="nasShortName" name="nasShortName" placeholder="Nas Short Name">
                  <label for="nasShortName">Short Name</label>
                </div>
              </div>

              
              <div class="col-12 col-xxl-6 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="form-floating">
                  <select class="form-control" id="nasType" name="nasType">
                    <option selected value="">Select Nas Type</option>
                    <option value="type1">Generic</option>
                    <option value="type2">Mikrotik</option>
                    <option value="Custom">CISCO</option>
                    <option value="Custom">UBNT Access point</option>
                  </select>
                  <label for="nasType">Select Internet Package</label>
                </div>
              </div>
              

              <div class="col-12 col-xxl-6  col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                <div class="form-floating">
                  <input type="text" class="form-control"  id="nasPorts" name="nasPorts" placeholder="Nas Ports">
                  <label for="nasPorts">Ports (comma Separated)</label>
                </div>
              </div>

              <div class="col-12 col-xxl-6  col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                <div class="form-floating">
                  <input type="password" class="form-control"  id="nasSecret" name="nasSecret" placeholder="Nas Secret">
                  <label for="nasSecret">Secret</label>
                </div>
              </div>

              <div class="col-12 col-xxl-6  col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                <div class="form-floating">
                  <input type="text" class="form-control"  id="nasServer" name="nasServer" placeholder="Nas server">
                  <label for="nasServer">Server</label>
                </div>
              </div>

              <div class="col-12 col-xxl-6  col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                <div class="form-floating">
                  <input type="text" class="form-control"  id="nasCommunity" name="nasCommunity" placeholder="Nas Community">
                  <label for="nasCommunity">Community</label>
                </div>
              </div>

              <div class="col-12 col-xxl-12  col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                <div class="form-floating">
                  <input type="text" class="form-control"  id="nasdescription" name="nasdescription" placeholder="Nas Description">
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