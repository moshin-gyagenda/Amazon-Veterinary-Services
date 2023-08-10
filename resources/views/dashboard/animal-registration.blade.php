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
                        <li class="breadcrumb-item active" aria-current="page">Animal Registration</li>
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
                                <h6 class="card-title m-0">Animal Registration Form</h6>
                            </div>
                            <hr>
                            <div class="card-body">
                                <form action="{{ route('animal.store') }}" method="POST">
                                    @csrf
                        
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="animalType" class="form-label">Animal Type</label>
                                                <select class="form-select select-2" id="animalType" name="animal_type">
                                                    <option value="">Select</option>
                                                    <option value="Dog">Dog</option>
                                                    <option value="Cow">Cow</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="gender" class="form-label">Gender</label>
                                                <select class="form-select" id="gender" name="gender">
                                                    <option value="">Select</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="breed" class="form-label">Breed</label>
                                                <input type="text" class="form-control" id="breed" name="breed" placeholder="Enter the breed">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="age" class="form-label">Age</label>
                                                <input type="text" class="form-control" id="age" name="age" placeholder="Enter the age">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="spayed" class="form-label">Neutered/Spayed</label>
                                                <select class="form-select" id="spayed" name="spayed">
                                                    <option value="">Select</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="colorMarkings" class="form-label">Color/Markings</label>
                                                <input type="text" class="form-control" id="colorMarkings" name="color_markings" placeholder="Enter color and markings">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="emergencyContact" class="form-label">Emergency Contact</label>
                                                <input type="text" class="form-control" id="emergencyContact" name="emergency_contact" placeholder="Enter emergency contact details">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="weight" class="form-label">Weight</label>
                                                <input type="text" class="form-control" id="weight" name="weight" placeholder="Enter the weight">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="animal_code" class="form-label">Animal Code</label>
                                                <input type="text" class="form-control" id="animal_code" name="animal_code" placeholder=" Enter the animal code">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="vaccinationHistory" class="form-label">Vaccination History(Optional)</label>
                                                <textarea class="form-control" id="vaccinationHistory" name="vaccination_history" placeholder="Enter vaccination history"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="medicalHistory" class="form-label">Medical History (Optional)</label>
                                                <textarea class="form-control" id="medicalHistory" name="medical_history" placeholder="Enter medical history"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="ownerInfo" class="form-label">Owner Information</label>
                                                <textarea class="form-control" id="ownerInfo" name="owner_info" placeholder="Enter owner information"></textarea>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <button type="submit" class="btn btn-success" style="color: white; width: 120px;">Submit</button>
                                    <button type="reset" class="btn btn-primary" style="color: white; margin-left: 10px; width: 120px;">Reset</button>
                                </form>
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
