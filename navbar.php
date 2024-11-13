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
                </ul>
            </div>
            <?php include 'nav_user.php' ?>
        </div>
    </nav>