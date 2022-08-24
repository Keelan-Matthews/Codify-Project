<?php
$pageTitle = "Dashboard";
$stylesheet = "dashboard.css";
require 'templates/header.php';
?>
<main>
    <div class="row">
        <div class="col-12 col-md-10 order-2 order-md-1">
            <div class="container">

            </div>
        </div>
        <div class="col-12 col-md-2 order-1 order-md-2 lighter-gray shadow vh-100 d-flex flex-column align-items-center">
            <div class="w-100 text-end pe-4 py-4">
                <a href="logout.php" class="nav-link text-white">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
            <nav class="navbar navbar-expand-md d-flex flex-md-column">
                <a href="index.php" class="text-center">
                    <img src="media/svg/logo.svg" alt="" class="w-50">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle Navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav flex-column justify-content-center navigation">
                        <li class="nav-item fs-4 fw-light my-4">
                            <a href="index.php" class="nav-link text-white">
                                <i class="fas fa-home pe-2"></i>
                                Home
                            </a>
                        </li>
                        <li class="nav-item fs-4 fw-light my-4">
                            <a href="dashboard.php" class="nav-link text-white">
                                <i class="fas fa-globe pe-2"></i>
                                Explore
                            </a>
                        </li>
                        <li class="nav-item fs-4 fw-light my-4">
                            <a href="profile.php" class="nav-link text-white">
                                <i class="fas fa-comment-dots pe-2"></i>
                                Messages
                            </a>
                        </li>
                        <li class="nav-item fs-4 fw-light my-4">
                            <a href="settings.php" class="nav-link text-white">
                                <i class="fas fa-user pe-2"></i>
                                Profile
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="btn btn-primary btn-lg mt-3 w-75">Create Event</div>
        </div>
    </div>
</main>
<?php
$scriptsheet = "dashboard.js";
require 'templates/footer.php';
?>