<?php

session_start(); // Start the session

if($_SERVER["REQUEST_METHOD"] == "POST"){

    //form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // database connect
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "findmystufflog"; 

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }
}

?>