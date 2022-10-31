<?php

session_start();

include_once './Connection.php';
include_once './User.php';


if(isset($_POST['login-submit'])){
    $user  = new User();
    $password = $_POST['password'];
    $username = $_POST['username'];
    if($user->login($username, $password)){
        $username = $_POST['username'];
        $_SESSION['username'] = $username;
        return header("location: ./dashboard.php");
    }else{
        $_SESSION['error'] = "Invalid username or password";
        header("Location: ./index.php");
    }
}