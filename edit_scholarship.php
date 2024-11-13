<?php
include 'db_controller.php';
$conn->select_db("Alumni");

session_start();
include 'logged_admin.php';

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    unset($errors);
    foreach ($_POST as $key => $value) {
        $_POST[$key] = trim($_POST[$key]);
        $value = trim($value);

        // Input validation
        if ($key == 'title' && $value == '')
            $errors[$key] = '*Title is required.';
        elseif ($key == 'title' && strlen($value) >= 100)
            $errors[$key] = '*Title must be less than 100 characters.';
        elseif ($key == 'title')
            $verified[$key] = true;

        if ($key == 'amount' && $value == '')
            $errors[$key] = '*Amount is required.';
        elseif ($key == 'amount' && !is_numeric($value))
            $errors[$key] = '*Amount must be a number.';
        elseif ($key == 'amount')
            $verified[$key] = true;

        if ($key == 'description' && $value == '')
            $errors[$key] = '*Description is required.';
        elseif ($key == 'description' && strlen($value) >= 700)
            $errors[$key] = '*Description must be less than 700 characters.';
        elseif ($key == 'description')
            $verified[$key] = true;
    }

    if (empty($errors)) {
        try {
            // Update scholarship in DB
            $SQLUpdateScholarship = $conn->prepare("UPDATE scholarship_table SET title = ?, amount = ?, description = ? WHERE id = ?");
            $SQLUpdateScholarship->bind_param("sssi", $_POST['title'], $_POST['amount'], $_POST['description'], $_POST['id']);
            if ($SQLUpdateScholarship->execute() == true) {
                $_SESSION['flash_mode'] = "alert-success";
                $_SESSION['flash'] = "Scholarship updated successfully.";
                header('Location: manage_scholarships.php');
            } else {
                $_SESSION['flash_mode'] = "alert-warning";
                $_SESSION['flash'] = "An error occurred updating the scholarship.";
            }
        } catch (Exception $e) {
            $_SESSION['flash_mode'] = "alert-warning";
            $_SESSION['flash'] = "An error occurred updating the scholarship.";
            header('Location: manage_scholarships.php');
        }
    } else {
        // Keep current data in session
        $_SESSION['form_data'] = $_POST;
        $_SESSION['errors'] = $errors;
        $_SESSION['verified'] = $verified;
    }
}

// Fetch scholarship data
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM scholarship_table WHERE id = $id");

    if ($result === FALSE) {
        die("Error fetching scholarship: " . $conn->error);
    }

    if ($result->num_rows == 1) {
        $scholarship = $result->fetch_assoc();
    } else {
        die("Scholarship not found.");
    }
} else {
    die("No scholarship ID specified.");
}

// Assign session data or initialize new array
$formData = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : $scholarship;
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : array();
$verified = isset($_SESSION['verified']) ? $_SESSION['verified'] : array();

// Clear session data
unset($_SESSION['form_data']);
unset($_SESSION['errors']);
unset($_SESSION['verified']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Scholarship</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="admin-bg">
    <?php include 'navbar.php'; ?>

    <div class="container my-3">
        <div class="row">
            <div class="col">
                <h1>Edit Scholarship</h1>
            </div>
        </div>

        <form class="needs-validation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($formData['id']); ?>">

            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" class="form-control <?php echo (isset($errors['title'])) ? 'is-invalid' : ((isset($verified['title'])) ? 'is-valid' : ''); ?>" id="title" name="title" placeholder="Title*" value="<?php echo htmlspecialchars($formData["title"]); ?>">
                        <?php echo (isset($errors['title'])) ? '<div class="invalid-feedback">'.$errors['title'].'</div>' : NULL; ?>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control <?php echo (isset($errors['amount'])) ? 'is-invalid' : ((isset($verified['amount'])) ? 'is-valid' : ''); ?>" id="amount" name="amount" placeholder="Amount*" value="<?php echo htmlspecialchars($formData["amount"]); ?>">
                        <?php echo (isset($errors['amount'])) ? '<div class="invalid-feedback">'.$errors['amount'].'</div>' : NULL; ?>
                    </div>

                    <div class="mb-3">
                        <textarea rows="4" class="form-control <?php echo (isset($errors['description'])) ? 'is-invalid' : ((isset($verified['description'])) ? 'is-valid' : ''); ?>" id="description" name="description" placeholder="Description"><?php echo htmlspecialchars($formData["description"]); ?></textarea>
                        <?php echo (isset($errors['description'])) ? '<div class="invalid-feedback">'.$errors['description'].'</div>' : NULL; ?>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="manage_scholarships.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
