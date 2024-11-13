<?php
include 'db_controller.php';
$conn->select_db("Alumni");

session_start();
include 'logged_admin.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    try {
        // Delete scholarship from DB
        $SQLDeleteScholarship = $conn->prepare("DELETE FROM scholarship_table WHERE id = ?");
        $SQLDeleteScholarship->bind_param("i", $id);
        if ($SQLDeleteScholarship->execute() == true) {
            $_SESSION['flash_mode'] = "alert-success";
            $_SESSION['flash'] = "Scholarship deleted successfully.";
        } else {
            $_SESSION['flash_mode'] = "alert-warning";
            $_SESSION['flash'] = "An error occurred deleting the scholarship.";
        }
    } catch (Exception $e) {
        $_SESSION['flash_mode'] = "alert-warning";
        $_SESSION['flash'] = "An error occurred deleting the scholarship.";
    }
} else {
    $_SESSION['flash_mode'] = "alert-danger";
    $_SESSION['flash'] = "No scholarship ID specified.";
}

header('Location: manage_scholarships.php');
?>
