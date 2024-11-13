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
            // Add scholarship into DB
            $SQLCreateScholarship = $conn->prepare("INSERT INTO scholarship_table (title, amount, description) VALUES (?, ?, ?)");
            $SQLCreateScholarship->bind_param("sss", $_POST['title'], $_POST['amount'], $_POST['description']);
            if ($SQLCreateScholarship->execute() == true) {
                $_SESSION['flash_mode'] = "alert-success";
                $_SESSION['flash'] = "Scholarship created successfully.";
                header('Location: manage_scholarships.php');
            } else {
                $_SESSION['flash_mode'] = "alert-warning";
                $_SESSION['flash'] = "An error occurred creating the scholarship.";
            }
        } catch (Exception $e) {
            $_SESSION['flash_mode'] = "alert-warning";
            $_SESSION['flash'] = "An error occurred creating the scholarship.";
            header('Location: manage_scholarships.php');
        }
    } else {
        // Keep current data in session
        $_SESSION['form_data'] = $_POST;
        $_SESSION['errors'] = $errors;
        $_SESSION['verified'] = $verified;
    }
}

// Assign session data or initialize new array
$formData = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : array();
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
    <title>Add Scholarship</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="admin-bg">
    <?php include 'navbar.php'; ?>

    <div class="container my-3">
        <div class="row">
            <div class="col">
                <h1>Add Scholarship</h1>
            </div>
        </div>

        <form class="needs-validation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" class="form-control <?php echo (isset($errors['title'])) ? 'is-invalid' : ((isset($verified['title'])) ? 'is-valid' : ''); ?>" id="title" name="title" placeholder="Title*" value="<?php echo isset($formData["title"]) ? htmlspecialchars($formData["title"]) : "";?>">
                        <?php echo (isset($errors['title'])) ? '<div class="invalid-feedback">'.$errors['title'].'</div>' : NULL; ?>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control <?php echo (isset($errors['amount'])) ? 'is-invalid' : ((isset($verified['amount'])) ? 'is-valid' : ''); ?>" id="amount" name="amount" placeholder="Amount*" value="<?php echo isset($formData["amount"]) ? htmlspecialchars($formData["amount"]) : "";?>">
                        <?php echo (isset($errors['amount'])) ? '<div class="invalid-feedback">'.$errors['amount'].'</div>' : NULL; ?>
                    </div>

                    <div class="mb-3">
                        <textarea rows="4" class="form-control <?php echo (isset($errors['description'])) ? 'is-invalid' : ((isset($verified['description'])) ? 'is-valid' : ''); ?>" id="description" name="description" placeholder="Description*"><?php echo isset($formData["description"]) ? htmlspecialchars($formData["description"]) : "";?></textarea>
                        <?php echo (isset($errors['description'])) ? '<div class="invalid-feedback">'.$errors['description'].'</div>' : NULL; ?>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="manage_scholarships.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
