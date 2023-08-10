<!DOCTYPE html>
<html lang="en">
    <!-- Head -->
    <head>
        <!-- Page Meta Tags-->
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="keywords" content="" />

        <!-- Favicon -->
        <link
            rel="apple-touch-icon"
            sizes="180x180"
            href="./assets/images/favicon/apple-touch-icon.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="32x32"
            href="./assets/images/favicon/favicon-32x32.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="16x16"
            href="./assets/images/favicon/favicon-16x16.png"
        />
        <link
            rel="mask-icon"
            href="./assets/images/favicon/safari-pinned-tab.svg"
            color="#5bbad5"
        />
        <meta name="msapplication-TileColor" content="#da532c" />
        <meta name="theme-color" content="#ffffff" />

        <!-- Google Font-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Overpass:wght@200;300;400;600&display=swap"
            rel="stylesheet"
        />
       
        <!-- Vendor CSS -->
        <link rel="stylesheet" href="{{asset('./assets/css/libs.bundle.css')}}" />

        <!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('./assets/css/theme.bundle.css')}}" />
        <!-- fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('/fontawesome/css/all.min.css')}}">
       


        <!-- Fix for custom scrollbar if JS is disabled-->
        <noscript>
            <style>
                /**
          * Reinstate scrolling for non-JS clients
          */
                .simplebar-content-wrapper {
                    overflow: auto;
                }
            </style>
        </noscript>
        <style>
            .aside .aside-menu .menu-item:first-child {
                margin-bottom: 10px; /* Adjust this value as needed */
            }
            .white-text {
                color: white;
            }
            /* .table-bordered td {
                border-right: 1px solid #dee2e6;
            } */

            .table-bordered th,
            .table-bordered td:last-child {
                border-right: none;
            }
        </style>

        <!-- Page Title -->
        <title>Amazon Veterinary Services</title>
    </head>
    <body class="">

        @yield('content')
 <!-- Theme JS -->
        <!-- Vendor JS -->
        <script src="{{asset('./assets/js/vendor.bundle.js')}}"></script>

        <!-- Theme JS -->
        <script src="{{asset('./assets/js/theme.bundle.js')}}"></script>
        <script src="{{asset('./assets/js/JQuery.js')}}"></script>

        
        <script>
            // Hide success message after 5 seconds
            setTimeout(function() {
                $('#success-alert').fadeOut('slow');
            }, 5000);

            // Hide error message after 5 seconds
            setTimeout(function() {
                $('#error-alert').fadeOut('slow');
            }, 5000);
        </script>

<script>
    function downloadTable() {
        const table = document.querySelector('.table');
        const rows = Array.from(table.querySelectorAll('tbody tr'));
        const headers = Array.from(table.querySelectorAll('thead th')).map(header => header.innerText);

        // Find the index of the ID, Title, and Action columns
        const idColumnIndex = headers.findIndex(header => header === 'ID');
        const titleColumnIndex = headers.findIndex(header => header === 'Title');
        const actionColumnIndex = headers.findIndex(header => header === 'Action');

        // Remove the ID, Title, and Action columns from headers
        const filteredHeaders = headers.filter((_, index) => index !== idColumnIndex && index !== titleColumnIndex && index !== actionColumnIndex);

        const csvContent = [
            filteredHeaders.join(','),
            ...rows.map(row => {
                const cells = Array.from(row.querySelectorAll('td'));
                // Remove the ID, Title, and Action cells from the row
                const filteredCells = cells.filter((_, index) => index !== idColumnIndex && index !== titleColumnIndex && index !== actionColumnIndex);
                return filteredCells.map(cell => cell.innerText).join(',');
            })
        ].join('\n');

        const blob = new Blob([csvContent], { type: 'text/csv' });
        const url = URL.createObjectURL(blob);

        const a = document.createElement('a');
        a.href = url;
        a.download = 'animal_list.csv';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);

        URL.revokeObjectURL(url);
    }
</script>


<script>
    // When the accept button is clicked
    $('.accept-btn').click(function(e) {
        e.preventDefault();

        var appointmentId = $(this).data('appointment-id');
        var status = 'accepted'; // Set the desired status value

        updateAppointmentStatus(appointmentId, status);
    });

    // When the reject button is clicked
    $('.reject-btn').click(function(e) {
        e.preventDefault();

        var appointmentId = $(this).data('appointment-id');
        var status = 'rejected'; // Set the desired status value

        updateAppointmentStatus(appointmentId, status);
    });

    // When the delete button is clicked
    $('.delete-btn').click(function(e) {
        e.preventDefault();

        var appointmentId = $(this).data('appointment-id');
        var status = 'deleted'; // Set the desired status value

        updateAppointmentStatus(appointmentId, status);
    });

    // Function to update the appointment status using AJAX
    function updateAppointmentStatus(appointmentId, status) {
        $.ajax({
            url: '{{ route("update.appointment.status") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                status: status,
                appointmentId: appointmentId
            },
            success: function(response) {
                // Handle the success response
                console.log(response.message);
                // Optionally, you can update the UI to reflect the updated status

                // Reload the page
                location.reload();
            },
            error: function(xhr, status, error) {
                // Handle the error response
                console.log(xhr.responseText);
            }
        });
    }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#animalCode').on('keyup', function() {
            var animalCode = $(this).val();

            $.ajax({
                url: '{{ route('search') }}',
                method: 'GET',
                data: {
                    animalCode: animalCode
                },
                success: function(response) {
                    if (response.error) {
                        // Handle error case, e.g., display error message
                        $('#animalType').val('');
                        $('#breed').val('');
                        $('#color_markings').val('');
                        $('#owner_info').val('');
                    } else {
                        // Populate the input field with the retrieved data
                        $('#animalType').val(response.animal_type);
                        $('#breed').val(response.breed);
                        $('#color_markings').val(response.color_markings);
                        $('#owner_info').val(response.owner_info);
                    }
                },
                error: function() {
                    // Handle error case, e.g., display error message
                    $('#animalType').val('');
                    $('#breed').val('');
                    $('#color_markings').val('');
                    $('#owner_info').val('');
                }
            });
        });
    });
</script>

    
<script>
        $(document).ready(function() {
            $('#medicine').on('change', function() {
                var medicine = $(this).val();
    
                $.ajax({
                    url: '{{ route('get-medicine-price') }}',
                    method: 'GET',
                    data: {
                        medicine: medicine
                    },
                    success: function(response) {
                        if (response.error) {
                            // Handle error case, e.g., display error message
                            $('#price').val('');
                            
                        } else {
                            // Populate the input field with the retrieved data
                            $('#price').val(response.selling_price);
                            
                        }
                    },
                    error: function() {
                        // Handle error case, e.g., display error message
                        $('#price').val('');
                       
                    }
                });
            });
        });
</script>

<script>
    $(document).ready(function() {
        $('#animal_code').on('keyup', function() {
            var animal_code = $(this).val();

            $.ajax({
                url: '{{ route('get-prescriptions') }}',
                method: 'GET',
                data: {
                    animal_code: animal_code
                },
                success: function(response) {
                    if (response.error) {
                        // Handle error case, e.g., display error message
                        $('#prescriptionTable').empty();
                    } else {
                        var prescriptions = response.prescriptions;
                        var tableBody = $('#prescriptionTable');
                        var subtotal = response.subtotal;
                        var totalAmount = response.totalAmount;

                        tableBody.empty();

                        if (prescriptions.length > 0) {
                            $.each(prescriptions, function(index, prescription) {
                                var row = '<tr>' +
                                    '<td>' + prescription.medicine + '</td>' +
                                    '<td>' + prescription.dosage + '</td>' +
                                    '<td>' + prescription.frequency + '</td>' +
                                    '<td>' + prescription.duration + '</td>' +
                                    '<td>' + prescription.quantity + '</td>' +
                                    '<td>' + prescription.instructions + '</td>' +
                                    '<td>' + prescription.price + '</td>' +
                                    '<td>' + (prescription.price * prescription.quantity) + '</td>' +
                                    '</tr>';
                                tableBody.append(row);
                            });
                        } else {
                            var row = '<tr><td colspan="8">No prescriptions found.</td></tr>';
                            tableBody.append(row);
                        }

                        // Update the subtotal and total amount
                        $('#subtotal').text(subtotal);
                        $('#totalAmount').text(totalAmount);
                    }
                },
                error: function() {
                    // Handle error case, e.g., display error message
                    $('#prescriptionTable').empty();
                }
            });
        });
    });
</script>



<script>
    // JavaScript code to handle the plus button click event
    const plusButtons = document.querySelectorAll('.plus-btn');
    plusButtons.forEach(button => {
        button.addEventListener('click', () => {
            const target = button.dataset.target;
            const collapseElement = document.querySelector(target);
            collapseElement.classList.toggle('show');
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#customer_name').on('keyup', function() {
            var acustomer_name = $(this).val();

            $.ajax({
                url: '{{ route('get-prescriptions') }}',
                method: 'GET',
                data: {
                    customer_name: customer_name
                },
                success: function(response) {
                    if (response.error) {
                        // Handle error case, e.g., display error message
                        $('#prescriptionTable').empty();
                    } else {
                        var prescriptions = response.prescriptions;
                        var tableBody = $('#prescriptionTable');
                        var subtotal = response.subtotal;
                        var totalAmount = response.totalAmount;

                        tableBody.empty();

                        if (prescriptions.length > 0) {
                            $.each(prescriptions, function(index, prescription) {
                                var row = '<tr>' +
                                    '<td>' + prescription.medicine + '</td>' +
                                    '<td>' + prescription.dosage + '</td>' +
                                    '<td>' + prescription.frequency + '</td>' +
                                    '<td>' + prescription.duration + '</td>' +
                                    '<td>' + prescription.quantity + '</td>' +
                                    '<td>' + prescription.instructions + '</td>' +
                                    '<td>' + prescription.price + '</td>' +
                                    '<td>' + (prescription.price * prescription.quantity) + '</td>' +
                                    '</tr>';
                                tableBody.append(row);
                            });
                        } else {
                            var row = '<tr><td colspan="8">No prescriptions found.</td></tr>';
                            tableBody.append(row);
                        }

                        // Update the subtotal and total amount
                        $('#subtotal').text(subtotal);
                        $('#totalAmount').text(totalAmount);
                    }
                },
                error: function() {
                    // Handle error case, e.g., display error message
                    $('#prescriptionTable').empty();
                }
            });
        });
    });
</script>

</body>
</html>