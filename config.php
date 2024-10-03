<?php
    /*
    * This file contains an example of the configuration for the database
    * Create a copy of this file and rename it to config.php
    */

    
    // Database configuration - Replace with your database details
    $host = 'localhost';     // Your database host (usually localhost)
    $dbname   = 'user_registration'; // Your database name
    $user = 'root';          // Your database username
    $pass = '';              // Your database password

// Create connection
    $conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    // Create database if not exists
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully or already exists";
    } else {
        echo "Error creating database: " . $conn->error . "\n";
    }

    // Select the database
    $conn->select_db($dbname);

    // Create users table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) NOT NULL UNIQUE,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table users created successfully or already exists\n";
    } else {
        echo "Error creating table: " . $conn->error . "\n";
    }

?>
