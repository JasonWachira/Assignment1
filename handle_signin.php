<?php
require "AutoLoader.php";
require "db_conn.php";

// Validate entered email address
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Valid email";
    }
    else{
        echo "Invalid email";
    }
    
}
