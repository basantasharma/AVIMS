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
                                    <button class="btn btn-outline-dark">Roles</button>
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