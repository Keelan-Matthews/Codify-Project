<?php
$pageTitle = "Dashboard";
$stylesheet = "dashboard.css";
require 'templates/header.php';
?>
<main>
    <div class="row">
        <div class="col-12 col-md-10">
            <div class="container mt-5">
                <h5 class="border-bottom border-4 text-white pb-3 border-color">Home feed</h5>
                <div class="events d-flex flex-wrap justify-content-between">
                </div>
            </div>
        </div>
        <div class="col-12 col-md-2 lighter-gray shadow d-flex flex-column align-items-center mobile-nav p-0 vh-md-100">
            <div class="w-100 text-end pe-4 py-4 mobile-hide">
                <a href="logout.php" class="nav-link text-white">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
            <nav class="d-flex flex-md-column w-100">
                <a href="index.php" class="text-center mobile-hide">
                    <img src="media/svg/logo.svg" alt="" class="w-50">
                </a>
                <div class="w-100">
                    <ul class="list-unstyled d-flex flex-md-column justify-content-around navigation ms-md-4 ps-md-5">
                        <li class="fs-4 fw-light my-4">
                            <a href="index.php" class="d-flex text-white">
                                <i class="fas fa-home pe-2"></i>
                                <span class="mobile-hide">Home</span>
                            </a>
                        </li>
                        <li class="fs-4 fw-light my-4">
                            <a href="dashboard.php" class="d-flex text-white">
                                <i class="fas fa-globe pe-2"></i>
                                <span class="mobile-hide">Explore</span>
                            </a>
                        </li>
                        <div class="mobile-show">
                            <li class="fs-4 fw-light my-4 rounded-circle bg-primary d-flex justify-content-center align-items-center px-2">
                                <a href="dashboard.php" class="text-white">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </li>
                        </div>
                        <li class="fs-4 fw-light my-4">
                            <a href="profile.php" class="d-flex text-white">
                                <i class="fas fa-comment-dots pe-2"></i>
                                <span class="mobile-hide">Messages</span>
                            </a>
                        </li>
                        <li class="fs-4 fw-light my-4">
                            <a href="settings.php" class="d-flex text-white">
                                <i class="fas fa-user pe-2"></i>
                                <span class="mobile-hide">Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="btn btn-primary btn-lg mt-3 w-75 mobile-hide">Create Event</div>
        </div>
    </div>
</main>
<?php
$scriptsheet = "dashboard.js";
require 'templates/footer.php';
?>