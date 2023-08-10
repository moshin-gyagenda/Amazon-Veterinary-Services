<!doctype html>
<html lang="en">

<!-- Head -->
<head>
    <!-- Page Meta Tags-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon/favicon-16x16.png">
    <link rel="mask-icon" href="./assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@200;300;400;600&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="./assets/css/libs.bundle.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="./assets/css/theme.bundle.css" />

    
    <!-- Page Title -->
    <title>Amazon Veterinary Services </title>
    
</head>
<body class="">

  <!-- Main Section-->

  <section class="d-flex justify-content-center align-items-center vh-100 py-5 px-3 px-md-0">
    <!-- Login Form-->
    <div class="d-flex flex-column w-80 align-items-center">
        <!-- Logo-->
        <a href="./index.html" class="d-table mx-auto">
          <div class="d-flex align-items-center justify-content-center">
            <img src="assets/images/logo/logo.png" alt="" class="logo" style=" margin-top: 200px; max-width: 190px; height: auto;">
          </div>
        </a>
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
      <!-- Form Container -->
      <div class="shadow-lg rounded p-4 p-sm-5 bg-white form mb-4">
        <h5 class="fw-bold mb-3 text-muted">Create Your Account</h5>
        
        <!-- Register Form-->
        <form class="mt-4" action="{{route('registration')}}" method="POST">
            @csrf
          <div class="form-group">
            <label class="form-label form-label-light" for="register-fname">Full name</label>
            <input type="text" name="fullname" class="form-control  form-control-light" id="register-fname" placeholder="Enter your first name">
          </div>
          <div class="form-group">
            <label class="form-label form-label-light" for="register-lname">User name</label>
            <input type="text" name="username" class="form-control form-control-light" id="register-lname" placeholder="Enter your user name">
          </div>
          <div class="form-group">
            <label class="form-label form-label-light" for="register-email">Email address</label>
            <input type="email" name="email" class="form-control form-control-light" id="register-email" placeholder="Enter your email">
          </div>
          <div class="form-group">
            <label class="form-label form-label-light" for="register-password">Password</label>
            <input type="password" name="password" class="form-control form-control-light" id="register-password" placeholder="Enter your password">
          </div>
          <button type="submit" class="btn btn-primary d-block w-100 my-4" style="color: white;">Sign Up</button>
        </form>
        <!-- / Register Form-->

        <p class="d-block text-center text-muted small">Have an Account Already? <a class="" href="{{route('login')}}">Login Here</a></p>
      </div>
      
      <!-- / Form Container -->
    </div>
    
    <!-- / Login Form -->
  </section>
  

  <!-- / Main Section-->

  <!-- Theme JS -->
  <!-- Vendor JS -->
  <script src="./assets/js/vendor.bundle.js"></script>
  
  <!-- Theme JS -->
  <script src="./assets/js/theme.bundle.js"></script>
</body>

</html>
