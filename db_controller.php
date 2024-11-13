<?php
    // DB server connection info
    $conn_host = "127.0.0.1"; // Server address
    $conn_port = 3306;        // Port number
    $conn_username = "root";
    $conn_password = "";
    $conn_dbname = "alumni"; // Add your database name here

    // Try connecting to the DB server, redirects to maintenance page if fails
    try {
        $conn = new mysqli($conn_host, $conn_username, $conn_password, $conn_dbname, $conn_port);

        // Check connection
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }
    } catch (Exception $e) {
        header('Location: maintenance.php');
        exit();
    }
?>
