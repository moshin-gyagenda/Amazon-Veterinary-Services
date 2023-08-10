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
                        <li class="breadcrumb-item">
                            <a href="./index.html"
                                ><i class="ri-home-line align-bottom me-1"></i>
                                Dashboard</a
                            >
                        </li>
                    </ol>
                </nav>
                <!-- / Breadcrumbs-->
                @if(Auth::user()->role === 'admin')
                <!-- Top Row Widgets-->
                <div class="row g-4 mb-4">
                    <!-- Schedule Widget -->
                    <div class="col-6 col-lg-3">
                        <div class="card h-100">
                            <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                                <h6 class="card-title">Appointments</h6>
                                
                                <!-- Nav Pills -->
                                <ul class="nav nav-pills justify-content-end m-0" id="scheduleTab" role="tablist">
                                    <br>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="today-tab" data-bs-toggle="tab" data-bs-target="#today" role="tab" aria-controls="today" aria-selected="true"><i class="ri-calendar-2-line me-3"></i></a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="tomorrow-tab" data-bs-toggle="tab" data-bs-target="#tomorrow" role="tab" aria-controls="tomorrow" aria-selected="false"><i class=""></i></a>
                                    </li>
                                    <br>
                                <h5 >{{count($appointments)}}</h5>
                                </ul>
                                <!-- / Nav Pills -->
                            </div>
                        </div>
                    </div>
                    <!-- / Schedule Widget -->
                    
                    <!-- Record Management Widget -->
                    <div class="col-6 col-lg-3">
                        <div class="card h-100">
                            <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                                <h6 class="card-title">Total Animals</h6>
                                <!-- Nav Pills -->
                                <ul class="nav nav-pills justify-content-end m-0" id="recordTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="animals-tab" data-bs-toggle="tab" data-bs-target="#animals" role="tab" aria-controls="animals" aria-selected="true"><i class="ri-folder-line me-3"></i></a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="medical-tab" data-bs-toggle="tab" data-bs-target="#medical" role="tab" aria-controls="medical" aria-selected="false"></a>
                                    </li>
                                    <br>
                                <h5 >{{count($animals)}}</h5>
                                </ul>
                                <!-- / Nav Pills -->
                            </div>
                        </div>
                    </div>
                    <!-- / Record Management Widget -->
                    
                    <!-- Appointments Management Widget -->
                    <div class="col-6 col-lg-3">
                        <div class="card h-100">
                            <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                                <h6 class="card-title"> Total Inventories</h6>
                                <!-- Nav Pills -->
                                <ul class="nav nav-pills justify-content-end m-0" id="appointmentsTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="upcoming-tab" data-bs-toggle="tab" data-bs-target="#upcoming" role="tab" aria-controls="upcoming" aria-selected="true"><i class="ri-archive-line me-3"></i></a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="past-tab" data-bs-toggle="tab" data-bs-target="#past" role="tab" aria-controls="past"
                                        aria-selected="false"></a>
                                    </li>
                                    <br>
                                    <h5>{{count($inventories)}}</h5>
                            </ul>
                <!-- / Nav Pills -->
                                    </div>
                                    </div>
                </div>
                <!-- / Appointments Management Widget -->
                <!-- Schedule Widget -->
    <div class="col-6 col-lg-3">
        <div class="card h-100">
            <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                <h6 class="card-title">Total Payments</h6>
                <!-- Nav Pills -->
                <ul class="nav nav-pills justify-content-end m-0" id="scheduleTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="today-tab" data-bs-toggle="tab" data-bs-target="#today" role="tab" aria-controls="today" aria-selected="true"><i class="ri-money-dollar-circle-line me-3"></i></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tomorrow-tab" data-bs-toggle="tab" data-bs-target="#tomorrow" role="tab" aria-controls="tomorrow" aria-selected="false"></a>
                    </li>
                    <br>
                    <h5>0</h5>
                </ul>
                <!-- / Nav Pills -->
            </div>
        </div>
    </div>
    <!-- / Schedule Widget -->
                
                </div>
                
                <!-- Top Row Widgets-->

                <!-- Middle Row Widgets-->
                <div class="row g-4 mb-4">
                    <!-- Total Appointments Widget -->
                    <div class="col-6 col-lg-4">
                        <div class="card mb-4 h-100">
                            <div class="card-header justify-content-between align-items-center d-flex">
                                <h6 class="card-title m-0">Total Appointments</h6>
                                <div class="dropdown">
                                    <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0"
                                        type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-2-line"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown" aria-labelledby="dropdownMenuButton1">
                                        <li>
                                            <a class="dropdown-item" href="#">Action</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">Another action</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart chart-lg">
                                    <canvas id="chartSalesRegion"></canvas>
                                </div>
                
                                <div class="row g-1 mt-4">
                                    <div class="col-12 col-sm-4 d-flex flex-column align-items-center">
                                        <p class="fw-bolder mb-1">0</p>
                                        <div class="d-flex align-items-center">
                                            <span class="dot dot-xs bg-primary d-block me-2"></span>
                                            <span class="small text-muted">Pending</span>
                                        </div>
                                    </div>
                
                                    <div class="col-12 col-sm-4 d-flex flex-column align-items-center">
                                        <p class="fw-bolder mb-1">0</p>
                                        <div class="d-flex align-items-center">
                                            <span class="dot dot-xs bg-success d-block me-2"></span>
                                            <span class="small text-muted">Completed</span>
                                        </div>
                                    </div>
                
                                    <div class="col-12 col-sm-4 d-flex flex-column align-items-center">
                                        <p class="fw-bolder mb-1">0</p>
                                        <div class="d-flex align-items-center">
                                            <span class="dot dot-xs bg-warning d-block me-2"></span>
                                            <span class="small text-muted">Cancelled</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Total Appointments Widget -->
                
                    <!-- Revenue By Service Widget -->
                    <div class="col-12 col-lg-8">
                        <div class="card mb-4 h-100">
                            <div class="card-header justify-content-between align-items-center d-flex">
                                <h6 class="card-title m-0">Revenue by Service</h6>
                                <div class="dropdown">
                                    <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0"
                                        type="button" id="dropDownRevenue" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-2-line"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown" aria-labelledby="dropDownRevenue">
                                        <li>
                                            <a class="dropdown-item" href="#">Action</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">Another action</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-5">
                                    <div class="d-flex align-items-center">
                                        <h4 class="fs-3 fw-bold mb-0 me-3">UGX 45,678</h4>
                                        <span class="badge bg-danger-faded text-danger">- 10%</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <span class="dot dot-xs bg-primary me-2"></span>
                                            <span class="small text-muted">2023</span>
                                        </div>
                                        <div class="d-flex align-items-center ms-4">
                                            <span class="dot dot-xs bg-light me-2"></span>
                                            <span class="small text-muted">2022</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="chart">
                                    <div class="chart chart-lg">
                                        <canvas id="chartYearlyIncome"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Revenue By Service Widget -->
                </div>
                @endif
                <!-- Middle Row Widgets-->
                @if(Auth::user()->role === 'customer')
                <div class="row">
                <div class="col-6 col-lg-3">
                    <div class="card h-100">
                        <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                            <h6 class="card-title">Total Appointments</h6>
                            <!-- Nav Pills -->
                            <ul class="nav nav-pills justify-content-end m-0" id="recordTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="animals-tab" data-bs-toggle="tab" data-bs-target="#animals" role="tab" aria-controls="animals" aria-selected="true"><i class="ri-folder-line me-3"></i></a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="medical-tab" data-bs-toggle="tab" data-bs-target="#medical" role="tab" aria-controls="medical" aria-selected="false"></a>
                                </li>
                                <br>
                            <h5 >0</h5>
                            </ul>
                            <!-- / Nav Pills -->
                        </div>
                    </div>
                </div>
                
                <div class="col-6 col-lg-3">
                    <div class="card h-100">
                        <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                            <h6 class="card-title">Pending Appointments</h6>
                            <!-- Nav Pills -->
                            <ul class="nav nav-pills justify-content-end m-0" id="scheduleTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="today-tab" data-bs-toggle="tab" data-bs-target="#today" role="tab" aria-controls="today" aria-selected="true"><i class="ri-money-dollar-circle-line me-3"></i></a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="tomorrow-tab" data-bs-toggle="tab" data-bs-target="#tomorrow" role="tab" aria-controls="tomorrow" aria-selected="false"></a>
                                </li>
                                <br>
                                <h5>0</h5>
                            </ul>
                            <!-- / Nav Pills -->
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="card h-100">
                        <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                            <h6 class="card-title">Rejected Appointments</h6>
                            <!-- Nav Pills -->
                            <ul class="nav nav-pills justify-content-end m-0" id="scheduleTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="today-tab" data-bs-toggle="tab" data-bs-target="#today" role="tab" aria-controls="today" aria-selected="true"><i class="ri-money-dollar-circle-line me-3"></i></a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="tomorrow-tab" data-bs-toggle="tab" data-bs-target="#tomorrow" role="tab" aria-controls="tomorrow" aria-selected="false"></a>
                                </li>
                                <br>
                                <h5>0</h5>
                            </ul>
                            <!-- / Nav Pills -->
                        </div>
                    </div>
                </div>
            </div>
                @endif
                <!-- Footer -->
                @include('dashboard.layouts.footer')

                <!-- Sidebar Menu Overlay-->
                <div class="menu-overlay-bg"></div>
                <!-- / Sidebar Menu Overlay-->

                <!-- Modal Imports-->
                <!-- Place your modal imports here-->

                <!-- Default Example Modal Import-->
                <!-- Modal -->
                <div
                    class="modal fade"
                    id="exampleModal"
                    tabindex="-1"
                    aria-labelledby="exampleModalLabel"
                    aria-hidden="true"
                >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Modal title
                                </h5>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                ></button>
                            </div>
                            <div class="modal-body">
                                Here goes modal body content
                            </div>
                            <div class="modal-footer">
                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal"
                                >
                                    Close
                                </button>
                                <button type="button" class="btn btn-primary">
                                    Save changes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Offcanvas Imports-->
                <!-- Place your offcanvas imports here-->

                <!-- Default Example Offcanvas Import-->
                <div
                    class="offcanvas offcanvas-end"
                    tabindex="-1"
                    id="offcanvasExample"
                    aria-labelledby="offcanvasExampleLabel"
                >
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                            Offcanvas
                        </h5>
                        <button
                            type="button"
                            class="btn-close text-reset"
                            data-bs-dismiss="offcanvas"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="offcanvas-body">
                        <div>
                            Some text as placeholder. In real life you can have
                            the elements you have chosen. Like, text, images,
                            lists, etc.
                        </div>
                        <div class="dropdown mt-3">
                            <button
                                class="btn btn-secondary dropdown-toggle"
                                type="button"
                                id="dropdownMenuButton"
                                data-bs-toggle="dropdown"
                            >
                                Dropdown button
                            </button>
                            <ul
                                class="dropdown-menu"
                                aria-labelledby="dropdownMenuButton"
                            >
                                <li>
                                    <a class="dropdown-item" href="#">Action</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#"
                                        >Another action</a
                                    >
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#"
                                        >Something else here</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Navbar Notifications offcanvas-->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNotifications"aria-labelledby="offcanvasNotificationsLabel">
                    <div class="offcanvas-header">
                        <h5
                            class="offcanvas-title"
                            id="offcanvasNotificationsLabel"
                        >
                            Notifications
                        </h5>
                        <button
                            type="button"
                            class="btn-close text-reset"
                            data-bs-dismiss="offcanvas"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="offcanvas-body">
                        <!-- Notification-->
                        {{-- <div
                            class="d-flex justify-content-start align-items-start p-3 rounded bg-light mb-3"
                        >
                            <div class="position-relative mt-1">
                                <picture class="avatar avatar-sm">
                                    <img
                                        src="./assets/images/profile-small-2.jpeg"
                                        alt="HTML Bootstrap Admin Template by Pixel Rocket"
                                    />
                                </picture>
                                <span
                                    class="dot bg-success avatar-dot border-light dot-sm"
                                ></span>
                            </div> --}}
                            {{-- <div class="ms-4">
                                <p class="fw-bolder mb-1">John Jackson</p>
                                <p class="text-muted small mb-0">
                                    Just sent over regional sales. If you can
                                    let me know by the end...
                                </p>
                                <span
                                    class="fs-xs fw-bolder text-muted text-uppercase"
                                    >5 mins ago</span
                                >
                            </div> --}}
                        {{-- </div> --}}
                        <!-- / Notification-->

                        <!-- Notification-->
                        {{-- <div
                            class="d-flex justify-content-start align-items-start p-3 rounded bg-light mb-3"
                        >
                            <div class="position-relative mt-1">
                                <picture class="avatar avatar-sm">
                                    <img
                                        src="./assets/images/profile-small-3.jpeg"
                                        alt="HTML Bootstrap Admin Template by Pixel Rocket"
                                    />
                                </picture>
                                <span
                                    class="dot bg-success avatar-dot border-light dot-sm"
                                ></span>
                            </div>
                            <div class="ms-4">
                                <p class="fw-bolder mb-1">Peter Smith</p>
                                <p class="text-muted small mb-0">
                                    Hi Rob, can we setup a meeting for tomorrow
                                    around 2pm...
                                </p>
                                <span
                                    class="fs-xs fw-bolder text-muted text-uppercase"
                                    >30 mins ago</span
                                >
                            </div> --}}
                        {{-- </div> --}}
                        <!-- / Notification-->

                        <!-- Notification-->
                        {{-- <div
                            class="d-flex justify-content-start align-items-start p-3 rounded bg-light mb-3"
                        >
                            <div class="position-relative mt-1">
                                <picture class="avatar avatar-sm">
                                    <img
                                        src="./assets/images/profile-small-4.jpeg"
                                        alt="HTML Bootstrap Admin Template by Pixel Rocket"
                                    />
                                </picture>
                                <span
                                    class="dot bg-danger avatar-dot border-light dot-sm"
                                ></span>
                            </div>
                            <div class="ms-4">
                                <p class="fw-bolder mb-1">Helen Lewis</p>
                                <p class="text-muted small mb-0">
                                    Need to arrange for this year's Office
                                    lisences. Have to add two team licenses...
                                </p>
                                <span
                                    class="fs-xs fw-bolder text-muted text-uppercase"
                                    >43 mins ago</span
                                >
                            </div>
                        </div> --}}
                        <!-- / Notification-->

                        <!-- View all Btn-->
                        <a
                            href="#"
                            class="btn btn-outline-secondary w-100 mt-4"
                            role="button"
                            >View all notifications</a
                        >
                        <!-- / View all btn-->
                    </div>
                </div>
                <!-- / Footer-->
            </section>
            <!-- / Content-->
        </main>
        <!-- /Page Content -->

        <!-- Page Aside-->
        @include('dashboard.layouts.sidebar')
        <!-- / Page Aside-->

        @endsection
