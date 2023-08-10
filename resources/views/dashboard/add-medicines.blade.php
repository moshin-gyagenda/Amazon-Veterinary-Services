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
                        <li class="breadcrumb-item active" aria-current="page">Add Medicines</li>
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
                                <h6 class="card-title m-0">Medicine Record Addition Form</h6>
                            </div>
                            <hr>
                            <div class="card-body">
                                <form action="{{ route('add-medicine')}}" method="POST">
                                    @csrf
                        
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="medicineName" class="form-label">Medicine Name</label>
                                                <input type="text" class="form-control" id="medicineName" name="medicine_name" placeholder="Enter the medicine name">
                                            </div>
                                        </div>
                        
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="category" class="form-label">Category</label>
                                                <input type="text" class="form-control" id="category" name="category" placeholder="Enter the medicine category">
                                            </div>
                                        </div>
                                    </div>
                        
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="manufacturer" class="form-label">Manufacturer</label>
                                                <input type="text" class="form-control" id="manufacturer" name="manufacturer" placeholder="Enter the manufacturer">
                                            </div>
                                        </div>
                        
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="batchNumber" class="form-label">Batch Number</label>
                                                <input type="text" class="form-control" id="batchNumber" name="batch_number" placeholder="Enter the batch number">
                                            </div>
                                        </div>
                                    </div>
                        
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="expirationDate" class="form-label">Expiration Date</label>
                                                <input type="date" class="form-control" id="expirationDate" name="expiration_date" placeholder="Enter the expiration date">
                                            </div>
                                        </div>
                        
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="quantity" class="form-label">Quantity</label>
                                                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter the quantity">
                                            </div>
                                        </div>
                                    </div>
                        
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="unitOfMeasurement" class="form-label">Unit of Measurement</label>
                                                <input type="text" class="form-control" id="unitOfMeasurement" name="unit_of_measurement" placeholder="Enter the unit of measurement">
                                            </div>
                                        </div>
                        
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="purchaseDate" class="form-label">Purchase Date</label>
                                                <input type="date" class="form-control" id="purchaseDate" name="purchase_date" placeholder="Enter the purchase date">
                                            </div>
                                        </div>
                                    </div>
                        
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="supplier" class="form-label">Supplier</label>
                                                <input type="text" class="form-control" id="supplier" name="supplier" placeholder="Enter the supplier">
                                            </div>
                                        </div>
                        
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="purchasePrice" class="form-label">Purchase Price</label>
                                                <input type="number" class="form-control" id="purchasePrice" name="purchase_price" placeholder="Enter the purchase price">
                                            </div>
                                        </div>
                                    </div>
                        
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="storageLocation" class="form-label">Selling Price</label>
                                                <input type="number" class="form-control" id="storageLocation" name="selling_price" placeholder="Enter the selling price">
                                            </div>
                                        </div>
                                    </div>
                        
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="notes" class="form-label">Notes</label>
                                                <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Enter any additional notes"></textarea>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <button type="submit" class="btn btn-success white-text">Add Medicine </button>
                                    <button type="reset" class="btn btn-primary white-text" style="margin-left: 10px;">Reset</button>
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
