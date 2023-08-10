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
                        <li class="breadcrumb-item active" aria-current="page">Drug Prescription</li>
                    </ol>
                </nav>            <!-- / Breadcrumbs-->
    
                
                @if (session('success'))
                    <div class="alert alert-success" id="success-alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger" id="error-alert">
                        {{ session('error') }}
                    </div>
                @endif
    
                <div class="row g-4">
    
                    <div class="col-12 col-md-12">
    
                        <!-- Example-->
                        <div class="card mb-4">
                            <div class="card-header justify-content-between align-items-center d-flex">
                                <h6 class="card-title m-0">Drug Prescription Form</h6>
                            </div>
                            <hr />
                            <div class="card-body">
                                <form action="{{route('prescription')}}" method="POST">
                                    @csrf
                        
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="animalCode" class="form-label"
                                                    >Customer Name</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    name="customer_name"
                                                    placeholder="Enter customer name"
                                                    required
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="medicine" class="form-label">Drug Name</label>
                                                <select class="form-select" id="medicine" name="medicine" required>
                                                    <option value="">select</option>
                                                    @foreach ($medicines as $medicine)
                                                    <option value="{{$medicine->medicine_name}}">{{$medicine->medicine_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="dosage" class="form-label">Dosage</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="dosage"
                                                    name="dosage"
                                                    placeholder="Enter dosage"
                                                    required
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="frequency" class="form-label"
                                                    >Frequency</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="frequency"
                                                    name="frequency"
                                                    placeholder="Enter frequency"
                                                    required
                                                />
                                            </div>
                                        </div>
                                    </div>
                        
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="duration" class="form-label"
                                                    >Duration</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="duration"
                                                    name="duration"
                                                    placeholder="Enter duration"
                                                    required
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="duration" class="form-label"
                                                    >Quantity</label
                                                >
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    id="quantity"
                                                    name="quantity"
                                                    placeholder="Enter quantity"
                                                    required
                                                />
                                            </div>
                                        </div>
                                    </div>
                        
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="instructions" class="form-label">Price</label>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    id="price"
                                                    name="price"
                                                    value=""
                                                    readonly
                                                    style="color:red;"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="instructions" class="form-label"
                                                    >Instructions</label
                                                >
                                                <textarea
                                                    class="form-control"
                                                    id="instructions"
                                                    name="instructions"
                                                    rows="3"
                                                    placeholder="Enter instructions"
                                                    required
                                                ></textarea>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <button type="submit" class="btn btn-success white-text">
                                        <i class="fas fa-check"></i> Submit Prescription
                                    </button>
                                </form>
                            </div>
                        </div>
                    
                        <!-- / Example-->
                        <!-- Submitted Prescriptions Table -->
                        
                       
                        

    
                        
    
    
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
                
                <!-- Default Example Modal Import-->
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Here goes modal body content
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- Offcanvas Imports-->
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

        @endsection
