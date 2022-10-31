<?php
// create user class and methods
include_once './Connection.php';
class User {
    private $conn;
    private $name;
    private $password;
    private $password_repeat;
    private $email;
    
    public function __construct() {
        $connection = connect();
        $this->conn = $connection;
    }
    
    public function logout(){
        //check if user is logged in
        if(isset($_SESSION['username'])){
            //unset session
            session_unset();
            session_destroy();
            //redirect to login page
            header('Location: index.php');
        }
        else{
            //redirect to login page
            header('Location: .');
        }
    }
  
    public function login($username, $password) {
        $sql = "SELECT * FROM users WHERE email = '$username' AND password = '$password'";
        $result = $this->conn->query($sql);
        $user = array();
        if ($result->num_rows > 0) {
            return true;
        }
        else{
            return false;
        }

    }

    // define setters and getters
    public function setUsername($name) {
        $this->username = $name;
    }
    public function getUsername() {
        return $this->name;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
    public function getPassword() {
        return $this->password;
    }
    public function setPassword_repeat($password_repeat) {
        $this->password_repeat = $password_repeat;
    }
    public function getPassword_repeat() {
        return $this->password_repeat;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function getName() {
        return $this->name;
    }

}


