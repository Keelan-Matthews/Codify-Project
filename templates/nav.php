<div class="col-12 col-md-2 lighter-gray shadow d-flex flex-column align-items-center mobile-nav p-0 vh-md-100">`
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
            <ul class="list-unstyled d-flex flex-md-column justify-content-around navigation align-items-center navigation-list">
                <li class="fs-4 fw-light my-md-4 home-link">
                    <a href="dashboard.php" class="d-flex align-items-center text-white btn btn-lg fs-4">
                        <i class="fas fa-home pe-2"></i>
                        <span class="navtext-hide">Home</span>
                    </a>
                </li>
                <li class="fs-4 fw-light my-md-4 explore-link">
                    <a href="explore.php" class="d-flex align-items-center text-white btn btn-lg fs-4">
                        <i class="fas fa-globe pe-2"></i>
                        <span class="navtext-hide">Explore</span>
                    </a>
                </li>
                <div class="mobile-show" data-bs-toggle="modal" data-bs-target="#createEvent">
                    <li class="fs-4 fw-light my-md-4 rounded-circle bg-primary d-flex justify-content-center align-items-center px-2">
                        <div class="text-white">
                            <i class="fas fa-plus"></i>
                        </div>
                    </li>
                </div>
                <li class="fs-4 fw-light my-md-4 inbox-link">
                    <a href="messages.php" class="d-flex align-items-center text-white btn btn-lg fs-4 position-relative">
                        <i class="fas fa-inbox pe-2"></i>
                        <span class="navtext-hide">Inbox</span>
                        <small class="ms-2 text-primary unread"></small>
                    </a>
                </li>
                <li class="fs-4 fw-light my-md-4 profile-link">
                    <a href="profile.php?user_id=<?php echo $_SESSION['user_id'] ?>" class="d-flex align-items-center text-white btn btn-lg fs-4">
                        <i class="fas fa-user pe-2"></i>
                        <span class="navtext-hide">Profile</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="btn btn-primary btn-lg mt-3 w-75 mobile-hide" data-bs-toggle="modal" data-bs-target="#createEvent" id="create-event-button">Create Event</div>
</div>

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

                    <div id="eventDropContainer" class="position-relative">
                        <img src="media/events/upload.jpg" alt="" class="currentEventPhoto w-100 rounded-3 crop-image" height="200">
                        <div class="hover-prompt-event w-100 h-100 d-flex justify-content-center align-items-center position-absolute text-white">
                            <i class="fas fa-cloud-arrow-up fa-2x"></i>
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <input type="file" class="form-control" id="eventImage" name="image">
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
                        </select>
                        <label for="eventCategory">Event Category</label>
                        <small><?php echo $categoryError ?></small>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-5" id="admin_add">
                        <div class="form-floating form-group pe-3 w-100">
                            <input type="text" class="form-control" id="addCategory" placeholder="category" name="addCategory">
                            <label for="addCategory">Add Category</label>
                            <small id="addCategoryError">test</small>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary w-100" id="add-category-button">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-floating form-group mb-5">
                        <textarea class="form-control <?php echo ($descriptionError === "") ? '' : 'is-invalid' ?>" id="eventDescription" rows="5" style="height:100%;" placeholder="text" name="description"></textarea>
                        <label for="eventDescription">Event Description</label>
                        <small><?php echo $descriptionError ?></small>
                    </div>

                    <div class="form-group">
                        <div class="d-flex flex-wrap justify-content-start">
                            <div class="form-check form-check-inline me-2 mb-2">
                                <input class="form-check-input" type="checkbox" id="tag1" value="Competitive">
                                <div class="tags">
                                    <label class="form-check-label" for="tag1">Competitive</label>
                                </div>
                            </div>
                            <div class="form-check form-check-inline me-2 mb-2">
                                <input class="form-check-input" type="checkbox" id="tag2" value="Casual">
                                <div class="tags">
                                    <label class="form-check-label" for="tag2">Casual</label>
                                </div>
                            </div>
                            <div class="form-check form-check-inline me-2 mb-2">
                                <input class="form-check-input" type="checkbox" id="tag3" value="Teamwork">
                                <div class="tags">
                                    <label class="form-check-label" for="tag3">Teamwork</label>
                                </div>
                            </div>
                            <div class="form-check form-check-inline me-2 mb-2">
                                <input class="form-check-input" type="checkbox" id="tag4" value="Solo">
                                <div class="tags">
                                    <label class="form-check-label" for="tag4">Solo</label>
                                </div>
                            </div>
                            <div class="form-check form-check-inline me-2 mb-2">
                                <input class="form-check-input" type="checkbox" id="tag5" value="Online">
                                <div class="tags">
                                    <label class="form-check-label" for="tag5">Online</label>
                                </div>
                            </div>
                            <div class="form-check form-check-inline me-2 mb-2">
                                <input class="form-check-input" type="checkbox" id="tag6" value="Speedrun">
                                <div class="tags">
                                    <label class="form-check-label" for="tag6">Speedrun</label>
                                </div>
                            </div>
                            <div class="form-check form-check- me-2 mb-2">
                                <input class="form-check-input" type="checkbox" id="tag7" value="Educational">
                                <div class="tags">
                                    <label class="form-check-label" for="tag7">Educational</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-outline text-white" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="event-form" name="submit" class="btn btn-primary" id="createEventButton">Create</button>
            </div>
        </div>
    </div>
</div>