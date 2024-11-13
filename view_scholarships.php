<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarships</title>

    <link rel="stylesheet" href="css/styles.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        .card {
            width: 100%;
            border: none;
            box-shadow: 0 2px 2px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
        }
    </style>
</head>
<body>
    <?php
        include 'db_controller.php';
        $conn->select_db("Alumni");

        session_start();

        include 'logged_user.php';
    ?>

    <!-- Top nav bar -->
    <nav class="navbar sticky-top navbar-expand-lg mb-5">
        <div class="container">
            <a class="navbar-brand mx-0 mb-0 h1" href="main_menu.php">Alumni Portal</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse me-5" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mx-1">
                        <a class="nav-link nav-main-active px-5" aria-current="page" href="main_menu.php"><i class="bi bi-house-door-fill nav-bi"></i></a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link px-5" href="view_alumni.php"><i class="bi bi-people nav-bi"></i></a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link px-5" href="view_events.php"><i class="bi bi-calendar-event nav-bi"></i></a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link px-5" href="view_advertisements.php"><i class="bi bi-megaphone nav-bi"></i></a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link px-5" href="donation.php"><i class="bi bi-coin nav-bi"></i></a>
                    </li>
                </ul>
            </div>
            <?php include 'nav_user.php' ?>
        </div>
    </nav>

    <!-- Success Modal -->
    <div class='modal animate__animated animate__fadeIn animate__faster' id='successModalCenter' tabindex='-1' aria-labelledby='successModalCenter' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h3 class='modal-title text-success fw-bold'>Success!</h3>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        <p>You've successfully applied for the scholarship <span class="fw-medium"><?php echo $_POST['scholarshipTitle']; ?></span>!</p>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Error Modal -->
    <div class='modal animate__animated animate__headShake animate__fast' id='errorModalCenter' tabindex='-1' aria-labelledby='errorModalCenterTitle' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h3 class='modal-title text-danger fw-bold'>Error!</h3>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        <p>You're already applied for the scholarship <span class="fw-medium"><?php echo $_POST['scholarshipTitle']; ?></span>!</p>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Error2 Modal -->
    <div class='modal animate__animated animate__headShake animate__fast' id='error2ModalCenter' tabindex='-1' aria-labelledby='error2ModalCenterTitle' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h3 class='modal-title text-danger fw-bold'>Error!</h3>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        <p>An error has occurred while applying for the scholarship <span class="fw-medium"><?php echo $_POST['scholarshipTitle']; ?></span>!</p>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Breadcrumb -->
    <div class="container my-3">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="breadcrumb-link text-secondary link-underline link-underline-opacity-0" href="main_menu.php">Home</a></li>
                <li class="breadcrumb-item breadcrumb-active" aria-current="page">Scholarships</li>
            </ol>
        </nav>
    </div>

    <?php
        // Modal is off by default
        $modalOn = false;
        
        // POST method
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // GET the POST (which is retrieved from GET previously)
            if (isset($_POST['filterType'])) 
                $_GET['filterType'] = $_POST['filterType'];
            if (isset($_POST['filterType'])) 
                $_GET['filterTime'] = $_POST['filterTime'];
            if (isset($_POST['filterType'])) 
                $_GET['search'] = $_POST['search'];
            
            // Scholarship application
            if (isset($_POST['scholarshipID'])) {
                $scholarshipID = $_POST['scholarshipID'];
                $scholarshipTitle = $_POST['scholarshipTitle'];
                $accountEmail = $_SESSION['logged_account']['email'];
                $result = $conn->query("SELECT * FROM scholarship_table WHERE scholarship_id = $scholarshipID AND applicant_email = '$accountEmail'");

                // If user is already applied to scholarship
                if ($result->num_rows > 0) {
                    echo "<script>
                        window.onload = function() {
                            var errorModalCenter = new bootstrap.Modal(document.getElementById('errorModalCenter'));
                            errorModalCenter.show();
                        }
                    </script>";
                    $modalOn = true;
                } else {
                    // User is not applied, insert the application
                    $query = "INSERT INTO scholarship_table (scholarship_id, applicant_email) VALUES ($scholarshipID, '$accountEmail')";
                    if ($conn->query($query) === TRUE) {
                        echo "<script>
                            window.onload = function() {
                                var successModalCenter = new bootstrap.Modal(document.getElementById('successModalCenter'));
                                successModalCenter.show();
                            }
                        </script>";
                        $modalOn = true;
                    } else {
                        echo "<script>
                            window.onload = function() {
                                var error2ModalCenter = new bootstrap.Modal(document.getElementById('error2ModalCenter'));
                                error2ModalCenter.show();
                            }
                        </script>";
                        $modalOn = true;
                    }
                }
            }
        }
    ?>

<div class="container mb-5">
<h1 class="<?php echo (isset($_POST['scholershipID']) || isset($_GET['filterType']) || isset($_GET['filterTime']) || isset($_GET['search'])) ? NULL : 'slide-left' ?>">ScholarShip</h1>

    <!-- Filter and Search Form -->
    <div class="container my-3">
        <form method="post" class="d-flex justify-content-between">
            <div class="me-2">
                <label for="filterType" class="form-label">Filter by Type:</label>
                <select id="filterType" name="filterType" class="form-select">
                    <option value="">All</option>
                    <option value="Merit">Merit</option>
                    <option value="Need-based">Need-based</option>
                    <option value="Specific">Specific</option>
                </select>
            </div>
            <div class="me-2">
                <label for="filterTime" class="form-label">Filter by Time:</label>
                <select id="filterTime" name="filterTime" class="form-select">
                    <option value="">All</option>
                    <option value="Upcoming">Upcoming</option>
                    <option value="Closed">Closed</option>
                </select>
            </div>
            <div class="me-2">
                <label for="search" class="form-label">Search:</label>
                <input id="search" name="search" type="text" class="form-control" placeholder="Search by title...">
            </div>
            <button type="submit" class="btn btn-primary align-self-end">Filter</button>
        </form>
    </div>
    </div>

    <!-- Scholarships Table -->
    <div class="container">
        <div class="card p-4 my-3">
            <h2>Manage Scholarships</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Deadline</th>
                        <th scope="col">Type</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $filterType = isset($_GET['filterType']) ? $_GET['filterType'] : '';
                        $filterTime = isset($_GET['filterTime']) ? $_GET['filterTime'] : '';
                        $search = isset($_GET['search']) ? $_GET['search'] : '';

                        // Build the SQL query
                        $query = "SELECT * FROM scholarship_table WHERE title LIKE '%$search%'";
                        if ($filterType) $query .= " AND type = '$filterType'";
                        if ($filterTime) $query .= " AND status = '$filterTime'";

                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <th scope='row'>" . $row['id'] . "</th>
                                    <td>" . $row['title'] . "</td>
                                    <td>" . $row['description'] . "</td>
                                    <td>" . $row['deadline'] . "</td>
                                    <td>" . $row['type'] . "</td>
                                    <td>
                                        <form method='post' class='d-inline'>
                                            <input type='hidden' name='scholarshipID' value='" . $row['id'] . "'>
                                            <input type='hidden' name='scholarshipTitle' value='" . $row['title'] . "'>
                                            <button type='submit' class='btn btn-primary'>Apply</button>
                                        </form>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No scholarships found</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-6DPUmK7tzi0BOxqLo2zRH7kh3M8coz0O8WizPp6Ubd8+Fz/7lXq6+Ul0x7da5dYI" crossorigin="anonymous"></script>
</body>
</html>
