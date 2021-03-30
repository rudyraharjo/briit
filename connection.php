<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bri_it_test";
try {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
} catch (PDOException $e) {
    //echo "Connection failed: " . $e->getMessage();
}
