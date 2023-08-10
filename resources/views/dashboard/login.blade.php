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
          <img src="assets/images/logo/logo.png" alt="" class="logo" style="max-width: 190px; height: auto;">
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
      <div class="shadow-lg rounded p-4 p-sm-5 bg-white form ">
        <h5 class="fw-bold text-muted">Enter Your Username and Password</h5>
        {{-- <p class="text-muted">Welcome back!</p> --}}
  
        <!-- Login Form-->
        <form action="{{route('user-login')}}" method="POST">
          @csrf
          <div class="form-group">
            <label class="form-label form-label-light" for="login-email">Username</label>
            <input type="text" name="email_or_username" class="form-control form-control-light"  placeholder=" Enter your username">
          </div>
          <div class="form-group">
            <label for="login-password" class="form-label form-label-light d-flex justify-content-between align-items-center">
              Password
              <a href="./forgot-password.html" class=" small ms-2 " style="color: blue; text-decoration: none">Forgotten
                password?</a>
            </label>
            <input type="password" name="password" class="form-control form-control-light" id="login-password" placeholder="Enter your password">
          </div>
          <button type="submit" class="btn btn-primary d-block w-100 my-4" style="color: white;">Login</button>
        </form>
        <!-- / Login Form -->
  
        <p class="d-block text-center text-muted small">New customer? <a class="" href="{{route('register-user')}}">Sign up for an account</a></p>
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
