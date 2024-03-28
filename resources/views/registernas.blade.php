@extends('./layouts/base')
@section('title', 'Register-Telnet')
@section('headerLeft', 'Register NAS')
@section('registernas', 'active')


@section('scripts-top')

@endsection

@section('body')

<form id= "nasForm" action="#" method="post">
  @csrf
  @method('post')
<div class="row justify-content-center">
  <div class=" col-12 col-xxl-6 col-xl-8 col-lg-8 col-md-8 col-sm-12">
      <h3 class="mb-1 text-center">NAS Form</h3>
        <div class="row">
          <div class="col-auto">
            <label for="nasId">ID<span>*</span></label>
          </div>
          <div class="col-auto">
            <input class="form-control" type="text" id="nasId" name="nasId" required><br>
          </div>
          <div class="col-auto">
            <label for="nasName">NAS-Name<span>*</span></label>
          </div>
          <div class="col-auto">
            <input class="form-control" type="text" id="nasName" name="nasName" required><br>
          </div>
          <div class="col-auto">
            <label for="nasShortName">Short Name<span>*</span></label>
          </div>
          <div class="col-auto">
            <input class="form-control" type="text" id="nasShortName" name="nasShortName" required><br>
          </div>

          <label for="nasType">Type<span>*</span></label>
          <select id="nasType" name="nasType" required>
              <option value="">Select Type</option>
              <option value="type1">Generic</option>
              <option value="type2">Mikrotik</option>
              <option value="custom">CISCO</option>
              <option value="custom">UBNT Access point</option>
              <option value="custom">Ubiquiti</option>
              <option value="custom">Juniper</option>  
          </select><br>
          <!-- <input type="text" id="customTypeInput" name="customTypeInput" style="display: none;" placeholder="Enter Custom Type"><br> -->

          <label for="nasPorts">Ports (comma separated)<span>*</span></label>
          <input type="text" id="nasPorts" name="nasPorts" required><br>

          <label for="nasSecret">Secret<span>*</span></label>
          <input type="password" id="nasSecret" name="nasSecret" required><br>

          <label for="nasServer">Server</label>
          <input type="text" id="nasServer" name="nasServer"><br>

          <label for="nasCommunity">Community</label>
          <input type="text" id="nasCommunity" name="nasCommunity"><br>

          <label for="nasCommunity">Description</label>
          <input type="text" id="nasdescription" name="nasdescription"><br>

          <input type="submit" value="Submit">
        </div>
      <div class="error"> Please Fill out the required Field</div>
  
    </div>
  </div>
</form>
@endsection


@section('script-end')

@endsection