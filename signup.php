
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
                                                <div id="recaptcha-container"></div>
                                                <br>
                                                <input class="btn btn-primary mr-2 mb-2 mb-md-0 text-white" id="Login-Form" value="Send OTP" name="signup" onclick="phoneAuth();">
                                            </div>

                                            <form >
                                                <div class="formcontainer" style="display: none; " id="verification-Div" >
                                                    <hr />
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Verify OTP</label>
                                                        <input type="text" class="form-control" id="verificationCode" placeholder="Enter verification code">
                                                    </div>
                                                    <input class="btn btn-primary mr-2 mb-2 mb-md-0 text-white" value="Verify OTP" onclick="codeverify();">
                                                    
                                                </div>
                                            </form>

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
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
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

    <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase.js"></script>
    <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyBUWfLgh_aJDQ29Xx_6EI-YAlQUb5_0u_w",
            authDomain: "expressmall.firebaseapp.com",
            projectId: "expressmall",
            storageBucket: "expressmall.appspot.com",
            messagingSenderId: "30293585027",
            appId: "1:30293585027:web:9b0427caf7cd5d283d3fb6",
            measurementId: "G-GTJKC89D23"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();
    </script>
    <script src="firebase.js" type="text/javascript"></script>
</body>

</html>