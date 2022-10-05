<?php
$pageTitle = "Dashboard";
$stylesheet = "dashboard.css";
require 'templates/header.php';

if ($_SESSION["signed_in"] == false) {
    header("Location: ./index.php");
}

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
                    <div class="d-flex justify-content-between align-items-center border-bottom border-4 border-color">
                        <h4 class="text-white fw-bold">Explore</h4>
                        <div class="input-group mb-3 w-25">
                            <div class="position-relative w-100 mb-3">
                                <input type="text" class="form-control search-input smaller-text" placeholder="Search for anything" aria-label="Search for events" aria-describedby="button-addon2">
                                <p class="search-text text-white p-2 smaller-text"></p>
                                <div class="text-white text-end p-2">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="events row">
                    </div>
                </div>
                <div class="d-none" id="event-details-container">
                    <h4 class="border-bottom border-4 text-white pb-3 mb-4 border-color"><span class="fw-bold">Explore</span> / <span class="text-muted event-title"></span></h4>
                    <?php require 'templates/event-details.php'; ?>
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