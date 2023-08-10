
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
                    <li class="breadcrumb-item active" aria-current="page"> View Diagnosis List</li>
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
                            <h6 class="card-title">Diagnosis List</h6>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <a href="{{ route('diagonosis') }}" class="btn btn-sm btn-success white-text">
                                        <i class="fas fa-plus"></i> Add Diagnosis
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
                                            <th scope="col" class="text-nowrap">Animal Code</th>
                                            <th scope="col" class="text-nowrap">Animal Type</th>
                                            <th scope="col" class="text-nowrap">Breed</th>
                                            <th scope="col" class="text-nowrap">Color/Markings</th>
                                            <th scope="col" class="text-nowrap">Medical History</th>
                                            <th scope="col" class="text-nowrap">Physical Exam Findings</th>
                                            <th scope="col" class="text-nowrap">Diagnostic Tests</th>
                                            <th scope="col" class="text-nowrap">Other Diagnostic Procedures</th>
                                            <th scope="col" class="text-nowrap">Assessment Diagnosis</th>
                                            <th scope="col" class="text-nowrap">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($diagnoses as $diagnosis)
                                        <tr>
                                            <th scope="row" class="text-nowrap">{{ $diagnosis->id }}</th>
                                            <td class="text-nowrap">{{ $diagnosis->animal->animal_code }}</td>
                                            <td class="text-nowrap">{{ $diagnosis->animal->animal_type }}</td>
                                            <td class="text-nowrap">{{ $diagnosis->animal->breed }}</td>
                                            <td class="text-nowrap">{{ $diagnosis->animal->color_markings }}</td>
                                            <td class="text-nowrap">{{ $diagnosis->medical_history }}</td>
                                            <td class="text-nowrap">{{ $diagnosis->physical_exam_findings }}</td>
                                            <td class="text-nowrap">{{ $diagnosis->diagnostic_tests }}</td>
                                            <td class="text-nowrap">{{ $diagnosis->other_diagnostic_procedures }}</td>
                                            <td class="text-nowrap">{{ $diagnosis->assessment_diagnosis }}</td>
                                            <td class="d-flex justify-content-center">
                                                <!-- Edit button with icon -->
                                                <a href="#" class="btn btn-sm btn-success me-1 white-text edit-btn" data-diagnosis-id="{{ $diagnosis->id }}">
                                                    <i class="fa fa-edit fa-fw text-white" style="vertical-align: middle;"></i>
                                                </a>
                                            
                                                <!-- Delete button with icon -->
                                                <a href="#" class="btn btn-sm btn-danger white-text delete-btn" data-diagnosis-id="{{ $diagnosis->id }}">
                                                    <i class="fa fa-trash fa-fw text-white" style="vertical-align: middle;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tr>
                                        <td colspan="11">
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
