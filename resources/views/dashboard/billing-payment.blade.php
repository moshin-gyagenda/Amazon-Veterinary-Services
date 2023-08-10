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
                      <li class="breadcrumb-item"><a href="{{('dashboard')}}"><i class="ri-home-line align-bottom me-1"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Billing and Payment</li>
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
                                <h6 class="card-title">Billing and Payment</h6>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        
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
                                                <th scope="col" class="text-nowrap">Customer Name</th>
                                                <th scope="col" class="text-nowrap">Medicine</th>
                                                <th scope="col" class="text-nowrap">Dosage</th>
                                                <th scope="col" class="text-nowrap">Frequency</th>
                                                <th scope="col" class="text-nowrap">Duration</th>
                                                <th scope="col" class="text-nowrap">Quantity</th>
                                                <th scope="col" class="text-nowrap">Price</th>
                                                <th scope="col" class="text-nowrap">Status</th>
                                                <th scope="col" class="text-nowrap">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $customerNames = []; // Array to store unique customer names
                                            @endphp
                                            @foreach ($billingData as $data)
                                                @if (!in_array($data->customer_name, $customerNames))
                                                    <tr>
                                                        <th scope="row" class="text-nowrap">{{ $data->id }}</th>
                                                        <td class="text-nowrap">{{ $data->customer_name }}</td>
                                                        <td class="text-nowrap">{{ $data->medicine }}</td>
                                                        <td class="text-nowrap">{{ $data->dosage }}</td>
                                                        <td class="text-nowrap">{{ $data->frequency }}</td>
                                                        <td class="text-nowrap">{{ $data->duration }}</td>
                                                        <td class="text-nowrap">{{ $data->quantity }}</td>
                                                        <td class="text-nowrap">{{ $data->price }}</td>
                                                        <td class="text-nowrap">
                                                            <span class="badge bg-danger">{{ $data->status }}</span>
                                                        </td>                                                        
                                                        <td>
                                                            <div class="d-flex justify-content-start">
                                                                <!-- Plus button to show/hide additional data -->
                                                                <button class="btn btn-sm btn-secondary me-1 white-text plus-btn" data-toggle="collapse" data-target="#collapse{{ $data->customer_name }}" aria-expanded="false" aria-controls="collapse{{ $data->customer_name }}">
                                                                    <i class="fa fa-plus fa-fw text-white" style="vertical-align: middle;"></i>
                                                                </button>
                                                                
                                                                <!-- Make Payment button with icon -->
                                                                <!-- Make Payment button with icon -->
                                                                <a href="{{ route('payment', ['billingId' => $data->customer_name]) }}" class="btn btn-sm btn-primary me-1 white-text make-payment-btn">
                                                                    <i class="fa fa-credit-card fa-fw text-white" style="vertical-align: middle;"></i>
                                                                </a>

                                                                
                                                                <!-- View button with icon -->
                                                                <button class="btn btn-sm btn-info me-1 white-text view-btn" data-billing-id="{{ $data->id }}">
                                                                    <i class="fa fa-eye fa-fw text-white" style="vertical-align: middle;"></i>
                                                                </button>
                                                                
                                                                <!-- Delete button with icon -->
                                                                <button class="btn btn-sm btn-danger me-1 white-text delete-btn" data-billing-id="{{ $data->id }}">
                                                                    <i class="fa fa-trash fa-fw text-white" style="vertical-align: middle;"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="collapse{{ $data->customer_name }}" class="collapse">
                                                        <td colspan="9">
                                                            <div class="additional-data">
                                                                <table class="table table-bordered">
                                                                    <tbody>
                                                                        @foreach ($billingData as $additionalData)
                                                                            @if ($additionalData->customer_name === $data->customer_name)
                                                                                <tr>
                                                                                    <td></td> <!-- Empty cell for the first column (number column) -->
                                                                                    <td></td> <!-- Empty cell for the customer name column -->
                                                                                    <td>{{ $additionalData->medicine }}</td>
                                                                                    <td>{{ $additionalData->dosage }}</td>
                                                                                    <td>{{ $additionalData->frequency }}</td>
                                                                                    <td>{{ $additionalData->duration }}</td>
                                                                                    <td>{{ $additionalData->quantity }}</td>
                                                                                    <td>{{ $additionalData->price }}</td>
                                                                                    <td></td> <!-- Empty cell for the actions column -->
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    
                                                    
                                                    @php
                                                    $customerNames[] = $data->customer_name; // Add customer name to the array
                                                    @endphp
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        

    
                        
    
    
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
