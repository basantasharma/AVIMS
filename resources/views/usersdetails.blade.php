@extends('./layouts/base')
@section('title', 'Subscribers-Telnet')
@section('headerLeft', 'Subscribers')
@section('viewregisteredsubscriber', 'active')
@section('menuviewregistereduser', 'menu-open')


@section('body')
<div class="row mb-4">
    <div class="col">
        <a href="/register" type="button" class="btn btn-outline-dark" >
            Register New User
        </a>
    </div>
</div>
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
                                $extendedDays = null;
                                $daysRemaining = (\Carbon\Carbon::parse(\Carbon\Carbon::now()->format("d M Y")))->diffInDays((\Carbon\Carbon::parse(\Carbon\Carbon::parse($user->expires_at))->format("d M Y")), false);
                                // $daysRemaining = (\Carbon\Carbon::now())->diffInDays(\Carbon\Carbon::parse($user->expires_at), false);
                                // var_dump($daysRemaining);
                                if($daysRemaining < 0)
                                {
                                    if(!is_Null($user->extended_till)){

                                        $extendedDays = (\Carbon\Carbon::parse(\Carbon\Carbon::now()->format("d M Y")))->diffInDays(\Carbon\Carbon::parse(\Carbon\Carbon::parse($user->extended_till)->format("d M Y")), false);
                                        // $extendedDays = (\Carbon\Carbon::parse(\Carbon\Carbon::parse($user->expires_at)->format("d M Y")))->diffInDays(\Carbon\Carbon::parse(\Carbon\Carbon::parse($user->extended_till)->format("d M Y")), false);
                                    }
                                    // $daysRemaining = $extendedDays;
                                    // if($daysRemaining<0)
                                }
                                // if($daysRemaining < 0 & is_Null($user->extended_till)$daysRemaining < 0 & is_Null($user->extended_till))
                                // {

                                // }
                                // dd($daysRemaining);
                            @endphp
                            <tr class="{{ $daysRemaining>=0 ? 'text-success':($extendedDays>0 ? 'text-warning' : 'text-danger' ) }}">
                                <th><a class="{{ $daysRemaining>=0 ? 'text-success':($extendedDays>0? 'text-warning' : 'text-danger' ) }} text-decoration-none" href="/managesubscriber/?cpe_serial_number={{ $user->cpe_serial_number }}">{{ $user->subscriber_username }}</a></th>
                                <th>{{ $user->phone_number }}</th>
                                <th>{{ $user->service_download_bandwidth }}/{{ $user->service_upload_bandwidth }} Mbps</th>
                                <th>{{ $user->lead_organization }}</th>
                                <th>
                                    @if($daysRemaining >= 0 & $extendedDays == null)
                                    {{ $daysRemaining }} Days
                                    @elseif($daysRemaining < 0 & $extendedDays> 0)
                                    {{ $extendedDays }} Days
                                    @elseif($daysRemaining < 0 & $extendedDays <0)
                                    Expired
                                    @else
                                    Extension Remaining
                                    @endif
                                </th>
                                <th>
                                    <a class="btn btn-outline-dark">recharge</a>
                                    {{-- yehabaata tala milauna baki xa --}}

                                    {{-- @if($daysRemaining >= 0 & $extendedDays == null)
                                    @elseif($daysRemaining < 0 & $extendedDays> 0)
                                    @elseif($daysRemaining < 0 & $extendedDays <0)
                                    Expired
                                    @else --}}
                                    @if($daysRemaining<0 & $extendedDays == null)
                                        <a class="btn btn-outline-danger" href="/extendsubscriber?id={{ $user->id }}">Extend </a>
                                    @endif
                                    {{-- @if($daysRemaining < 0 & $extendedDays == Null)
                                    <a class="btn {{ $daysRemaining>=0 ? 'btn-outline-danger' : ( $extendedDays>0 ? 'disabled' : ( $extendedDays == Null ? 'btn-outline-danger' : 'disabled') ) }}" href="/extendsubscriber?id={{ $user->id }}">Extend Days</a> 
                                    @endif --}}
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