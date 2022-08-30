<?php
// if($_SESSION["signed_in"] == false){
//     header("Location: ./index.php");
// }

$pageTitle = "Dashboard";
$stylesheet = "dashboard.css";
require 'templates/header.php';

$nameError = "";
$locationError = "";
$dateError = "";
$categoryError = "";
$descriptionError = "";
$imageError = "";

if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyname")  $nameError = "Name cannot be blank";
    if ($_GET["error"] == "emptylocation")  $locationError = "Location cannot be blank";
    if ($_GET["error"] == "emptydate")  $dateError = "Please select a date";
    if ($_GET["error"] == "emptycategory")  $categoryError = "Please select a category";
    if ($_GET["error"] == "emptydescription")  $descriptionError = "Description cannot be blank";
    if ($_GET["error"] == "emptyimage")  $imageError = "Please upload an image";
}
?>
<main class="overflow-hidden">
    <div class="modal fade" id="createEvent" tabindex="-1" aria-labelledby="createEventLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content lighter-gray">
                <div class="modal-header text-white border-0">
                    <h5 class="modal-title" id="createEventLabel">Create Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="backend/validate-event.php" method="post" id="event-form">
                        <div class="form-floating form-group mb-5">
                            <input type="text" class="form-control <?php echo ($nameError === "") ? '' : 'is-invalid' ?>" id="eventName" placeholder="name@example.com" name="name">
                            <label for="eventName">Event Name</label>
                            <small><?php echo $nameError ?></small>
                        </div>
                        <div class="d-flex mb-5">
                            <div class="form-floating form-group w-50 pe-3">
                                <input type="text" class="form-control <?php echo ($locationError === "") ? '' : 'is-invalid' ?>" id="eventLocation" placeholder="location" name="location">
                                <label for="eventLocation">Event Location</label>
                                <small><?php echo $locationError ?></small>
                            </div>
                            <div class="form-group w-50">
                                <input type="date" class="form-control py-3 <?php echo ($dateError === "") ? '' : 'is-invalid' ?>" placeholder="DD/MM/YYYY" name="date">
                                <small><?php echo $dateError ?></small>
                            </div>
                        </div>

                        <div class="form-floating mb-5">
                            <select class="form-select mb-4 <?php echo ($categoryError === "") ? '' : 'is-invalid' ?>" id="eventCategory" name="category">
                                <option>Select Category</option>
                                <option>Category 1</option>
                                <option>Category 2</option>
                                <option>Category 3</option>
                            </select>
                            <label for="eventCategory">Event Category</label>
                            <small><?php echo $categoryError ?></small>
                        </div>

                        <div class="form-floating form-group mb-5">
                            <textarea class="form-control <?php echo ($descriptionError === "") ? '' : 'is-invalid' ?>" id="eventDescription" rows="3" placeholder="text" name="description"></textarea>
                            <label for="eventDescription">Event Description</label>
                            <small><?php echo $descriptionError ?></small>
                        </div>
                        <div class="form-group form-group">
                            <label for="eventImage">Event Image</label>
                            <input type="file" class="form-control <?php echo ($imageError === "") ? '' : 'is-invalid' ?>" id="eventImage" name="image">
                            <small><?php echo $imageError ?></small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline text-white" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="event-form" name="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-10">
            <div class="container mt-5">
                <h5 class="border-bottom border-4 text-white pb-3 border-color">Home feed</h5>
                <div class="events row justify-content-between">
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
                        <li class="fs-4 fw-light my-4 home-link active">
                            <a href="index.php" class="d-flex align-items-center text-white">
                                <i class="fas fa-home pe-2"></i>
                                <span class="navtext-hide">Home</span>
                            </a>
                        </li>
                        <li class="fs-4 fw-light my-4 explore-link">
                            <a href="dashboard.php" class="d-flex align-items-center text-white">
                                <i class="fas fa-globe pe-2"></i>
                                <span class="navtext-hide">Explore</span>
                            </a>
                        </li>
                        <div class="mobile-show" data-bs-toggle="modal" data-bs-target="#createEvent">
                            <li class="fs-4 fw-light my-4 rounded-circle bg-primary d-flex justify-content-center align-items-center px-2">
                                <div class="text-white">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </li>
                        </div>
                        <li class="fs-4 fw-light my-4">
                            <a href="profile.php" class="d-flex align-items-center text-white">
                                <i class="fas fa-comment-dots pe-2"></i>
                                <span class="navtext-hide">Messages</span>
                            </a>
                        </li>
                        <li class="fs-4 fw-light my-4">
                            <a href="settings.php" class="d-flex align-items-center text-white">
                                <i class="fas fa-user pe-2"></i>
                                <span class="navtext-hide">Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="btn btn-primary btn-lg mt-3 w-75 mobile-hide" data-bs-toggle="modal" data-bs-target="#createEvent">Create Event</div>
        </div>
    </div>
</main>
<?php
$scriptsheet = "dashboard.js";
require 'templates/footer.php';
if (isset($_GET["error"])) {
    echo '
    <script>
        $(document).ready(() => {
            $("#createEvent").modal("show");
        });
    </script>';
}
?>