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
            header('Location: ./login.php');
        }
        else{
            //redirect to login page
            header('Location: .');
        }
    }
  
    public function login($username, $password) {
        $sql = "SELECT * FROM users WHERE email = '$username'";
        $result = $this->conn->query($sql);
        $user = array();
        if ($result->num_rows > 0) {
            // check if password matches
            while($row = $result->fetch_assoc()) {
                $user = $row;
            }
            if(password_verify($password, $user['password'])){
                session_start();
                $_SESSION['loggedInUser'] = $user['id'];
                return true;
            }
            else{
                return false;
            }

        }
        else{
            return false;
        }

    }


    // functional
    public function register($name, $email, $password,) {
        $hashed_password = $this->hashPassword($password);
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        }
        else{
            return false;
        }
    }

    function passwordMatch($password, $password_repeat){
        if( $password == $password_repeat){
            return true;
        }
        else{
            return false;
        }
    }

    public function hashPassword($password){
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        return $hashed_password;
    }
    

    // object oriented best practices
    public function save(){
        // use accessors
        $name = $this->getName();
        $email = $this->getEmail();
        $password = $this->hashPassword($this->getPassword());

        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        }
        else{
            return false;
        }
    }

    // public function countUsers(){
    //     $sql = "SELECT COUNT(*) as count FROM users";
    //     $result = $this->conn->query($sql);
    //     $count = $result->fetch_assoc();
    //     return $count["count"];

    // }
    public function getUsers(){
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);
        $users = array();

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $users[] = $row;
            }
        }

        return $users;
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
