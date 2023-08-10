
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
                    <li class="breadcrumb-item active" aria-current="page"> Inventory Tracking</li>
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
                            <h6 class="card-title">Inventory Tracking</h6>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <button class="btn btn-sm btn-danger me-2 white-text" onclick="showOutOfStock()">
                                        Out of Stock
                                    </button>
                                    <button class="btn btn-sm btn-info white-text" onclick="showExpired()">
                                        Expired
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
                                <table class="table table-bordered" id="medicineTable">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-nowrap">#</th>
                                            <th scope="col" class="text-nowrap">Medicine Name</th>
                                            <th scope="col" class="text-nowrap">Category</th>
                                            <th scope="col" class="text-nowrap">Expiration Date</th>
                                            <th scope="col" class="text-nowrap">Quantity</th>
                                            <th scope="col" class="text-nowrap">Purchase Date</th>
                                            <th scope="col" class="text-nowrap">Purchase Price</th>
                                            <th scope="col" class="text-nowrap">Selling Price</th>
                                            <th scope="col" class="text-nowrap">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Medicine records will be dynamically populated here -->
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
            
            
                         <!-- / Footer-->

        </section>
        <!-- / Content-->
    </main>
    <!-- /Page Content -->

    <!-- Page Aside-->
    @include('dashboard.layouts.sidebar')
    <!-- / Page Aside-->

    <script>
        function downloadTable() {
            // Logic to download the table
            console.log("Download table");
        }
    
        function showOutOfStock() {
            // Logic to show out of stock medicines
            console.log("Show out of stock");
            // Clear the table
            const tableBody = document.getElementById("medicineTable").getElementsByTagName("tbody")[0];
            tableBody.innerHTML = "";
    
            // Filter and display out of stock medicines
            const outOfStockMedicines = {!! json_encode($medicines->where('quantity', 0)->toArray()) !!};
            renderMedicineRecords(outOfStockMedicines, tableBody);
        }
    
        function showExpired() {
            // Logic to show expired medicines
            console.log("Show expired");
            // Clear the table
            const tableBody = document.getElementById("medicineTable").getElementsByTagName("tbody")[0];
            tableBody.innerHTML = "";
    
            // Filter and display expired medicines
            const expiredMedicines = {!! json_encode($medicines->where('expiration_date', '<', date('Y-m-d'))->toArray()) !!};
            renderMedicineRecords(expiredMedicines, tableBody);
        }
    
        function renderMedicineRecords(medicines, tableBody) {
            if (medicines.length === 0) {
                // Display "No data to display" message
                const noDataMessage = document.createElement("tr");
                const noDataCell = document.createElement("td");
                noDataCell.setAttribute("colspan", "9");
                noDataCell.classList.add("text-center");
                noDataCell.textContent = "No data to display";
                noDataMessage.appendChild(noDataCell);
                tableBody.appendChild(noDataMessage);
                return;
            }
    
            medicines.forEach((medicine, index) => {
                const row = document.createElement("tr");
    
                const idCell = document.createElement("th");
                idCell.setAttribute("scope", "row");
                idCell.classList.add("text-nowrap");
                idCell.textContent = index + 1;
                row.appendChild(idCell);
    
                const nameCell = document.createElement("td");
                nameCell.classList.add("text-nowrap");
                nameCell.textContent = medicine.medicine_name;
                row.appendChild(nameCell);
    
                const categoryCell = document.createElement("td");
                categoryCell.classList.add("text-nowrap");
                categoryCell.textContent = medicine.category;
                row.appendChild(categoryCell);
    
                const expirationCell = document.createElement("td");
                expirationCell.classList.add("text-nowrap");
                expirationCell.textContent = medicine.expiration_date;
                row.appendChild(expirationCell);
    
                const quantityCell = document.createElement("td");
                quantityCell.classList.add("text-nowrap");
                quantityCell.textContent = medicine.quantity;
                row.appendChild(quantityCell);
    
                const purchaseDateCell = document.createElement("td");
                purchaseDateCell.classList.add("text-nowrap");
                purchaseDateCell.textContent = medicine.purchase_date;
                row.appendChild(purchaseDateCell);
    
                const purchasePriceCell = document.createElement("td");
                purchasePriceCell.classList.add("text-nowrap");
                purchasePriceCell.textContent = medicine.purchase_price;
                row.appendChild(purchasePriceCell);
    
                const sellingPriceCell = document.createElement("td");
                sellingPriceCell.classList.add("text-nowrap");
                sellingPriceCell.textContent = medicine.selling_price;
                row.appendChild(sellingPriceCell);
    
                const actionsCell = document.createElement("td");
                actionsCell.classList.add("d-flex", "justify-content-center");
    
                const editButton = document.createElement("a");
                editButton.setAttribute("href", "");
                editButton.classList.add("btn", "btn-sm", "btn-success", "me-1");
                editButton.dataset.bsToggle = "modal";
                editButton.dataset.bsTarget = "#editModal";
                editButton.innerHTML = '<i class="fa fa-pencil fa-fw text-white" style="vertical-align: middle;"></i>';
                actionsCell.appendChild(editButton);
    
                const viewButton = document.createElement("a");
                viewButton.setAttribute("href", "");
                viewButton.classList.add("btn", "btn-sm", "btn-primary", "me-1");
                viewButton.dataset.bsToggle = "modal";
                viewButton.dataset.bsTarget = "#viewModal";
                viewButton.innerHTML = '<i class="fa fa-eye fa-fw text-white" style="vertical-align: middle;"></i>';
                actionsCell.appendChild(viewButton);
    
                const deleteForm = document.createElement("form");
                deleteForm.setAttribute("action", "");
                deleteForm.setAttribute("method", "POST");
                deleteForm.classList.add("d-inline");
                actionsCell.appendChild(deleteForm);
    
                const csrfToken = document.createElement("input");
                csrfToken.setAttribute("type", "hidden");
                csrfToken.setAttribute("name", "_token");
                csrfToken.value = "{{ csrf_token() }}";
                deleteForm.appendChild(csrfToken);
    
                const deleteButton = document.createElement("button");
                deleteButton.setAttribute("type", "submit");
                deleteButton.classList.add("btn", "btn-sm", "btn-danger", "ms-1");
                deleteButton.setAttribute("onclick", "return confirm('Are you sure you want to delete this medicine?');");
                deleteButton.innerHTML = '<i class="fa fa-trash fa-fw text-white" style="vertical-align: middle;"></i>';
                deleteForm.appendChild(deleteButton);
    
                row.appendChild(actionsCell);
    
                tableBody.appendChild(row);
            });
        }
    </script>
   @endsection
