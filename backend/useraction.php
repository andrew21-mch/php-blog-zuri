<?php

session_start();

include_once './Connection.php';
include_once './User.php';

$user  = new User();


if(isset($_POST['login-submit'])){
    $password = $_POST['password'];
    $username = $_POST['username'];
    if($user->login($username, $password)){
        $username = $_POST['username'];
        $_SESSION['username'] = $username;
        return header("location: ./dashboard.php");
    }else{
        $_SESSION['error'] = "Invalid username or password";
        header("Location: ./login.php");
    }
}

elseif(isset($_POST['register-submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password-repeat'];
    if($user->passwordMatch($password, $password_repeat)){
        
        // user mutators
        $user->setName($name);
        $user->setEmail($email);
        $user->setPassword($password);

        if($user->save()){
            $username = $user->getEmail();
            $_SESSION['username'] = $email;
            return header("location: ./dashboard.php");
        }else{
            $_SESSION['error'] = "Invalid username or password";
            header("Location: ./register.php");
        }
    }
    else{
        $_SESSION['passwordValidation'] = "Passwords do not match!";
        header("location: ./register.php");
    }
    
}

elseif(isset($_POST['logout-submit'])){
    $user->logout();
}
