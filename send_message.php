<?php
session_start();
include 'db_controller.php';
$conn->select_db("Alumni");

if (!isset($_SESSION['logged_account']) || $_SESSION['logged_account']['type'] !== 'user') {
    die('Unauthorized access.');
}

$senderEmail = $_POST['sender_email'];
$receiverEmail = $_POST['receiver_email'];
$message = $_POST['message'];
$sentAt = date('Y-m-d H:i:s');

if (empty($senderEmail) || empty($receiverEmail) || empty($message)) {
    die('All fields are required.');
}

$query = "INSERT INTO messages (sender_email, receiver_email, message, sent_at) VALUES ('$senderEmail', '$receiverEmail', '$message', '$sentAt')";
if ($conn->query($query)) {
    echo 'Message sent successfully.';
} else {
    echo 'Error sending message: ' . $conn->error;
}
?>
