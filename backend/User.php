<?php

include_once './Connection.php';

class User{

    private $conn;
    private $name;
    private $password;
    private $email;

    public function __construct()
    {
        $connection = connect();
        $this->conn = $connection;
    }

    // accessor and mututors
    public function setEmail($email){
        $this->username = $email;
    }

    public function getEmail(){
        return $this->email;
    }
    public function setname($name){
        $this->name = $name;
    }

    public function getname(){
        return $this->name;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password;
    }
   

    function login($email, $password){
        $sql = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password';";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return true;
        }
        else{
            return false;
        }
    }
}




$user = new User();
if($user->login("leong@gmail.com", "password")){
    echo "OK";
}
else{
    echo "Failed";
}










    // function __destruct()
    // {
    //     closeConnection($this->conn);
    // }

    