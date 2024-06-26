@extends('./layouts/base')
@section('title', 'Dashboard-Telnet')
@section('headerLeft', 'Dashboard')
@section('dashboard', 'active')


@section('body')
{{-- @dd($userDetails) --}}
<!--begin::Row-->
<div class="row mb-4 "><!-- Start col -->
    <div class="col">
        <div class="row">
            <div class="col-12 col-xxl-12 col-xl-12 col-lg-6 col-md-6 col-sm-6 mb-4">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Router Info <i class="fa-solid fa-wifi"></i></h3>
                        <div class="card-tools"><button type="button" class="btn btn-tool"
                                data-lte-toggle="card-collapse"><i data-lte-icon="expand" class="fa-solid fa-plus"></i>
                                <i data-lte-icon="collapse" class="fa-solid fa-minus"></i></button></div>
                        <!-- /.card-tools -->
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Status</td>
                                    <td class="text-end"><span
                                            class="badge {{ $routerInfo['active'] === 'Active' ? 'text-bg-success' : 'text-bg-danger' }}  p-2">{{
                                            $routerInfo['active'] }}</span></td>
                                </tr>
                                <tr>
                                    <td>Duration</td>
                                    <td class="text-end">
                                        @if ($routerInfo['lastBoot'])
                                        <span class="p-2">{{ $routerInfo['lastBoot']['h'] }} Hrs {{
                                            $routerInfo['lastBoot']['i'] }} min</span>
                                        @else
                                        <span class="p-2"> Router's Offline</span>
                                        @endif
                                    </td>
                                    {{-- <td class="text-end"><span class="p-2">{{
                                            Carbon\Carbon::parse($routerInfo['lastBoot'], 'UTC')->format('H:i') }} {{
                                            Carbon\Carbon::parse($routerInfo['lastBoot'], 'UTC')->format('A') }} </span>
                                    </td> --}}
                                </tr>
                                <tr>
                                    <td>Power</td>
                                    <td class="text-end"><span class="badge {{ $routerInfo['active'] === 'Active' ? 'text-bg-success' : 'text-bg-danger' }} p-2">{{ $routerInfo['routerPower'] }}</span></td>
                                </tr>
                                <tr>
                                    <td>Restart</td>
                                    <td class="text-end">
                                        <span>
                                            @if(Auth::guard('web')->check())
                                            <a href="/rebootrouter?cpe_serial_number={{ $_REQUEST['cpe_serial_number']}}"><i class="fa-solid fa-repeat"></i></a>
                                            @else
                                            <a class="btn btn-outline-danger" href="/reboot"><i class="fa-solid fa-repeat"></i></a>
                                            @endif
                                            {{-- <form action="/reboot" method="post">@csrf @method('post')<button class="btn btn-danger btn-sm" type="submit"><i class="fa-solid fa-repeat"></i></button></form> --}}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div>
    
            <div class="col-12 col-xxl-12 col-xl-12 col-lg-6 col-md-6 col-sm-6 mb-4">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Days Remaining <i class="fa-regular fa-calendar-days"></i></h3>
                        <div class="card-tools"><button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"><i data-lte-icon="expand" class="fa-solid fa-plus"></i> <i data-lte-icon="collapse" class="fa-solid fa-minus"></i></button></div><!-- /.card-tools -->
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Package</th>
                                    <th>Activated</th>
                                    <th>Expiry</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userDetails as $user)
                                    @php
                                        $totalDays = (\Carbon\Carbon::parse(\Carbon\Carbon::parse($user->updated_at)->format("d M Y")))->diffInDays((\Carbon\Carbon::parse(\Carbon\Carbon::parse($user->expires_at))->format("d M Y")), true);
                                        // var_dump($totalDays);
                                        $extendedDays = null;
                                        $daysRemaining = (\Carbon\Carbon::parse(\Carbon\Carbon::now()->format("d M Y")))->diffInDays((\Carbon\Carbon::parse(\Carbon\Carbon::parse($user->expires_at))->format("d M Y")), false);
                                        $percentages = (int)(($daysRemaining/$totalDays)*100);
                                        // $daysRemaining = (\Carbon\Carbon::now())->diffInDays(\Carbon\Carbon::parse($user->expires_at), false);
                                        if($daysRemaining < 0)
                                        {
                                            if(!is_Null($user->extended_till)){
                                                $totalDays = (\Carbon\Carbon::parse(\Carbon\Carbon::parse($user->updated_at)->format("d M Y")))->diffInDays((\Carbon\Carbon::parse(\Carbon\Carbon::parse($user->extended_till))->format("d M Y")), true);
                                                $extendedDays = (\Carbon\Carbon::parse(\Carbon\Carbon::now()->format("d M Y")))->diffInDays(\Carbon\Carbon::parse(\Carbon\Carbon::parse($user->extended_till)->format("d M Y")), false);
                                                $percentages = (int)(($extendedDays/$totalDays)*100);
                                                // $extendedDays = (\Carbon\Carbon::parse(\Carbon\Carbon::parse($user->expires_at)->format("d M Y")))->diffInDays(\Carbon\Carbon::parse(\Carbon\Carbon::parse($user->extended_till)->format("d M Y")), false);
                                            }
                                        }
                                        // dd($daysRemaining);
                                        var_dump($extendedDays);
                                    @endphp
                                <tr>
                                    <td class="{{ $daysRemaining>=0 ? 'text-success':($extendedDays>0 ? 'text-info' : 'text-danger' ) }}">
                                        {{-- <div class="{{ $daysRemaining>=0 ? 'text-success':($extendedDays>0? 'text-info' : 'text-danger' ) }}"> --}}
                                            {{ $user->service_table_name }}
                                        {{-- </div> --}}
                                    </td>
                                    <td class="{{ $daysRemaining>=0 ? 'text-success':($extendedDays>0 ? 'text-info' : 'text-danger' ) }}">{{ \Carbon\Carbon::parse($user->updated_at)->format('Y M d') }}</td>
                                    <td class="{{ $daysRemaining>=0 ? 'text-success':($extendedDays>0 ? 'text-info' : 'text-danger' ) }}">{{ \Carbon\Carbon::parse($user->expires_at)->format('Y M d') }}</td>
                                </tr>
                                @endforeach
                                {{-- <td><button class="btn btn-danger float-end">Pay Advance</button></td> --}}
                                
                                {{-- <tr>
                                    <td><h4 class="">20 days</h4></td>
                                </tr> --}}
                            </tbody>
                            <tfoot>
                                
                            </tfoot>
                        </table>
                        <div class="{{ $daysRemaining>=0 ? 'text-success':($extendedDays>0 ? 'text-info' : 'text-danger' ) }} pt-2">
                            @if($daysRemaining >= 0)
                                <span>{{ $daysRemaining }} Days Remaining</span>
                                <button class="btn btn-outline-success float-end me-2"> Pay in Advance</button>
                                <div class="progress mt-3" role="progressbar" aria-label="Success striped example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: {{ $percentages }}%; border-radius: 0.375rem;"></div>
                                </div>
                            @else
                                @if($extendedDays>0)
                                <span>{{ $extendedDays }} Days Remaining</span>
                                <button class="btn btn-outline-success float-end me-2"> Pay The DUE</button>
                                <div class="progress mt-3" role="progressbar" aria-label="Success striped example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-{{ $percentages>50 ? 'success': ($percentages>32 ? 'warning' : 'danger') }}" style="width: {{ $percentages }}%; border-radius: 0.375rem;"></div>
                                </div>
                                @else
                                    @if($extendedDays === null)
                                        <span>Your package is Expired</span>
                                        <a href="/extends" class="btn btn-outline-warning float-end">Extend</a>
                                        <button class="btn btn-outline-warning float-end me-2"> Pay the DUE</button>
                                        {{-- <div class="progress mt-3" role="progressbar" aria-label="Success striped example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-{{ $percentages>50 ? 'success': ($percentages>32 ? 'warning' : 'danger') }}" style="width: {{ $percentages }}%; border-radius: 0.375rem;"></div>
                                        </div> --}}
                                    @else
                                    <span>Your extended period is Expired</span>
                                    <a class="btn btn-outline-danger disabled float-end" disabled> Extend</a>
                                    <button class="btn btn-outline-danger float-end me-2"> Pay the DUE</button>
                                    @endif
                                @endif
                            @endif
                        </div>                        
                    </div><!-- /.card-body -->
                </div><!-- /.card -->                
            </div>
        </div>
    </div>

    <div class="col-12 col-xxl-8 col-xl-8 col-lg-12 col-md-12 col-sm-12 mb-4 connectedSortable ">
      <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title">Internet uses <i class="fa-solid fa-chart-line"></i></h3>
          <div class="card-tools"><button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"><i data-lte-icon="expand" class="fa-solid fa-plus"></i> <i data-lte-icon="collapse" class="fa-solid fa-minus"></i></button></div><!-- /.card-tools -->
        </div>
        <div class="card-body">
          <div id="revenue-chart"></div>
        </div>
      </div><!-- /.card -->
    </div><!-- /.Start col -->

    <div class="col-12 col-xxl-4 col-xl-4  col-lg-4 col-md-4 col-sm-12 mb-4">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Internet Bandwidth <i class="fa-solid fa-bolt"></i></h3>
                <div class="card-tools"><button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"><i data-lte-icon="expand" class="fa-solid fa-plus"></i> <i data-lte-icon="collapse" class="fa-solid fa-minus"></i></button></div><!-- /.card-tools -->
            </div><!-- /.card-header -->
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><i class="fa-solid fa-circle-down fa-2xl mx-2 text-success"></i>Download</th>
                            <th><i class="fa-solid fa-circle-up fa-2xl mx-2 text-success"></i>Upload</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>200Mbps</td>
                            <td>100Mbps</td>
                        </tr>
                    </tbody>
                </table>
               
            </div><!-- /.card-body -->
        </div><!-- /.card -->        
    </div><!-- /.col -->

    <div class="col-12 col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-4">
        <div class="card  card-dark">
            <div class="card-header">
                <h3 class="card-title">My Last Tickets <i class="fa-solid fa-ticket"></i></h3>
                <div class="card-tools"><button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"><i data-lte-icon="expand" class="fa-solid fa-plus"></i> <i data-lte-icon="collapse" class="fa-solid fa-minus"></i></button></div><!-- /.card-tools -->
            </div><!-- /.card-header -->
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Issue</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Assigned to</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2 Days ago</td>
                            <td>Gaming Issue</td>
                            <td>High Ping</td>
                            <td><span class="badge text-bg-success">Solved</span></td>
                            <td>Basanta Sharma</td>
                        </tr>    
                    </tbody>
                </table>

            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- /.col -->
    
</div><!-- /.row (main row) -->
  
@endsection

@section('script-end')
<!-- apexcharts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js" integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script><!-- ChartJS -->
<script>
    // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
    // IT'S ALL JUST JUNK FOR DEMO
    // ++++++++++++++++++++++++++++++++++++++++++

    const sales_chart_options = {
        series: [{
                name: "Uploads",
                data: [28, 48, 40, 19, 86, 27, 90],
            },
            {
                name: "Downloads",
                data: [65, 59, 80, 81, 56, 55, 40],
            },
        ],
        chart: {
            height: 300,
            type: "area",
            toolbar: {
                show: false,
            },
        },
        legend: {
            show: false,
        },
        colors: ["#0d6efd", "#20c997"],
        dataLabels: {
            enabled: false,
        },
        stroke: {
            curve: "smooth",
        },
        xaxis: {
            type: "datetime",
            categories: [
                "2023-01-01",
                "2023-02-01",
                "2023-03-01",
                "2023-04-01",
                "2023-05-01",
                "2023-06-01",
                "2023-07-01",
            ],
        },
        tooltip: {
            x: {
                format: "MMMM yyyy",
            },
        },
    };

    const sales_chart = new ApexCharts(
        document.querySelector("#revenue-chart"),
        sales_chart_options
    );
    sales_chart.render();
</script>
@endsection