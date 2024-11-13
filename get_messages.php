<?php
session_start();
include 'db_controller.php';
$conn->select_db("Alumni");

if (!isset($_SESSION['logged_account']) || $_SESSION['logged_account']['type'] !== 'user') {
    die('Unauthorized access.');
}

$senderEmail = $_GET['sender_email'];
$receiverEmail = $_GET['receiver_email'];

$query = "SELECT * FROM messages WHERE (sender_email = '$senderEmail' AND receiver_email = '$receiverEmail') OR (sender_email = '$receiverEmail' AND receiver_email = '$senderEmail') ORDER BY sent_at ASC";
$result = $conn->query($query);

$messages = array();
while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

header('Content-Type: application/json');
echo json_encode($messages);
?>
