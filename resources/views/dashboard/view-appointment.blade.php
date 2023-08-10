
@extends('dashboard.layouts.master')
@section('content') 
 <!-- Navbar-->
    @include('dashboard.layouts.navbar')
    <!-- / Navbar-->

    <!-- Page Content -->
    <main id="main">
        <!-- Content-->
        <section class="container-fluid">

            <!-- Breadcrumbs-->
            <nav class="mb-4 pb-2 border-bottom" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="./index.html"><i class="ri-home-line align-bottom me-1"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> View Appointments</li>
                </ol>
            </nav>            <!-- / Breadcrumbs-->

            
            @if(request()->has('success'))
                <div class="alert alert-success" id="success-alert">
                    {{ request('success') }}
                </div>
            @endif

            @if(request()->has('error'))
                <div class="alert alert-danger" id="error-alert">
                    {{ request('error') }}
                </div>
            @endif


            
            <div class="row g-4">

                <div class="col-12 col-md-12">

                    <!-- Example-->
                    
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="card-title">Appointment List</h6>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <a href="{{route('appointment')}}" class="btn btn-sm btn-success white-text">
                                        <i class="fas fa-plus"></i> Add Appointment
                                    </a>
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-info me-2 white-text" onclick="window.print()">
                                        <i class="fas fa-print"></i> Print
                                    </button>
                                    <button class="btn btn-sm btn-primary me-2 white-text" onclick="downloadTable()">
                                        <i class="fas fa-download"></i> Download
                                    </button> 
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-nowrap">#</th>
                                            <th scope="col" class="text-nowrap">Full Name</th>
                                            {{-- <th scope="col" class="text-nowrap">Last Name</th> --}}
                                            <th scope="col" class="text-nowrap">Email</th>
                                            <th scope="col" class="text-nowrap">Address</th>
                                            <th scope="col" class="text-nowrap">Phone Number</th>
                                            <th scope="col" class="text-nowrap">Services</th>
                                            <th scope="col" class="text-nowrap">Species</th>
                                            <th scope="col" class="text-nowrap">Breed</th>
                                            <th scope="col" class="text-nowrap">Preferred Date</th>
                                            <th scope="col" class="text-nowrap">Preferred Time</th>
                                            <th scope="col" class="text-nowrap">Reason</th>
                                            <th scope="col" class="text-nowrap">Status</th>
                                            <th scope="col" class="text-nowrap">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($appointments as $appointment)
                                        <tr>
                                            <th scope="row" class="text-nowrap">{{ $appointment->id }}</th>
                                            <td class="text-nowrap">{{ $appointment->first_name . ' ' . $appointment->last_name }}</td>
                                            <td class="text-nowrap">{{ $appointment->email }}</td>
                                            <td class="text-nowrap">{{ $appointment->address }}</td>
                                            <td class="text-nowrap">{{ $appointment->phone_number }}</td>
                                            <td class="text-nowrap">{{ $appointment->services }}</td>
                                            <td class="text-nowrap">{{ $appointment->species }}</td>
                                            <td class="text-nowrap">{{ $appointment->breed }}</td>
                                            <td class="text-nowrap">{{ $appointment->preferred_date }}</td>
                                            <td class="text-nowrap">{{ $appointment->preferred_time }}</td>
                                            <td class="text-nowrap">{{ $appointment->reason }}</td>
                                            <td class="text-nowrap "> <span class="btn btn-sm btn-danger white-text" >{{ $appointment->status }}</</span> </td>
                                            <td class="d-flex justify-content-center">
                                                <!-- Accept button with icon -->
                                                <a href="#" class="btn btn-sm btn-success me-1 white-text accept-btn" data-appointment-id="{{ $appointment->id }}">
                                                    <i class="fa fa-check fa-fw text-white" style="vertical-align: middle;"></i>
                                                </a>
                                            
                                                <!-- Reject button with icon -->
                                                <a href="#" class="btn btn-sm btn-danger me-1 white-text reject-btn" data-appointment-id="{{ $appointment->id }}">
                                                    <i class="fa fa-times fa-fw text-white" style="vertical-align: middle;"></i>
                                                </a>
                                            
                                                <!-- Delete button with icon -->
                                                <a href="#" class="btn btn-sm btn-primary white-text delete-btn" data-appointment-id="{{ $appointment->id }}">
                                                    <i class="fa fa-trash fa-fw text-white" style="vertical-align: middle;"></i>
                                                </a>
                                            </td>
                                            
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tr>
                                        <td colspan="5">
                                            <div class="text-end">
                                                <nav aria-label="Page navigation example">
                                                    <ul class="pagination">
                                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    <!-- / Example-->

                    


                </div>

               

            </div>

            <!-- Footer -->
            @include('dashboard.layouts.footer')
             <!-- /Footer -->
            <!-- Sidebar Menu Overlay-->
            <div class="menu-overlay-bg"></div>
            <!-- / Sidebar Menu Overlay-->
            
            <!-- Modal Imports-->
            <!-- Place your modal imports here-->
            
            
            <!-- Place your offcanvas imports here-->
            
            <!-- Default Example Offcanvas Import-->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
                  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <div>
                    Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
                  </div>
                  <div class="dropdown mt-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                      Dropdown button
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            <!-- Navbar Notifications offcanvas-->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNotifications"
              aria-labelledby="offcanvasNotificationsLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNotificationsLabel">Notifications</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
            
               
            
                <!-- View all Btn-->
                <a href="#" class="btn btn-outline-secondary w-100 mt-4" role="button">View all notifications</a>
                <!-- / View all btn-->
            
              </div>
            </div>            <!-- / Footer-->

        </section>
        <!-- / Content-->
    </main>
    <!-- /Page Content -->

    <!-- Page Aside-->
    @include('dashboard.layouts.sidebar')
    <!-- / Page Aside-->

    

    <!-- View Modal -->

    
    
   
    
   @endsection
