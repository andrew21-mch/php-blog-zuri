<?php

session_start();

if(isset($_SESSION['username'])){
    echo "Hi " .$_SESSION['username'];
}