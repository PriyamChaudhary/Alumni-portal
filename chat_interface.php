<?php
session_start();
include 'db_controller.php';
$conn->select_db("Alumni");

if (!isset($_SESSION['logged_account']) || $_SESSION['logged_account']['type'] !== 'user') {
    header('Location: login.php');
    exit();
}

$userEmail = $_SESSION['logged_account']['email'];
$receiverEmail = isset($_GET['receiver_email']) ? $_GET['receiver_email'] : '';

// Fetch the receiver's name
$receiverName = '';
if ($receiverEmail) {
    $result = $conn->query("SELECT first_name, last_name FROM user_table WHERE email = '$receiverEmail'");
    if ($result && $row = $result->fetch_assoc()) {
        $receiverName = $row['first_name'] . ' ' . $row['last_name'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Interface</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg mb-5">
        <!-- Navbar content -->
    </nav>

    <div class="container mt-5">
        <h1>Chat with Alumni</h1>

        <form id="messageForm">
            <label for="receiver_email">Recipient's Email:</label>
            <input type="email" id="receiver_email" name="receiver_email" required class="form-control" value="<?php echo htmlspecialchars($receiverEmail); ?>" readonly>

            <label for="receiver_name" class="mt-2">Recipient's Name:</label>
            <input type="text" id="receiver_name" name="receiver_name" class="form-control" value="<?php echo htmlspecialchars($receiverName); ?>" readonly>

            <label for="message" class="mt-2">Message:</label>
            <textarea id="message" name="message" required class="form-control"></textarea>

            <button type="submit" class="btn btn-primary mt-3">Send Message</button>
        </form>

        <h2 class="mt-5">Messages</h2>
        <div id="messages" class="mt-4"></div>
    </div>

    <script>
        $(document).ready(function() {
            function loadMessages() {
                const receiverEmail = $("#receiver_email").val();

                $.get("get_messages.php", { sender_email: '<?php echo $userEmail; ?>', receiver_email: receiverEmail }, function(data) {
                    $("#messages").empty();
                    if (Array.isArray(data)) {
                        data.forEach(function(message) {
                            $("#messages").append(`<p><strong>${message.sender_email}:</strong> ${message.message} <em>(${message.sent_at})</em></p>`);
                        });
                    }
                }, "json");
            }

            setInterval(loadMessages, 2000);

            $("#messageForm").submit(function(event) {
                event.preventDefault();

                $.post("send_message.php", $(this).serialize() + '&sender_email=<?php echo $userEmail; ?>', function(data) {
                    alert(data);
                    loadMessages();
                });
            });
        });
    </script>
</body>
</html>
