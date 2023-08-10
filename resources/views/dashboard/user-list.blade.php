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
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                                <h6 class="card-title">User List</h6>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <button class="btn btn-sm btn-success white-text" onclick="location.href=''">
                                            <i class="fas fa-plus"></i> Add Entry
                                        </button>
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
                                                <th scope="col" class="text-nowrap">Username</th>
                                                <th scope="col" class="text-nowrap">Email</th>
                                                <th scope="col" class="text-nowrap">Role</th>
                                                <th scope="col" class="text-nowrap">Phone Number</th>
                                                <th scope="col" class="text-nowrap">Address</th>
                                                {{-- <th scope="col" class="text-nowrap">Profile Picture</th> --}}
                                                <th scope="col" class="text-nowrap">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                                <th scope="row" class="text-nowrap">{{ $user->id }}</th>
                                                <td class="text-nowrap">{{ $user->fullname }}</td>
                                                <td class="text-nowrap">{{ $user->username }}</td>
                                                <td class="text-nowrap">{{ $user->email }}</td>
                                                <td class="text-nowrap">{{ $user->role }}</td>
                                                <td class="text-nowrap">{{ $user->phone_number }}</td>
                                                <td class="text-nowrap">{{ $user->address }}</td>
                                                {{-- <td class="text-nowrap">{{ $user->profile_picture }}</td> --}}
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
                                                        <button type="submit" class="btn btn-sm btn-danger ms-1" onclick="return confirm('Are you sure you want to delete this user?');">
                                                            <i class="fa fa-trash fa-fw text-white" style="vertical-align: middle;"></i>
                                                        </button>
                                                    </form>
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

        @endsection
