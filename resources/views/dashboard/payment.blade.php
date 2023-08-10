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
                    <li class="breadcrumb-item active" aria-current="page">Payment</li>
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
                                <h6 class="card-title m-0">Billing and Payment Summary</h6>
                            </div>
                            <hr />
                            <div class="card-body">
                              <div class="mb-4 col-md-3">
                                <label for="customer-name" class="form-label">Customer Name: <span style="color: #f11382; margin-left: 10px">{{ $billingData->first()->customer_name }}</span></label>
                                <input type="hidden" id="customer_name" name="customer_name" value="{{ $billingData->first()->customer_name }}" class="form-control" readonly>
                            </div>
                                                       
                        
                            <table class="table table-bordered">
                              <thead>
                                  <tr>
                                      <th>Drug Name</th>
                                      <th>Dosage</th>
                                      <th>Frequency</th>
                                      <th>Duration</th>
                                      <th>Quantity</th>
                                      <th>Price</th>
                                      <th>Total</th>
                                      <th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @php
                                      $subtotal = 0;
                                      $totalamount = 0;
                                  @endphp
                                  @foreach ($billingData as $billing)
                                      <tr>
                                          <td>{{ $billing->medicine }}</td>
                                          <td>{{ $billing->dosage }}</td>
                                          <td>{{ $billing->frequency }}</td>
                                          <td>{{ $billing->duration }}</td>
                                          <td>{{ $billing->quantity }}</td>
                                          <td>{{ $billing->price }}</td>
                                          <td>{{ $billing->price * $billing->quantity }}</td>
                                          <td>
                                              <!-- Delete button with icon -->
                                              <button class="btn btn-sm btn-danger me-1 white-text delete-btn" >
                                                <i class="fa fa-trash fa-fw text-white" style="vertical-align: middle;"></i>
                                            </button>
                                          </td>
                                      </tr>
                                      @php
                                          $subtotal += $billing->price * $billing->quantity;
                                          $totalamount =$subtotal;
                                      @endphp
                                  @endforeach
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <td colspan="7" class="text-end">Subtotal:</td>
                                      <td>UGX <span id="subtotal">{{ $subtotal }}</span></td>
                                  </tr>
                                  <tr>
                                      <td colspan="7" class="text-end">Total Amount:</td>
                                      <td>UGX <span id="totalAmount">{{ $totalamount }}</span></td>
                                  </tr>
                              </tfoot>
                          </table>
                          
                              
                                <div class="text-end">
                                  <a href="#" class="btn btn-primary white-text" data-bs-toggle="modal" data-bs-target="#paymentModal">
                                    Make Payment
                                    <i class="fa fa-credit-card"></i>
                                </a>
                                
                                
                                
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

        <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <form method="POST" action="">
                  @csrf
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="paymentModalLabel">Make Customer Payment</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <!-- Existing code for animal details fields -->
      
                          <!-- Payment details -->
                          <div class="form-group">
                              <label for="customer_name">Customer Name</label>
                              <input type="text" name="customer_name" class="form-control" id="customer_name" value="{{ $billingData->first()->customer_name }}" style=" color:#fff; border: 1px solid #ff5a5a" readonly>
                          </div>
                          <div class="form-group">
                              <label for="amount_to_be_paid">Amount to be Paid</label>
                              <input type="text" name="amount_to_be_paid" class="form-control" id="amount_to_be_paid" value="{{ $totalamount }}" style=" color:#fff;  border: 1px solid #ff5a5a" readonly>
                          </div>
                          <div class="form-group">
                              <label for="payment_method">Payment Method</label>
                              <div class="form-check">
                                  <input checked class="form-check-input" type="radio" name="payment_method" id="payment_method_cash" value="cash">
                                  <label class="form-check-label" for="payment_method_cash">
                                      Cash
                                  </label>
                              </div>
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" name="payment_method" id="payment_method_card" value="card">
                                  <label class="form-check-label" for="payment_method_card">
                                      Airtel Money
                                  </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="payment_method_card" value="card">
                                <label class="form-check-label" for="payment_method_card">
                                    Mtn Mobile Money
                                </label>
                            </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel <i class="icon-cancel"></i></button>
                          <button type="submit" class="btn btn-primary white-text">Make Payment <i class="icon-payment"></i></button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
      
        <!-- Page Aside-->
        @include('dashboard.layouts.sidebar')
        <!-- / Page Aside-->

@endsection