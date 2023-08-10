
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
                    <li class="breadcrumb-item active" aria-current="page"> View Animals</li>
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
                        <div class="card-header">
                            <h6 class="card-title">Animal List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-nowrap">#</th>
                                            <th scope="col" class="text-nowrap">Animal</th>
                                            <th scope="col" class="text-nowrap">Breed</th>
                                            <th scope="col" class="text-nowrap">Age</th>
                                            <th scope="col" class="text-nowrap">Spayed</th>
                                            <th scope="col" class="text-nowrap">Gender</th>
                                            <th scope="col" class="text-nowrap">Color</th>
                                            <th scope="col" class="text-nowrap">Contact</th>
                                            <th scope="col" class="text-nowrap">Weight</th>
                                            <th scope="col" class="text-nowrap">Microchip</th>
                                            <th scope="col" class="text-nowrap">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($animals as $animal)
                                        <tr>
                                            <th scope="row" class="text-nowrap">{{ $animal->id }}</th>
                                            <td class="text-nowrap">{{ $animal->animal_type }}</td>
                                            <td class="text-nowrap">{{ $animal->breed }}</td>
                                            <td class="text-nowrap">{{ $animal->age }}</td>
                                            <td class="text-nowrap">{{ $animal->spayed }}</td>
                                            <td class="text-nowrap">{{ $animal->gender }}</td>
                                            <td class="text-nowrap">{{ $animal->color_markings }}</td>
                                            <td class="text-nowrap">{{ $animal->emergency_contact }}</td>
                                            <td class="text-nowrap">{{ $animal->weight }}</td>
                                            <td class="text-nowrap">{{ $animal->microchip_tag }}</td>
                                            <td class="d-flex justify-content-center">
                                                <!-- Edit button with icon -->
                                                <a href="" class="btn btn-sm btn-success me-1 white-text" data-bs-toggle="modal" data-bs-target="#editModal">
                                                    <i class="fa fa-plus fa-fw text-white" style="vertical-align: middle;"></i>
                                                     Add Vaccination
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

    <!-- edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('update.animals', $animal->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Animal Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id">Animal Id</label>
                                    <input type="text" name="id" class="form-control white-text" id="id" value="{{ $animal->id }}" style="border: 1px solid #ff5a5a" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="animal_type">Animal Type</label>
                                    <input type="text" name="animal_type" class="form-control" id="animal_type" value="{{ $animal->animal_type }}" style="border: 1px solid #ff5a5a">
                                </div>
                                <div class="form-group">
                                    <label for="breed">Breed</label>
                                    <input type="text" name="breed" class="form-control" id="breed" value="{{ $animal->breed }}" style="border: 1px solid #ff5a5a">
                                </div>
                                <div class="form-group">
                                    <label for="age">Age</label>
                                    <input type="text" name="age" class="form-control" id="age" value="{{ $animal->age }}" style="border: 1px solid #ff5a5a">
                                </div>
                                <div class="form-group">
                                    <label for="spayed">Spayed</label>
                                    <input type="text" name="spayed" class="form-control" id="spayed" value="{{ $animal->spayed }}" style="border: 1px solid #ff5a5a">
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <input type="text" name="gender" class="form-control" id="gender" value="{{ $animal->gender }}" style="border: 1px solid #ff5a5a">
                                </div>
                                <div class="form-group">
                                    <label for="color">Color</label>
                                    <input type="text" name="color_markings" class="form-control" id="color" value="{{ $animal->color_markings }}" style="border: 1px solid #ff5a5a">
                                </div>
                                <div class="form-group">
                                    <label for="contact">Contact</label>
                                    <input type="text" name="emergency_contact" class="form-control" id="contact" value="{{ $animal->emergency_contact }}" style="border: 1px solid #ff5a5a">
                                </div>
                                <div class="form-group">
                                    <label for="weight">Weight</label>
                                    <input type="text" name="weight" class="form-control" id="weight" value="{{ $animal->weight }}" style="border: 1px solid #ff5a5a">
                                </div>
                                <div class="form-group">
                                    <label for="microchip">Microchip</label>
                                    <input type="text" name="microchip_tag" class="form-control" id="microchip" value="{{ $animal->microchip_tag }}" style="border: 1px solid #ff5a5a">
                                </div>
                               
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="vaccination_history">Vaccination History</label>
                                    <textarea name="vaccination_history" class="form-control" id="vaccination_history" rows="3" style="border: 1px solid #ff5a5a">{{ $animal->vaccination_history }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="medical_history">Medical History</label>
                                    <textarea name="medical_history" class="form-control" id="medical_history" rows="3" style="border: 1px solid #ff5a5a">{{ $animal->medical_history }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="owner_info">Owner Info</label>
                                    <textarea name="owner_info" class="form-control" id="owner_info" rows="3" style="border: 1px solid #ff5a5a">{{ $animal->owner_info }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary white-text">Update Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    
    {{-- </ edit model> --}}

    <!-- View Modal -->

    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Animal Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="animal_type">Animal Id</label>
                                <input type="text" class="form-control white-text" id="animal_type" value="{{ $animal->id }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="animal_type">Animal Type</label>
                                <input type="text" class="form-control white-text" id="animal_type" value="{{ $animal->animal_type }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="breed">Breed</label>
                                <input type="text" class="form-control white-text" id="breed" value="{{ $animal->breed }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="text" class="form-control white-text" id="age" value="{{ $animal->age }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="spayed">Spayed</label>
                                <input type="text" class="form-control white-text" id="spayed" value="{{ $animal->spayed }}" readonly>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <input type="text" class="form-control white-text" id="gender" value="{{ $animal->gender }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="color">Color</label>
                                <input type="text" class="form-control white-text" id="color" value="{{ $animal->color_markings }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" class="form-control white-text" id="contact" value="{{ $animal->emergency_contact }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="weight">Weight</label>
                                <input type="text" class="form-control white-text" id="weight" value="{{ $animal->weight }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="microchip">Microchip</label>
                                <input type="text" class="form-control white-text" id="microchip" value="{{ $animal->microchip_tag }}" readonly>
                            </div>
                            
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="vaccination_history">Vaccination History</label>
                                <textarea class="form-control white-text" id="vaccination_history" rows="3" readonly>{{ $animal->vaccination_history }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="medical_history">Medical History</label>
                                <textarea class="form-control white-text" id="medical_history" rows="3" readonly>{{ $animal->medical_history }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="owner_info">Owner Info</label>
                                <textarea class="form-control white-text" id="owner_info" rows="3" readonly>{{ $animal->owner_info }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    

   @endsection
