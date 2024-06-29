<?php
    session_start();
    
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "seasalon";
    
    //create connection and save into variable called $conn
    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
?>