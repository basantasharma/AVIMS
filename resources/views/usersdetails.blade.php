@extends('./layouts/base')
@section('title', 'Subscribers-Telnet')
@section('headerLeft', 'Subscribers')
@section('viewregistereduser', 'active')
@section('menuviewregistereduser', 'menu-open')


@section('body')

<div class="row mb-4">
    
    <div class="col-12 mb-4">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Registered Subscribers <i class="fa-solid fa-users"></i></h3>
                <div class="card-tools"><button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"><i data-lte-icon="expand" class="fa-solid fa-plus"></i> <i data-lte-icon="collapse" class="fa-solid fa-minus"></i></button></div><!-- /.card-tools -->
            </div><!-- /.card-header -->
            <div class="card-body">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Phone Number</th>
                            <th>Bandwidth</th>
                            <th>Organization</th>
                            <th>Days Remaining</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userDetails as $user)
                        @php
                            $daysRemaining = (\Carbon\Carbon::now())->diffInDays(\Carbon\Carbon::parse($user->expires_at), false);
                            // dd($daysRemaining);
                        @endphp
                            <tr class="{{ $daysRemaining>0 ? 'text-success': 'text-danger'  }}">
                                <th><a class="{{ $daysRemaining>0 ? 'text-success': 'text-danger'  }} text-decoration-none" href="/manageuser/?cpe_serial_number={{ $user->cpe_serial_number }}">{{ $user->subscriber_username }}</a></th>
                                <th>{{ $user->phone_number }}</th>
                                <th>{{ $user->service_download_bandwidth }}/{{ $user->service_upload_bandwidth }} Mbps</th>
                                <th>{{ $user->lead_organization }}</th>
                                <th>
                                    @if($daysRemaining > 0)
                                    {{ $daysRemaining }} Days
                                    @else
                                    Expired
                                    @endif
                                </th>
                                <th>
                                    <button class="btn btn-outline-dark">recharge</button>
                                    @if($daysRemaining < 0)
                                    <button class="btn btn-outline-danger">Extend Days</button> 
                                    @endif
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>User Name</th>
                            <th>Phone Number</th>
                            <th>Bandwidth</th>
                            <th>Organization</th>
                            <th>Days Remaining</th>
                            <th>Actions</th>
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