<aside class="aside bg-dark-700">
    <div class="simplebar-wrapper">
        <div data-pixr-simplebar>
            <div class="pb-6 pb-sm-0 position-relative">
                <!-- Mobile close btn-->
                <div class="cursor-pointer close-menu me-4 text-primary-hover transition-color disable-child-pointer position-absolute end-0 top-0 mt-3 pt-1 d-xl-none">
                    <i class="ri-close-circle-line ri-lg align-middle me-n2"></i>
                </div>
                <!-- / Mobile close btn-->

                
                <!-- / Mobile Logo-->

                <!-- User Details-->
                <div class="border-bottom pt-3 pb-5 mb-1 d-flex flex-column align-items-center">
                    <div class="position-relative">
                        <picture class="avatar avatar-profile">
                            <img class="avatar-profile-img" src="{{asset('./assets/images/logo/logo.png')}}" alt="" width="80px">
                        </picture>
                        <span class="dot bg-success avatar-dot"></span>
                    </div>
                    <p class="mb-0 mt-3 text-white">{{ Auth::user()->fullname }}</p>
                    <small>{{ Auth::user()->email }}</small>
                    <div class="d-flex flex-wrap mt-2 justify-content-between align-items-center">
                        <div class="py-2 f-h-9 px-3 d-flex justify-content-center align-items-center bg-dark-opacity rounded p-2 small fw-bolder me-1">
                            <i class="ri-map-pin-line me-2"></i>System Admin
                        </div>

                        <!-- User profile dropdown-->
                        <div class="dropdown m-0">
                            <button class="border-0 rounded px-2 f-h-9 bg-dark-opacity p-0 text-body" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-settings-2-line"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <i class="ri-user-line me-2"></i>
                                        Profile
                                    </a>
                                </li>
                                {{-- <li>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <i class="ri-settings-2-line me-2"></i>
                                        Settings
                                    </a>
                                </li> --}}
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger d-flex align-items-center" href="{{route('logout')}}">
                                        <i class="ri-lock-line me-2"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- / User profile dropdown -->
                    </div>
                </div>
                <!-- User Details -->

                <ul class="list-unstyled mb-4 aside-menu">
                    <!-- Dashboard Menu Section -->
                    <li class="menu-item">
                        <a class="d-flex align-items-center menu-link
                        " href="{{route('dashboard')}}">
                        <i class="ri-home-4-line me-3"></i>
                        <span>Dashboard</span>
                        </a>
                        </li>
                     @if(Auth::user()->role === 'admin')
                <li class="menu-item">
                    <a class="d-flex align-items-center collapsed menu-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMenuItemRecord" aria-expanded="false" aria-controls="collapseMenuItemRecord">
                        <i class="ri-folder-line me-3"></i>
                        <span>Animal Management</span>
                    </a>
                    <div class="collapse" id="collapseMenuItemRecord">
                        <ul class="submenu">
                            <li>
                                <a class="submenu-link" href="{{route('register-animal')}}">Animal registration</a>
                            </li>
                            <li>
                                <a class="submenu-link" href="{{route('animals')}}">View Animals</a>
                            </li>

                            
                        </ul>
                    </div>
                </li>

                <li class="menu-item">
                    <a class="d-flex align-items-center collapsed menu-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMenuItemAppointments" aria-expanded="false" aria-controls="collapseMenuItemAppointments">
                        <i class="ri-calendar-2-line me-3"></i>
                        <span>Appointments Mgt</span>
                    </a>
                    <div class="collapse" id="collapseMenuItemAppointments">
                        <ul class="submenu">
                            {{-- <li>
                                <a class="submenu-link" href="{{route('appointment')}}">Appointment</a>
                            </li> --}}
                            <li>
                                <a class="submenu-link" href="{{route('view-appointments')}}">View Appointments</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-item">
                    <a class="d-flex align-items-center collapsed menu-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMenuItemInventory" aria-expanded="false" aria-controls="collapseMenuItemInventory">
                        <i class="ri-archive-line me-3"></i>
                        <span>Inventory Mgt</span>
                    </a>
                    <div class="collapse" id="collapseMenuItemInventory">
                        <ul class="submenu">
                            <li>
                                <a class="submenu-link" href="{{route('medicine')}}">Medicine</a>
                            </li>
                            
                            <li>
                                <a class="submenu-link" href="{{route('view-medicine')}}">View Stock</a>
                            </li>
                            <li>
                                <a class="submenu-link" href="{{route('inventory')}}">Inventory Tracking</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-item">
                    <a class="d-flex align-items-center collapsed menu-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMenuItemMedicalExam" aria-expanded="false" aria-controls="collapseMenuItemMedicalExam">
                        <i class="ri-stethoscope-line me-3"></i>
                        <span>Medical Examination</span>
                    </a>
                    <div class="collapse" id="collapseMenuItemMedicalExam">
                        <ul class="submenu">
                            <li>
                                <a class="submenu-link" href="{{route('diagonosis')}}">Add Diagonosis</a>
                            </li>
                            <li>
                                <a class="submenu-link" href="{{route('diagnosis-results')}}">View Results</a>
                            </li>
                            <li>
                                <a class="submenu-link" href="{{route('drug-prescription')}}">Drug Prescription</a>
                            </li>
                            <li>
                                <a class="submenu-link" href="{{route('prescription-summary')}}">Prescription Summary</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-item">
                    <a class="d-flex align-items-center collapsed menu-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMenuItemBilling" aria-expanded="false" aria-controls="collapseMenuItemBilling">
                        <i class="fa fa-credit-card me-3"></i>
                        <span>Point of Sale</span>
                    </a>
                    <div class="collapse" id="collapseMenuItemBilling">
                        <ul class="submenu">
                            <li>
                                <a class="submenu-link" href="{{route('veterinary')}}">Veterinary Shop</a>
                            </li>
                            <li>
                                <a class="submenu-link" href="{{route('billing-payment')}}">Billing and Payment</a>
                            </li>
                        </ul>
                    </div>
                </li>

                
                
                <!-- User Management Menu Section -->
                <li class="menu-item">
                    <a class="d-flex align-items-center menu-link" href="{{route('user-register')}}">
                        <i class="ri-user-3-line me-3"></i>
                        <span>User Management</span>
                    </a>
                </li>
                <!-- / User Management Menu Section -->

                <li class="menu-item">
                    <a class="d-flex align-items-center menu-link" href="{{route('logout')}}">
                        <i class="ri-lock-line me-2"></i>
                        <span>Logout</span>
                    </a>
               
                </li>
                    @endif

                    @if(Auth::user()->role === 'customer')
                    <li class="menu-item">
                        <a class="d-flex align-items-center collapsed menu-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMenuItemAppointments" aria-expanded="false" aria-controls="collapseMenuItemAppointments">
                            <i class="ri-calendar-2-line me-3"></i>
                            <span>Appointments Mgt</span>
                        </a>
                        <div class="collapse" id="collapseMenuItemAppointments">
                            <ul class="submenu">
                                <li>
                                    <a class="submenu-link" href="{{route('appointment')}}">Make Appointment</a>
                                </li>
                                <li>
                                    <a class="submenu-link" href="{{route('view-appointments')}}">View Appointments</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="menu-item">
                        <a class="d-flex align-items-center menu-link" href="{{route('logout')}}">
                            <i class="ri-lock-line me-2"></i>
                            <span>Logout</span>
                        </a>
                   
                    </li>
                    @endif
                    <!-- / Pages Menu Section -->
                </ul>
            </div>
        </div>
    </div>
</aside>