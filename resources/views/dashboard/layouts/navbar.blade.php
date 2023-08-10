<nav  class="navbar navbar-expand-lg navbar-light border-0 py-0 fixed-top bg-dark-800">
    <div class="container-fluid">
        <div
            class="d-flex justify-content-between align-items-center flex-grow-1 navbar-actions"
        >
            <!-- Menu Toggle-->
            <div
                class="menu-toggle cursor-pointer me-4 text-primary-hover transition-color disable-child-pointer"
            >
                <i
                    class="ri-menu-fold-line ri-lg fold align-middle"
                    data-bs-toggle="tooltip"
                    data-bs-placement="right"
                    title="Close menu"
                ></i>
                <i
                    class="ri-menu-unfold-line ri-lg unfold align-middle"
                    data-bs-toggle="tooltip"
                    data-bs-placement="right"
                    title="Open Menu"
                ></i>
            </div>
            <!-- / Menu Toggle-->

            <!-- Navbar Actions-->
            <div class="d-flex align-items-center">
                <!-- Search-->
                <button class="btn-icon btn-hover-dark btn-search me-2">
                    <i
                        class="ri-search-2-line align-bottom lh-1 text-body"
                    ></i>
                </button>

                <!-- Search navbar overlay-->
                <div class="navbar-search d-none">
                    <div class="input-group mb-3 h-100">
                        <span
                            class="input-group-text px-4 bg-transparent"
                            ><i class="ri-search-line ri-lg"></i
                        ></span>
                        <input
                            type="text"
                            class="form-control text-body bg-transparent border-0"
                            placeholder="Enter your search terms..."
                        />
                        <span
                            class="input-group-text px-4 cursor-pointer disable-child-pointer close-search bg-transparent"
                            ><i
                                class="ri-close-circle-line ri-lg text-primary"
                            ></i
                        ></span>
                    </div>
                </div>
                <!-- / Search navbar overlay-->

                <!-- / Search-->

                

                <!-- Notifications-->
                <a
                    class="btn-icon btn-hover-dark position-relative p-2 disable-child-pointer"
                    data-bs-toggle="offcanvas"
                    href="#offcanvasNotifications"
                    role="button"
                    aria-controls="offcanvasNotifications"
                >
                    <i
                        class="ri-notification-fill align-bottom text-body lh-1"
                    ></i>
                    <span
                        class="badge bg-primary text-white position-absolute top-0 end-0"
                        >3</span
                    >
                </a>
                <!-- / Notifications-->
            </div>
            <!-- / Navbar Actions-->
        </div>
    </div>
</nav>