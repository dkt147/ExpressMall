<?php
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
        return 1;
    }else{
        return 0;
    }
?>