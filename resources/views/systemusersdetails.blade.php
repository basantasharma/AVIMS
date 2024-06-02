@extends('./layouts/base')
@section('title', 'Subscribers-Telnet')
@section('headerLeft', 'Subscribers')
@section('viewregistereduser', 'active')
@section('menuviewregistereduser', 'menu-open')


@section('body')
<div class="row mb-4">
    <div class="col">
        <a href="/addsystemuser" type="button" class="btn btn-outline-dark" >
            Register New User
        </a>
    </div>
</div>
<div class="row mb-4">
    <div class="col-12 mb-4">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Registered Users <i class="fa-solid fa-users"></i></h3>
                <div class="card-tools"><button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"><i data-lte-icon="expand" class="fa-solid fa-plus"></i> <i data-lte-icon="collapse" class="fa-solid fa-minus"></i></button></div><!-- /.card-tools -->
            </div><!-- /.card-header -->
            <div class="card-body">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Organization</th>
                            <th>Branch</th>
                            <th>Department</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userDetails as $user)
                            <tr class="">
                                <th><a class="text-decoration-none" href="/manageuser/?id={{ $user->id }}">{{ $user->username }}</a></th>
                                <th>{{ $user->email }}</th>
                                <th>{{ $user->organization }}</th>
                                <th>{{ $user->branch }}</th>
                                <th>{{ $user->department }}</th>

                                <th>
                                    <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#manageRole{{ $user->id }}">Roles</button>
                                    <button class="btn btn-outline-dark">Permissions</button>
                                    
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Organization</th>
                            <th>Branch</th>
                            <th>Department</th>
                            <th>Manage</th>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.card-body -->
        </div><!-- /.card -->                
    </div>
</div>
@foreach ($userDetails as $user)
<form class="needs-validation" novalidate action="/addinternetpackage" method="post">
    <div class="modal modal-lg" id="manageRole{{ $user->id }}">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
    
          <!-- Modal Header -->
          <div class="modal-header bg-dark text-light">
            <h5 class="modal-title">Manage Role</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
  
          <!-- Modal body -->
          <div class="modal-body">
            @csrf
            @method('post')
            <div class="serviceform">
                <div class="row justify-content-start">
                    {{-- <h3 class="mb-1 text-center">Internet Package</h3> --}}
                    <h4 class="text-center">Roles</h4><hr>
            
                    <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="username" name="Username" placeholder="User Name" value="{{ old('username')? old('username') : $user->username }}">
                        <label for="username">Username</label>
                      </div>
                    </div>
                    <div class="col-12 col-xxl-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-3">
                        {{-- <div class="form-floating"> --}}
                                {{-- @foreach($userroles as $roles) --}}
                                {{-- <input type="checkbox" name="role" id="role" value="{{ $roles->name }}">
                                <input type="checkbox" name="role" id="role" value="{{ $roles->name }}">
                                <input type="checkbox" name="role" id="role" value="{{ $roles->name }}">
                                <input type="checkbox" name="role" id="role" value="{{ $roles->name }}">
                                <input type="checkbox" name="role" id="role" value="{{ $roles->name }}"> --}}
                                {{-- @endforeach --}}
                                <input type="checkbox" name="role" id="role1" value="hello">
                                <label for="role1">Technician</label>
                                <input type="checkbox" name="role" id="role2" value="hello">
                                <label for="role2">Admin</label>
                                <input type="checkbox" name="role" id="role3" value="hello">
                                <label for="role3">manager</label>
                        {{-- </div> --}}
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
@endforeach


@endsection


@section('script-end')
<link href="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.css" rel="stylesheet">
 <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.js"></script>

<script>
    new DataTable('#example', {
    order: [[4, 'asc']],
    columnDefs: [
        {
            target: 3,
            visible: true,
            searchable: true
        }
    ]
});
</script>

@endsection