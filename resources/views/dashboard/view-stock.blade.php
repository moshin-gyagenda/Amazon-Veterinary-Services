
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
                    <li class="breadcrumb-item active" aria-current="page"> Medicine List</li>
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
                            <h6 class="card-title">Medicine List</h6>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <a href="{{route('medicine')}}" class="btn btn-sm btn-success white-text">
                                        <i class="fas fa-plus"></i> Add Medicine
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
                                            <th scope="col" class="text-nowrap">Medicine Name</th>
                                            <th scope="col" class="text-nowrap">Category</th>
                                            <th scope="col" class="text-nowrap">Manufacturer</th>
                                            <th scope="col" class="text-nowrap">Batch Number</th>
                                            <th scope="col" class="text-nowrap">Expiration Date</th>
                                            <th scope="col" class="text-nowrap">Quantity</th>
                                            <th scope="col" class="text-nowrap">Unit of Measurement</th>
                                            <th scope="col" class="text-nowrap">Purchase Date</th>
                                            <th scope="col" class="text-nowrap">Supplier</th>
                                            <th scope="col" class="text-nowrap">Purchase Price</th>
                                            <th scope="col" class="text-nowrap">Selling Price</th>
                                            {{-- <th scope="col" class="text-nowrap">Notes</th> --}}
                                            <th scope="col" class="text-nowrap">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($medicines as $medicine)
                                        <tr>
                                            <th scope="row" class="text-nowrap">{{ $medicine->id }}</th>
                                            <td class="text-nowrap">{{ $medicine->medicine_name }}</td>
                                            <td class="text-nowrap">{{ $medicine->category }}</td>
                                            <td class="text-nowrap">{{ $medicine->manufacturer }}</td>
                                            <td class="text-nowrap">{{ $medicine->batch_number }}</td>
                                            <td class="text-nowrap">{{ $medicine->expiration_date }}</td>
                                            <td class="text-nowrap">{{ $medicine->quantity }}</td>
                                            <td class="text-nowrap">{{ $medicine->unit_of_measurement }}</td>
                                            <td class="text-nowrap">{{ $medicine->purchase_date }}</td>
                                            <td class="text-nowrap">{{ $medicine->supplier }}</td>
                                            <td class="text-nowrap">{{ $medicine->purchase_price }}</td>
                                            <td class="text-nowrap">{{ $medicine->selling_price }}</td>
                                            {{-- <td class="text-nowrap">{{ $medicine->notes }}</td> --}}
                                            <td class="d-flex justify-content-center">
                                                <!-- Edit button with icon -->
                                                <a href="" class="btn btn-sm btn-success me-1" data-bs-toggle="modal" data-bs-target="#editModal">
                                                    <i class="fa fa-pencil fa-fw text-white" style="vertical-align: middle;"></i>
                                                </a>
                                    
                                                <!-- View button with icon -->
                                                <a href="" class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#viewModal">
                                                    <i class="fa fa-eye fa-fw text-white" style="vertical-align: middle;"></i>
                                                </a>
                                    
                                                <!-- Delete button with icon -->
                                                <form action="" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger ms-1" onclick="return confirm('Are you sure you want to delete this medicine?');">
                                                        <i class="fa fa-trash fa-fw text-white" style="vertical-align: middle;"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tr>
                                        <td colspan="14">
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
