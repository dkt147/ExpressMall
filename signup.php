<?php
if(isset($_POST['signup'])){
    include "db.php";

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO `users`(`name`, `email`, `phone`, `password`) VALUES ('$name','$email','$phone','$password')";
    $run = mysqli_query($con,$query);
    if($run){
        session_start();
        $_SESSION['email'] = $email;
        echo "<script>window.location.href='index.php'</script>";
        // header("Location : index.php");

    }else{
        echo "<script>alert('Signup Failed')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Express Mall Store | Signup</title>
    <!-- core:css -->
    <link rel="stylesheet" href="assets/vendors/core/core.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/sweetalert2/sweetalert2.min.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/demo_5/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="icon.jpeg" />
</head>
<body>
<div class="main-wrapper">
    <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">

            <div class="row w-100 mx-0 auth-page">
                <div class="col-md-8 col-xl-6 mx-auto">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4 pr-md-0">
                                <div class="auth-left-wrapper" style='background-image: url("assets/images/login-side2.png")'>
                                </div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="auth-form-wrapper px-4 py-5">
                                    <a href="#" class="noble-ui-logo d-block mb-2">Express<span>Mall</span></a>
                                    <h5 class="text-muted font-weight-normal mb-4">Please Singup your account.</h5>
                                    <form class="forms-sample" action="signup.php" method="post">
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Full name</label>
                                            <input type="text" class="form-control" placeholder="Name" id="Name" name="name" required>
                                        </div> 
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Phone</label>
                                            <input type="text" class="form-control" placeholder="Phone" id="Phone" name="phone" required>
                                        </div>
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" placeholder="Email" id="Email" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="Password" autocomplete="current-password" placeholder="Password" name="password" required>
                                        </div>
                                        <div class="mt-3">
                                            <input type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white" id="Login-Form" value="Signup" name="signup">
                                        </div>
                                        <a href="login.php" class="d-block mt-3 text-muted">Already have an account?</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- core:js -->
<script src="assets/vendors/core/core.js"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<!-- end plugin js for this page -->
<!-- inject:js -->
<script src="assets/vendors/feather-icons/feather.min.js"></script>
<script src="assets/js/template.js"></script>
<script src="assets/vendors/select2/select2.min.js"></script>
<script src="assets/js/select2.js"></script>
<script src="assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="assets/js/bootstrap-maxlength.js"></script>
<script src="assets/vendors/inputmask/jquery.inputmask.min.js"></script>
<script src="assets/js/inputmask.js"></script>
<script src="assets/vendors/jquery-tags-input/jquery.tagsinput.min.js"></script>
<script src="assets/js/tags-input.js"></script>
<script src="assets/vendors/sweetalert2/sweetalert2.min.js"></script>
<script src="assets/js/sweet-alert.js"></script>
<!-- endinject -->
<!-- custom js for this page -->
<!-- end custom js for this page -->

</body>
</html>