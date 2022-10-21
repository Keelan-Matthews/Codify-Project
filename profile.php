<?php
$pageTitle = "Profile";
$stylesheet = "profile.css";
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
    <div class="modal fade" id="createList" tabindex="-1" aria-labelledby="createListLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down modal-dialog-scrollable">
            <div class="modal-content lighter-gray">
                <div class="modal-header text-white border-0">
                    <h5 class="modal-title" id="createListLabel">
                        <i class="fas fa-border-all me-2 text-primary"></i>
                        Create List
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="list-form" enctype="multipart/form-data">
                        <div class="form-floating form-group">
                            <input type="text" class="form-control" id="listName" placeholder="Name" name="name">
                            <label for="listName">List Name</label>
                        </div>
                        <div class="form-floating form-group">
                            <textarea class="form-control mt-4" placeholder="Description" id="listDescription" name="description" rows="5" style="height:100%;"></textarea>
                            <label for="listDescription">Description</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline text-white" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="list-form" name="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down modal-dialog-scrollable">
            <div class="modal-content lighter-gray">
                <div class="modal-header text-white border-0">
                    <h5 class="modal-title" id="editProfileLabel">
                        <i class="fas fa-user me-2 text-primary"></i>
                        Edit Profile
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="profile-form" enctype="multipart/form-data">
                        <div class="form-group mb-5">
                            <label for="profilePhoto">Profile Image</label>
                            <input type="file" class="form-control" id="profilePhoto" name="image">
                        </div>
                        <div class="form-floating form-group">
                            <input type="text" class="form-control mt-4" placeholder="Username" id="profileUsername" name="username""></input>
                            <label for=" profileUsername">Username</label>
                        </div>
                        <div class="form-floating form-group">
                            <input type="text" class="form-control mt-4" placeholder="Email" id="profileEmail" name="email""></input>
                            <label for=" profileEmail">New Email Address</label>
                        </div>
                        <div class="form-floating form-group">
                            <input type="password" class="form-control mt-4" placeholder="Password" id="profilePassword" name="password""></input>
                            <label for=" profilePassword">New Password</label>
                        </div>
                    </form>
                </div>
                <div class="border-0 p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProfileModal">Delete Profile</button>
                        <div>
                            <button type="button" class="btn btn-outline text-white" data-bs-dismiss="modal">Close</button>
                            <button type="submit" form="profile-form" name="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="showFollowers" tabindex="-1" aria-labelledby="showFollowersLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down modal-dialog-scrollable">
            <div class="modal-content lighter-gray">
                <div class="modal-header text-white border-0">
                    <h5 class="modal-title fs-3" id="showFollowers">Followers</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4" id="followers-body">
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12 col-md-10">
            <div class="container mt-5 pb-5 pb-md-0 p-0">
                <div id="profile-container">
                    <div class="profile">
                        <div class="row lighter-gray rounded">
                            <div class="row p-4">
                                <div class="col-2">
                                    <img src="" alt="" class="rounded-circle w-100" id="user-profile-photo">
                                </div>
                                <div class="col-6 d-flex flex-column justify-content-center mb-4">
                                    <div class="d-flex align-items-center" id="username-verified">
                                        <h2 class="text-white fw-bold mb-0 me-2" id="username"></h2>
                                    </div>

                                    <h4 class="text-primary mt-2 mb-0 followers-label"><span id="user-followers"></span> Followers</h4>
                                </div>
                                <div class="col-4 d-flex align-items-center justify-content-end" id="profile-actions">
                                    <div class="btn btn-primary btn-lg me-2 w-50" id="follow-button">
                                        <i class="fas fa-user-plus me-2" id="follow-icon"></i>
                                        <span class="d-none d-lg-inline">Follow</span>
                                    </div>
                                    <div class="btn btn-outline text-white border-white btn-lg w-50" id="message-button">
                                        <i class="fas fa-comment-dots me-2"></i>
                                        <span class="d-none d-lg-inline">Message</span>
                                    </div>
                                </div>
                                <div class="col-4 d-flex align-items-center justify-content-end" id="edit-actions">
                                    <div class="btn btn-primary btn-lg me-2 w-50" id="edit-profile">
                                        <i class="fas fa-pen me-2"></i>
                                        <span class="d-none d-lg-inline">Edit profile</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row text-white fw-bold pe-0 mt-3">
                                <div class="col-6 d-flex justify-content-center align-items-center rounded p-3 active btn btn-outline border-0 lighter-gray-2" id="events-toggle">
                                    <h4 class="mb-0">
                                        <i class="fas fa-calendar me-2"></i>
                                        Events
                                    </h4>
                                </div>
                                <div class="col-6 d-flex justify-content-center align-items-center rounded p-3 list-offset text-white btn btn-outline border-0" id="lists-toggle">
                                    <h4 class="mb-0">
                                        <i class="fas fa-border-all me-2"></i>
                                        Lists
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row events mt-5 pt-4" id="events-container">
                    </div>
                    <div class="row lists mt-5 pt-4 d-none" id="lists-container">
                    </div>
                </div>
                <div class="d-none" id="event-details-container">
                    <h4 class="border-bottom border-4 text-white pb-3 mb-4 border-color"><span class="fw-bold" id="username_event"></span> / <span class="text-muted event-title"></span></h4>
                    <?php require 'templates/event-details.php'; ?>
                </div>
                <div class="d-none" id="list-details-container">
                    <h4 class="border-bottom border-4 text-white pb-3 mb-4 border-color"><span class="fw-bold" id="username_list"></span> / <span class="text-muted list-title"></span></h4>
                    <?php require 'templates/list-details.php'; ?>
                </div>
            </div>

        </div>
        <?php require 'templates/nav.php' ?>
    </div>

    <!-- delete profile modal -->
    <div class="modal fade" id="deleteProfileModal" tabindex="-1" aria-labelledby="deleteProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content lighter-gray">
                <div class="modal-header text-white border-0">
                    <h5 class="modal-title" id="deleteProfileModalLabel">
                        <i class="fas fa-exclamation-triangle text-danger me-2"></i>
                        Delete Profile
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-white fs-5">
                    Are you sure you want to delete your profile? This process cannot be undone.
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline text-white" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="delete-profile">Delete</button>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
$scriptsheet = "profile.js";
require 'templates/footer.php';
?>