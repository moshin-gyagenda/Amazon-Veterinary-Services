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
                        <li class="breadcrumb-item active" aria-current="page">Add Appointment</li>
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
                                <h6 class="card-title m-0">Appointment Form</h6>
                            </div>
                            <hr>
                            <div class="card-body">
                                <form action="{{route('create-appointment')}}" method="POST">
                                    @csrf
                        
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstName" class="form-label">First Name</label>
                                                <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter your first name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="lastName" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter your last name" required>
                                            </div>
                                        </div>
                                        
                                    </div>
                        
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
                                            </div>
                                        </div>
                        
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" class="form-control" name="address"  placeholder="Enter your address" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="phoneNumber" class="form-label">Phone Number</label>
                                                <input type="tel" class="form-control" id="phoneNumber" name="phone_number" placeholder="Enter your phone number" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="services" class="form-label">Services</label>
                                            <select class="form-select" id="services" name="services" required>
                                                <option value="wellness_exams">select</option>
                                                <option value="wellness_exams">Wellness Exams</option>
                                                <option value="sick_pet_care">Sick Pet Care</option>
                                                <option value="dental_care">Dental Care</option>
                                                <option value="nutrition_counseling">Nutrition Counseling</option>
                                                <option value="behavioral_counseling">Behavioral Counseling</option>
                                                <option value="diagnostic_services">Diagnostic Services</option>
                                                <option value="emergency_care">Emergency Care</option>
                                                <option value="boarding_daycare">Boarding and Daycare</option>
                                                <option value="grooming_services">Grooming Services</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                    </div>

                                    
                                    </div>
                                    


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="species" class="form-label">Species</label>
                                                <input type="text" class="form-control" id="species" name="species" placeholder="Enter your pet's species" required>
                                            </div>
                                        </div>
                        
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="breed" class="form-label">Breed</label>
                                                <input type="text" class="form-control" id="breed" name="breed" placeholder="Enter your pet's breed" required>
                                            </div>
                                        </div>
                        
                                        
                                    </div>
                        
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="preferredDate" class="form-label">Preferred Date</label>
                                                <input type="date" class="form-control" id="preferredDate" name="preferred_date" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="preferredTime" class="form-label">Preferred Time</label>
                                                <input type="time" class="form-control" id="preferredTime" name="preferred_time" required>
                                            </div>
                                        </div>
                        
                                        
                                    </div>
                        
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="reason" class="form-label">Additional Information for the Appointment</label>
                                                <textarea class="form-control" id="reason" name="reason" rows="3" placeholder="Enter the additional information  for the appointment" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <button type="submit" class="btn btn-success white-text">
                                        <i class="fas fa-check"></i> Submit Appointment
                                    </button>
                                    
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
