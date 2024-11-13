<?php
    include 'db_controller.php';

    // Check connection before executing anything DB related
    if (!$conn->connect_error) {
        try {
            // Create database if it doesn't exist
            $conn->query("CREATE DATABASE IF NOT EXISTS Alumni");
            $conn->select_db("Alumni");

            // Create tables
            $conn->query("CREATE TABLE IF NOT EXISTS user_table (
                email VARCHAR(50) NOT NULL PRIMARY KEY,
                first_name VARCHAR(50) NOT NULL,
                last_name VARCHAR(50) NOT NULL,
                dob DATE NULL,
                gender VARCHAR(6) NOT NULL,
                contact_number VARCHAR(15) NULL,
                hometown VARCHAR(50) NOT NULL,
                current_location VARCHAR(50) NULL,
                profile_image VARCHAR(100) NULL,
                job_position VARCHAR(50) NULL,
                qualification VARCHAR(70) NULL,
                year INT(4) NULL,
                university VARCHAR(50) NULL,
                company VARCHAR(50) NULL,
                resume VARCHAR(100) NULL
            )");

            $conn->query("CREATE TABLE IF NOT EXISTS account_table (
                email VARCHAR(50) NOT NULL,
                password VARCHAR(255) NOT NULL,
                type VARCHAR(5) NOT NULL,
                status VARCHAR(8) NOT NULL,
                FOREIGN KEY (email) REFERENCES user_table(email) ON DELETE CASCADE ON UPDATE CASCADE
            )");

            $conn->query("CREATE TABLE IF NOT EXISTS event_table (
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(100) NOT NULL,
                location VARCHAR(50) NOT NULL,
                description VARCHAR(700) NOT NULL,
                event_date DATE NOT NULL,
                photo VARCHAR(100) NULL,
                type VARCHAR(10) NOT NULL
            )");

            $conn->query("CREATE TABLE IF NOT EXISTS event_registration_table (
                event_id INT NOT NULL,
                participant_email VARCHAR(50) NOT NULL,
                FOREIGN KEY (event_id) REFERENCES event_table(id) ON DELETE CASCADE ON UPDATE CASCADE
            )");

            $conn->query("CREATE TABLE IF NOT EXISTS advertisement_table (
                id INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(100) NOT NULL,
                description VARCHAR(700) NOT NULL,
                date_added DATE NOT NULL,
                button_message VARCHAR(50) NULL,
                button_link VARCHAR(700) NULL,
                photo VARCHAR(100) NULL,
                category VARCHAR(50) NOT NULL,
                status VARCHAR(20) NOT NULL,
                advertiser VARCHAR(50) NOT NULL,
                appliable BOOLEAN,
                date_to_hide TIMESTAMP NULL,
                FOREIGN KEY (advertiser) REFERENCES user_table(email) ON DELETE CASCADE ON UPDATE CASCADE
            )");

            $conn->query("CREATE TABLE IF NOT EXISTS advertisement_registration_table (
                advertisement_id INT NOT NULL,
                email VARCHAR(50) NOT NULL,
                first_name VARCHAR(50) NOT NULL,
                last_name VARCHAR(50) NOT NULL,
                dob DATE NULL,
                gender VARCHAR(6) NOT NULL,
                contact_number VARCHAR(15) NULL,
                hometown VARCHAR(50) NOT NULL,
                current_location VARCHAR(50) NULL,
                profile_image VARCHAR(100) NULL,
                job_position VARCHAR(50) NULL,
                qualification VARCHAR(70) NULL,
                year INT(4) NULL,
                university VARCHAR(50) NULL,
                company VARCHAR(50) NULL,
                resume VARCHAR(100) NULL,
                FOREIGN KEY (advertisement_id) REFERENCES advertisement_table(id) ON DELETE CASCADE ON UPDATE CASCADE,
                FOREIGN KEY (email) REFERENCES user_table(email) ON DELETE CASCADE ON UPDATE CASCADE
            )");

            // Create chat_table to store messages between users
            $conn->query("CREATE TABLE IF NOT EXISTS chat_table (
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                sender_email VARCHAR(50) NOT NULL,
                receiver_email VARCHAR(50) NOT NULL,
                message TEXT NOT NULL,
                timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                status ENUM('sent', 'delivered', 'read') DEFAULT 'sent',
                FOREIGN KEY (sender_email) REFERENCES user_table(email) ON DELETE CASCADE ON UPDATE CASCADE,
                FOREIGN KEY (receiver_email) REFERENCES user_table(email) ON DELETE CASCADE ON UPDATE CASCADE
            )");

        } catch (Exception $e) {
            $_SESSION['flash_mode'] = "alert-danger";
            $_SESSION['flash'] = "Failed to create or update the database.";
            die();
        }

        $conn->close(); // close DB connection
    } else {
        header('Location: maintenance.php');
        die();
    }
?>
