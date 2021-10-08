<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection to phpMyAdmin
$conn = new mysqli($servername,$username,$password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . mysqli_connect_error());
}

// Create new databse if it doesnt exist
$sql = "CREATE DATABASE IF NOT EXISTS rahwy";
if ($conn->query($sql) === TRUE) {

} else {
  echo "Error creating database: " . $conn->error;
}

// Select the databse
$conn = new mysqli($servername,$username,$password,"rahwy");

// Create the user table if it doesnt exist
$sql = "CREATE TABLE IF NOT EXISTS user (
    username VARCHAR(100) NOT NULL PRIMARY KEY UNIQUE,
    password_hash CHAR(40) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    user_role INT(11) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
    if ($conn->query($sql) === TRUE) {

    } else {
      echo "Error creating table: " . $conn->error;
    }


?>