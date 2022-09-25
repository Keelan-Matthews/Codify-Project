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
    <div class="modal fade" id="createEvent" tabindex="-1" aria-labelledby="createEventLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down modal-dialog-scrollable">
            <div class="modal-content lighter-gray">
                <div class="modal-header text-white border-0">
                    <h5 class="modal-title" id="createEventLabel">Create Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="event-form" enctype="multipart/form-data">
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
                                <input type="date" class="form-control py-3 <?php echo ($dateError === "") ? '' : 'is-invalid' ?>" placeholder="DD/MM/YYYY" name="date" id="eventDate">
                                <small><?php echo $dateError ?></small>
                            </div>
                        </div>

                        <div class="form-floating mb-5">
                            <select class="form-select mb-4 <?php echo ($categoryError === "") ? '' : 'is-invalid' ?>" id="eventCategory" name="category">
                                <option>Select Category</option>
                                <option value="Hackathon">Hackathon</option>
                                <option value="Game Jam">Game Jam</option>
                                <option value="Speedrun">Speedrun</option>
                                <option value="Other">Other</option>
                            </select>
                            <label for="eventCategory">Event Category</label>
                            <small><?php echo $categoryError ?></small>
                        </div>

                        <div class="form-floating form-group mb-5">
                            <textarea class="form-control <?php echo ($descriptionError === "") ? '' : 'is-invalid' ?>" id="eventDescription" rows="5" style="height:100%;" placeholder="text" name="description"></textarea>
                            <label for="eventDescription">Event Description</label>
                            <small><?php echo $descriptionError ?></small>
                        </div>
                        <div class="form-group mb-5">
                            <label for="eventImage">Event Image</label>
                            <input type="file" class="form-control <?php echo ($imageError === "") ? '' : 'is-invalid' ?>" id="eventImage" name="image">
                            <small><?php echo $imageError ?></small>
                        </div>
                        <div class="form-group">
                            <div class="d-flex flex-wrap justify-content-start">
                                <div class="form-check form-check-inline me-2 mb-2">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Competitive">
                                    <div class="tags">
                                        <label class="form-check-label" for="inlineCheckbox1">Competitive</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline me-2 mb-2">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Casual">
                                    <div class="tags">
                                        <label class="form-check-label" for="inlineCheckbox2">Casual</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline me-2 mb-2">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Teamwork">
                                    <div class="tags">
                                        <label class="form-check-label" for="inlineCheckbox3">Teamwork</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline me-2 mb-2">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="Solo">
                                    <div class="tags">
                                        <label class="form-check-label" for="inlineCheckbox4">Solo</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline me-2 mb-2">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="Online">
                                    <div class="tags">
                                        <label class="form-check-label" for="inlineCheckbox5">Online</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline me-2 mb-2">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="Speedrun">
                                    <div class="tags">
                                        <label class="form-check-label" for="inlineCheckbox6">Speedrun</label>
                                    </div>
                                </div>
                                <div class="form-check form-check- me-2 mb-2">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="Educational">
                                    <div class="tags">
                                        <label class="form-check-label" for="inlineCheckbox7">Educational</label>
                                    </div>
                                </div>
                            </div>
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
                                        <div class="btn btn-primary me-2" id="view-profile">
                                            View
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
        <div class="col-12 col-md-2 lighter-gray shadow d-flex flex-column align-items-center mobile-nav p-0 vh-md-100">
            <div class="w-100 text-end pe-4 py-4 mobile-hide">
                <a href="backend/logout.php" class="nav-link text-white">
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
                            <a href="dashboard.php" class="d-flex align-items-center text-white">
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
                            <a href="messages.php" class="d-flex align-items-center text-white">
                                <i class="fas fa-comment-dots pe-2"></i>
                                <span class="navtext-hide">Messages</span>
                            </a>
                        </li>
                        <li class="fs-4 fw-light my-4">
                            <a href="profile.php" class="d-flex align-items-center text-white">
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
?>