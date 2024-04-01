@extends('./layouts/base')
@section('title', 'Services-Telnet')
@section('headerLeft', 'Services')
@section('services', 'active')


@section('body')
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class=" col-12 col-xxl-6 col-xl-8 col-lg-8 col-md-8 col-sm-12">
            <form action="/addinternetpackage" method="post"  >
            @csrf
      @method('post')
      
                <div class="serviceform">
                    <div class="row justify-content-start">
                        <h3 class="mb-1 text-center">Internet Package</h3>
                        <h4>Add Internet Packages</h4><hr>
                
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
                      <div class="row justify-content-center">
                      <button type="submit" class="btn btn-outline-dark col-12 col-xxl-3 col-xl-2 col-lg-6 col-md-6 col-sm-6 mb-3 ">Add Package</button></div>
                </div>
            </form>
    
</div>
</div>

    <h1 class="text-center my-4">Our Services</h1>
    <div class="row justify-content-center">
        <div class="col-12 col-xxl-6 col-xl-6  col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Monitoring : <i class="fa-solid fa-gauge-high"></i></h3>
                    <div class="card-tools"><button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"><i data-lte-icon="expand" class="fa-solid fa-plus"></i> <i data-lte-icon="collapse" class="fa-solid fa-minus"></i></button></div><!-- /.card-tools -->
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="clearfix">
                        <ul class="list-group list-group-flush">
                            <div>
                                <img src="/images/monitoring.png" class="col-md-6 float-md-start m-4 ms-md-3 feature_img" alt="...">
                                <p class="card-text mt-4"> Monitoring CPE (Customer Premises Equipment) devices using the TR-069 protocol, also known as the CPE WAN Management Protocol (CWMP), involves leveraging a set of features and functionalities designed for remote management and provisioning of CPE devices connected to an IP network. This protocol is a critical tool for service providers to manage, monitor, and troubleshoot customer premises equipment such as routers, modems, and gateways.
                                </p>
                            </div>
                        </ul>
                        <ul class="list-group list-group-flush">
                            <div class="mx-4">
                                <img src="/images/monitoring.png" class="col-md-6 float-md-end m-4 ms-md-3 feature_img" alt="...">
                            <p class="fs-6 fw-bold">Key Components and Applications:</p>
                            <ul>
                                <li>Management Server Subtree</li>
                                <li>WAN Devices Subtree</li>
                                <li>Diagnosistic and Monitoring</li>
                                <li>Security and Authentication</li>
                                <li>Monitoring Network Traffic and Devices</li>
                            </ul>
                            </div>
                        </ul>
                        <ul class="list-group list-group-flush">
                            <div class="mx-4">
                                In summary, monitoring CPE devices using TR-069 involves leveraging a comprehensive set of features for remote management, diagnostics, and monitoring. This protocol supports secure, efficient, and scalable management of CPE devices, making it a vital tool for service providers to maintain high-quality, reliable, and secure networks.
                            </div>
                        </ul>
                    </div>
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        </div><!-- /.col -->
        <div class="col-12 col-xxl-6 col-xl-6  col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Configure Settings : <i class="fa-solid fa-gear"></i></h3>
                    <div class="card-tools"><button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"><i data-lte-icon="expand" class="fa-solid fa-plus"></i> <i data-lte-icon="collapse" class="fa-solid fa-minus"></i></button></div><!-- /.card-tools -->
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="clearfix">
                        <ul class="list-group list-group-flush">
                            <div>
                                <img src="/images/setting.png" class="col-md-6 float-md-start m-4 ms-md-3 feature_img" alt="...">
                                <p class="card-text mt-4"> Configuring CPE (Customer Premises Equipment) devices using the TR-069 protocol, also known as the CPE WAN Management Protocol (CWMP), is a powerful method for service providers to manage and configure their devices remotely. This protocol is defined by the Broadband Forum and is widely used for its ability to support auto-configuration, software or firmware image management, status and performance management, and diagnostics.
                                </p>
                            </div>
                        </ul>
                        <ul class="list-group list-group-flush">
                            <div class="mx-4">
                                <img src="/images/setting.png" class="col-md-6 float-md-end m-4 ms-md-3 feature_img" alt="...">
                                <p class="fs-6 fw-bold">Key Features and Capabilities:</p>
                                <ul>
                                    <li>Auto-Configuration</li>
                                    <li>Dynamic Service Provisioning</li>
                                    <li>Software/Firmware Image Management</li>
                                    <li>Status and Performance Monitoring</li>
                                    <li>Diagnostics</li>
                                </ul>
                            </div>
                        </ul>
                        <ul class="list-group list-group-flush">
                            <div class="mx-4">
                                In summary, configuring CPE devices using TR-069 offers a secure, efficient, and scalable solution for service providers to manage and configure their devices remotely. This protocol supports a wide range of functionalities, from auto-configuration and firmware management to status monitoring and diagnostics, making it a vital tool for maintaining high-quality, reliable, and secure networks.
                            </div>
                        </ul>
                    </div>
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        </div><!-- /.col -->
        <div class="col-12 col-xxl-6 col-xl-6  col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Manage Connected Devices : <i class="fa-solid fa-mobile-screen-button"></i></h3>
                    <div class="card-tools"><button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"><i data-lte-icon="expand" class="fa-solid fa-plus"></i> <i data-lte-icon="collapse" class="fa-solid fa-minus"></i></button></div><!-- /.card-tools -->
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="clearfix">
                        <ul class="list-group list-group-flush">
                            <div>
                                <img src="/images/manage.png" class="col-md-6 float-md-start m-4 ms-md-3 feature_img" alt="...">
                                <p class="card-text mt-4"> Managing connected devices, particularly in the context of IoT (Internet of Things) applications, leverages the TR-069 protocol to provide a standardized approach for control and management. This protocol is essential for service providers looking to enter the IoT market, offering a framework for automated discovery, extreme scaling, zero-touch provisioning, bulk operations, secure device attribute addition, and closed-loop automation to ensure IoT security and network efficiency.
                                </p>
                            </div>
                        </ul>
                        <ul class="list-group list-group-flush">
                            <div class="mx-4">
                                <img src="/images/manage.png" class="col-md-6 float-md-end m-4 ms-md-3 feature_img" alt="...">
                            <p class="fs-6 fw-bold">Key Features and Capabilities:</p>
                            <ul>
                                <li>Automated Discovery</li>
                                <li>Extreme Scaling</li>
                                <li>Zero-Touch Provisioning</li>
                                <li>Bulk Operations</li>
                                <li>Monitoring Connected Devices</li>
                            </ul>
                            </div>
                        </ul>
                        <ul class="list-group list-group-flush">
                            <div class="mx-4">
                                Managing connected devices using TR-069 offers a comprehensive solution for service providers looking to enter the IoT market. The protocol's features, such as automated discovery, extreme scaling, zero-touch provisioning, and secure device attribute addition, provide a robust framework for managing IoT devices. This ensures that IoT networks are secure, efficient, and scalable, making TR-069 an essential tool for service providers in the IoT space.
                            </div>
                        </ul>
                    </div>
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        </div><!-- /.col -->
    </div>
</div>
<script>
    document.getElementById("service_duration").min = "1";
    document.getElementById("service_duration").max = "12";
</script>



@endsection