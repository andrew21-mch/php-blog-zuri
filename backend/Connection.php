<?php 

// Path: backend/Connection.php

$host = "localhost"; 
$username = "root";
$userpass = '';
$database = "php_blog_post";

function connect(){
    global $host, $username,$database, $userpass;
    $conn = new mysqli($host, $username,$userpass, $database);
    if($conn->connect_error){
        die("Connection Failed: ". $conn->connect_error);
    }
    else{
        return $conn;
    }

}

function closeConnection($conn){
    $conn->close();
}