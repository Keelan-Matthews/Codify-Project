<?php
$pageTitle = "Dashboard";
$stylesheet = "dashboard.css";
require 'templates/header.php';

// if ($_SESSION["signed_in"] == false) {
//     header("Location: ./index.php");
// }

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

    <div class="row">
        <div class="col-12 col-md-10">
            <div class="container mt-5 pb-5 pb-md-0">
                <div class="" id="events-container">
                    <h4 class="border-bottom border-4 text-white pb-3 border-color fw-bold">Home feed</h4>
                    <div class="events row">
                    </div>
                </div>
                <div class="d-none" id="event-details-container">
                    <h4 class="border-bottom border-4 text-white pb-3 mb-4 border-color"><span class="fw-bold">Home feed</span> / <span class="text-muted event-title"></span></h4>
                    <div class="event-details">
                        <button class="d-flex text-white align-items-center mb-4 fw-bold btn" id="go-back-event-details">
                            <i class="fas fa-arrow-left pe-2"></i>
                            <p class="mb-0">Go Back</p>
                        </button>
                        <div class="row lighter-gray rounded p-4">
                            <div class="col-12 col-md-7">
                                <img class="event-image" src="" alt="">
                                <div class="d-flex align-items-start justify-content-between mt-4">
                                    <div>
                                        <h3 class="text-white event-title"></h3>
                                        <div class="d-flex align-items-center">
                                            <h5 class="text-primary">
                                                <i class="fas fa-tag pe-2"></i>
                                                <span class="event-category"></span>
                                            </h5>
                                            <h5 class="text-primary mx-4">
                                                <i class="fas fa-location-pin pe-2"></i>
                                                <span class="event-location"></span>
                                            </h5>
                                            <h5 class="text-primary">
                                                <i class="fas fa-calendar pe-2"></i>
                                                <span class="event-date"></span>
                                            </h5>
                                        </div>
                                        <div class="text-white d-flex mt-2 event-tags">

                                        </div>
                                    </div>
                                    <div class="btn btn-primary btn-lg">
                                        Attend
                                    </div>
                                </div>

                                <p class="text-white mt-5 event-description"></p>
                            </div>
                            <div class="col-12 col-md-5 ps-4">
                                <div class="d-flex align-items-center lighter-gray-2 p-3 rounded row">
                                    <div class="col-2">
                                        <img src="" alt="" class="rounded-circle w-100" id="event-user-photo">
                                    </div>
                                    <div class="col-5">
                                        <p class="text-white fw-bold mb-0" id="event-user"></p>
                                        <small class="text-primary">Organizer</small>
                                    </div>
                                    <div class="col-5 d-flex align-items-start justify-content-end">
                                        <div class="btn btn-primary me-2">
                                            <a href="" id="view-profile"><span class="text-white">View</span></a>   
                                        </div>
                                        <div class="btn btn-primary">
                                            <i class="fas fa-comment-dots"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5 pt-5">
                                    <h4 class="text-white">Reviews</h4>
                                    <div class="reviews">
                                        <div class="d-flex align-items-center lighter-gray-2 p-3 rounded row mt-4">
                                            <div class="col-2">
                                                <img src="./media/profile_photos/default.png" alt="" class="rounded-circle w-100">
                                            </div>
                                            <div class="col-10">
                                                <p class="text-white fw-bold mb-0">Keelan Matthews</p>
                                                <p class="rating">
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                </p>
                                            </div>
                                            <p class="text-white mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                                        </div>
                                        <div class="d-flex align-items-center lighter-gray-2 p-3 rounded row mt-4">
                                            <div class="col-2">
                                                <img src="./media/profile_photos/default.png" alt="" class="rounded-circle w-100">
                                            </div>
                                            <div class="col-10">
                                                <p class="text-white fw-bold mb-0">Keelan Matthews</p>
                                                <p class="rating">
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                </p>
                                            </div>
                                            <p class="text-white mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                                        </div>
                                        <div class="d-flex align-items-center lighter-gray-2 p-3 rounded row mt-4">
                                            <div class="col-2">
                                                <img src="./media/profile_photos/default.png" alt="" class="rounded-circle w-100">
                                            </div>
                                            <div class="col-10">
                                                <p class="text-white fw-bold mb-0">Keelan Matthews</p>
                                                <p class="rating">
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                </p>
                                            </div>
                                            <p class="text-white mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                                        </div>
                                        <div class="d-flex align-items-center lighter-gray-2 p-3 rounded row mt-4">
                                            <div class="col-2">
                                                <img src="./media/profile_photos/default.png" alt="" class="rounded-circle w-100">
                                            </div>
                                            <div class="col-10">
                                                <p class="text-white fw-bold mb-0">Keelan Matthews</p>
                                                <p class="rating">
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                </p>
                                            </div>
                                            <p class="text-white mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                                        </div>
                                        <div class="d-flex align-items-center lighter-gray-2 p-3 rounded row mt-4">
                                            <div class="col-2">
                                                <img src="./media/profile_photos/default.png" alt="" class="rounded-circle w-100">
                                            </div>
                                            <div class="col-10">
                                                <p class="text-white fw-bold mb-0">Keelan Matthews</p>
                                                <p class="rating">
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                </p>
                                            </div>
                                            <p class="text-white mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php require 'templates/nav.php' ?>
    </div>
</main>
<?php
$scriptsheet = "dashboard.js";
require 'templates/footer.php';
?>