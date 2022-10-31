<?php

session_start();

include_once './Connection.php';
include_once './User.php';

// if(isset($_POST['login-submit'])){
//     $email = $_POST['username'];
//     $password = $_POST['password'];


//     echo $email . " " . $password;
//     $user = new User();
//     if($user->login($email, $password)){
//         $_SESSION['username'] = $username;
//         $_SESSION['message'] = "You are logged";
//         header("Location: ./dashboard.php");
//     }
//     else{
//         $_SESSION['error'] = "Password or Username Error";
//         header("Location: ./index.php");
//     }
// }

$user = new User();
if($user->login('leong@gmail.com', 'password')){
    echo "logged in";
}
else{
    echo "Failed";
}