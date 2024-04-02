@extends('./layouts/base')
@section('title', 'Admin-Telnet')
@section('headerLeft', 'Admin')
@section('dashboard', 'active')

@section('body')
<h1>This is admin panel</h1>



  @auth
    hello {{ \Auth::user()->username }} your id is : {{ \Auth::user()->id }}
      <br>
      
      <div class="btn-group m-2 mb-4">
        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">All roles</button>
        <ol class="dropdown-menu" style="background: #e3f2fd" aria-labelledby="dropdownMenuButton2">
          @foreach($registeredroles as $roles)
            <li class="dropdown-item">{{ $roles->role }}</li>
          @endforeach
        </ol>
      </div>
      <div class="btn-group dropdown m-2 mb-4">
        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">All users</button>
        <ol class="dropdown-menu" style="background: #e3f2fd" aria-labelledby="dropdownMenuButton2">
          @foreach($registeredusers as $users)
            <li class="dropdown-item">{{ $users->username }}</li>
          @endforeach
          </ol>
      </div>

      @role('admin')
      <div class="row text-start mb-4">
        <div class="col-auto">
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addinternetpackage">
                Add Internet Package
              </button>
        </div>


        <div class="col-auto">
          <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addiptvpackage">
              Add IPTV Package
            </button>
      </div>
      </div>

      <form class="needs-validation" novalidate action="/addinternetpackage" method="post">
        <div class="modal modal-lg" id="addinternetpackage">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
        
              <!-- Modal Header -->
              <div class="modal-header bg-dark text-light">
                <h5 class="modal-title">Add Internet Package</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
      
              <!-- Modal body -->
              <div class="modal-body">
                @csrf
                @method('post')
                <div class="serviceform">
                    <div class="row justify-content-start">
                        {{-- <h3 class="mb-1 text-center">Internet Package</h3> --}}
                        <h4 class="text-center">Internet Package</h4><hr>
                
                        <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                          <div class="form-floating">
                            <input type="text" class="form-control"  id="service_name" name="service_name" placeholder="Service Name">
                            <label for="service_name">Service Name</label>
                          </div>
                        </div>
            
                        

                        <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
                          <label for="service_isactive">Service Enabled:</label>
                          <div class="form-switch fs-4">
                            <input type="checkbox" id="service_isactive" class="form-check-input" role="switch" name="service_isactive" checked>
                          </div>
                        </div>

                        <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                          <div class="form-floating">
                            <input type="number" class="form-control" id="service_duration" name="service_duration" placeholder="Service Duration">
                            <label for="service_duration">Service Duration</label>
                          </div>
                        </div>
                        
                                   
                        <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                          <div class="form-floating">
                            <input type="text" class="form-control" id="service_price" name="service_price" placeholder="Service Price">
                            <label for="service_price">Service Price</label>
                          </div>
                        </div>
            
            
                        <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                          <div class="form-floating">
                            <input type="text" class="form-control" id="service_upload_bandwidth" name="service_upload_bandwidth" placeholder="Service Upload Bandwidth">
                            <label for="service_upload_bandwidth">Service Upload Bandwidth</label>
                          </div>
                        </div>
            
                        <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                          <div class="form-floating">
                            <input type="text" class="form-control" id="service_download_bandwidth" name="service_download_bandwidth" placeholder="Service Download Bandwidth">
                            <label for="service_download_bandwidth">Service Download Bandwidth</label>
                          </div>
                        </div>
            
                        <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                          <div class="form-floating">
                            <input type="text" class="form-control" id="service_limit_daily" name="service_limit_daily" placeholder="Service Limit/day">
                            <label for="service_limit_daily">Service Limit/day</label>
                          </div>
                        </div>
            
                        
                          
                        <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                          <div class="form-floating">
                            <input type="text" class="form-control" id="service_limit_monthly" name="service_limit_monthly" placeholder="Service Limit/month">
                            <label for="service_limit_monthly">Service Limit/month</label>
                          </div>
                        </div>
            
                        <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                          <div class="form-floating">
                            <input type="text" class="form-control" id="service_limit_scope" name="service_limit_scope" placeholder="Service Limit Scope">
                            <label for="service_limit_scope">Service Limit Scope</label>
                          </div>
                        </div>
            
                        <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                          <div class="form-floating">
                            <input type="text" class="form-control" id="service_description" name="service_description" placeholder="Service Description">
                            <label for="service_description">Service Description</label>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                      <button type="submit" class="btn btn-outline-dark">Submit</button>
                      <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancle</button>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>


      <form class="needs-validation" novalidate action="/addiptvpackage" method="post">
        <div class="modal modal-lg" id="addiptvpackage">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
        
              <!-- Modal Header -->
              <div class="modal-header bg-dark text-light">
                <h5 class="modal-title">Add IPTV Package</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
      
              <!-- Modal body -->
              <div class="modal-body">
                @csrf
                @method('post')
                <div class="serviceform">
                    <div class="row justify-content-start">
                        {{-- <h3 class="mb-1 text-center">Internet Package</h3> --}}
                        <h4 class="text-center">IPTV Package</h4><hr>
                
                        <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                          <div class="form-floating">
                            <input type="text" class="form-control"  id="service_name" name="service_name" placeholder="Service Name">
                            <label for="service_name">Service Name</label>
                          </div>
                        </div>
            
                        

                        <div class="col-12 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">
                          <label for="service_isactive">Service Enabled:</label>
                          <div class="form-switch fs-4">
                            <input type="checkbox" id="service_isactive" class="form-check-input" role="switch" name="service_isactive" checked>
                          </div>
                        </div>

                        <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                          <div class="form-floating">
                            <input type="number" class="form-control" id="service_duration" name="service_duration" placeholder="Service Duration">
                            <label for="service_duration">Service Duration</label>
                          </div>
                        </div>
                        
                                   
                        <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                          <div class="form-floating">
                            <input type="text" class="form-control" id="service_price" name="service_price" placeholder="Service Price">
                            <label for="service_price">Service Price</label>
                          </div>
                        </div>
            
            
                        <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                          <div class="form-floating">
                            <input type="text" class="form-control" id="no_of_HD_channels" name="no_of_HD_channels" placeholder="No of HD Channels">
                            <label for="no_of_HD_channels">Number of HD Channels</label>
                          </div>
                        </div>
            
                        <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                          <div class="form-floating">
                            <input type="text" class="form-control" id="no_of_SD_channels" name="no_of_SD_channels" placeholder="No of SD Channels">
                            <label for="no_of_SD_channels">Number of SD Channels</label>
                          </div>
                        </div>
            
                        <div class="col-12 col-xxl-12 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                          <div class="form-floating">
                            <input type="text" class="form-control" id="service_description" name="service_description" placeholder="Service Description">
                            <label for="service_description">Service Description</label>
                          </div>
                        </div>
            
                      </div>

                      <div class="modal-footer">
                      <button type="submit" class="btn btn-outline-dark">Submit</button>
                      <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancle</button>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>

      @endrole

    {{-- @role('manager')
      <section class="vh-60" style="background-color: #508bfc;">
        <div class="container-fluid py-3 h-60">
          <div class="row d-flex justify-content-center align-items-center h-60">
              @permission('editor')
              <div class="col-12 col-md-6 col-lg-4 col-xl-2 m-2">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                  <div class="card-body p-4 text-left">
                    <form method="post" action="/role">
                      @csrf
                      @method('post')
                      <div class="form-outline mb-2">
                        <label class="form-label" for="typeRoleX-2">Add Role in Role table</label>
                        <input type="text" class="form-control" name="role" id="typeRoleX-2">
                      </div>
                      <div class="text-center">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Add Role</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              @endpermission
              @permission('editor')
              <div class="col-12 col-md-6 col-lg-4 col-xl-3 m-2">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                  <div class="card-body p-4 text-left">
                    <form method="post" action="/deleterole">
                      @csrf
                      @method('post')
                      <div class="form-outline mb-2">
                        <label class="form-label" for="typeRoleX-2">Delete Role from Role table</label>
                        <select name="roleid" class="form-select" aria-label="Default select example" id="typeRoleX-2">
                          <option selected value="">Select Role To be deleted</option>
                          @foreach($registeredroles as $roles)
                          <option value={{ $roles->id }} >{{ $roles->id }},{{ $roles->role }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="text-center">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Delete Role</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              @endpermission
              <div class="col-12 col-md-6 col-lg-4 col-xl-3 m-2">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                  <div class="card-body p-4 text-left">
                    <form method="post" action="/adduserrole">
                        @csrf
                        @method('post')
                        <div class="form-outline mb-2">
                          <label class="form-label" for="typeIDX-2">Select User</label>
                          <select name="userid" class="form-select" aria-label="Default select example" id="typeIDX-2">
                            <option selected value="">Select user</option>
                            @foreach ($registeredusers as $user)
                            <option value={{ $user->id }}>{{ $user->id }},{{ $user->username }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-outline mb-2">
                          <label class="form-label" for="typeRoleX-2">Select Role for user</label>
                          <select name="roleid" class="form-select" aria-label="Default select example" id="typeRoleX-2">
                            <option selected value="">Select user Role</option>
                            @foreach($registeredroles as $roles)
                            <option value={{ $roles->id }} >{{ $roles->id }},{{ $roles->role }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="text-center">
                          <button class="btn btn-primary btn-lg btn-block" type="submit">Assign Role</button>
                        </div>
                      </form>
                  </div>
                </div>
              </div>


              <div class="col-12 col-md-6 col-lg-4 col-xl-3 m-2">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                  <div class="card-body p-4 text-left">
                    <form method="post" action="/removeuserrole">
                        @csrf
                        @method('post')
                        <div class="form-outline mb-2">
                          <label class="form-label" for="typeIDX-2">Select User</label>
                          <select name="userid" class="form-select" aria-label="Default select example" id="typeIDX-2">
                            <option selected value="">Select user</option>
                            @foreach ($registeredusers as $user)
                            <option value={{ $user->id }}>{{ $user->id }},{{ $user->username }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-outline mb-2">
                          <label class="form-label" for="typeRoleX-2">Select Role for user</label>
                          <select name="roleid" class="form-select" aria-label="Default select example" id="typeRoleX-2">
                            <option selected value="">Select user Role</option>
                            @foreach ($registeredroles as $role)
                            <option value={{ $role->id }}>{{ $role->id }},{{ $role->role }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="text-center">
                          <button class="btn btn-primary btn-lg btn-block" type="submit">Remove Role</button>
                        </div>
                      </form>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </section>
    @endrole

    @role('manager')
      <section class="vh-60" style="background-color: #50fce5;">
        <div class="container-fluid py-5 h-60">
          <div class="row d-flex justify-content-center align-items-center h-60">
            
            <div class="col-12 col-md-6 col-lg-4 col-xl-2 m-2">
              <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-left">
                  <form method="post" action="/permission">
                    @csrf
                    @method('post')
                    <div class="form-outline mb-2">
                      <label class="form-label" for="typeRoleX-2">Add Permission in Permissions table</label>
                      <input type="text" class="form-control" name="permission" id="typeRoleX-2">
                    </div>
                    <div class="text-center">
                      <button class="btn btn-primary btn-lg btn-block" type="submit">Add Permission</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 col-xl-3 m-2">
              <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-left">
                  <form method="post" action="/deletepermission">
                    @csrf
                    @method('post')
                    <div class="form-outline mb-2">
                      <label class="form-label" for="typeRoleX-2">Delete Permission from Permissions table</label>
                      <select name="permissionid" class="form-select" aria-label="Default select example" id="typeRoleX-2">
                        <option selected value="">Select Permission To be deleted</option>
                        @foreach($registeredpermissions as $permissions)
                        <option value={{ $permissions->id }} >{{ $permissions->id }},{{ $permissions->permission }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="text-center">
                      <button class="btn btn-primary btn-lg btn-block" type="submit">Delete Permission</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 col-xl-3 m-2">
              <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-left">
                  <form method="post" action="/adduserpermission">
                      @csrf
                      @method('post')
                      <div class="form-outline mb-2">
                        <label class="form-label" for="typeIDX-2">Select User</label>
                        <select name="userid" class="form-select" aria-label="Default select example" id="typeIDX-2">
                          <option selected value="">Select user</option>
                          @foreach ($registeredusers as $user)
                          <option value={{ $user->id }}>{{ $user->id }},{{ $user->username }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-outline mb-2">
                        <label class="form-label" for="typeRoleX-2">Select Permission for user</label>
                        <select name="permissionid" class="form-select" aria-label="Default select example" id="typeRoleX-2">
                          <option selected value="">Select user Permission</option>
                          @foreach($registeredpermissions as $permissions)
                          <option value={{ $permissions->id }} >{{ $permissions->id }},{{ $permissions->permission }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="text-center">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Assign Permission</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 col-xl-3 m-2">
              <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-left">
                  <form method="post" action="/removeuserpermission">
                      @csrf
                      @method('post')
                      <div class="form-outline mb-2">
                        <label class="form-label" for="typeIDX-2">Select User</label>
                        <select name="userid" class="form-select" aria-label="Default select example" id="typeIDX-2">
                          <option selected value="">Select user</option>
                          @foreach ($registeredusers as $user)
                          <option value={{ $user->id }}>{{ $user->id }},{{ $user->username }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-outline mb-2">
                        <label class="form-label" for="typeRoleX-2">Select Permission for user</label>
                        <select name="permissionid" class="form-select" aria-label="Default select example" id="typeRoleX-2">
                          <option selected value="">Select user Permission</option>
                          @foreach ($registeredpermissions as $permissions)
                          <option value={{ $permissions->id }}>{{ $permissions->id }},{{ $permissions->permission }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="text-center">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Remove Permission</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>
    @endrole --}}
  @endauth
@endsection