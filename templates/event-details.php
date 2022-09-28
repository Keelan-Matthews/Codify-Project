<div class="event-details">
    <button class="d-flex text-white align-items-center mb-4 fw-bold btn" id="go-back-event-details">
        <i class="fas fa-arrow-left pe-2"></i>
        <p class="mb-0">Go Back</p>
    </button>
    <div class="row lighter-gray rounded p-4">
        <div class="col-12 col-md-7">
            <div id="event-image"></div>
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
                    <div class="text-white d-flex mt-2 event-tags"></div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="btn btn-primary btn-lg me-2" id="attend-event">Attend</div>
                    <div class="add-tip">
                        <span class="tooltiptext">add event to a list</span>

                        <div class="dropdown">
                            <button class="btn btn-outline btn-lg text-white " type="button" id="list-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-plus"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="list-dropdown" id="list-options">
                            </ul>
                        </div>
                    </div>
                    <div class="dropdown">
                            <button class="btn d-none" type="button" id="edit-event" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis text-white"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="edit-event" id="edit-options">
                                <li class="list-group-item mx-2 btn fw-bold" id="edit-details">
                                    <i class="fas fa-edit pe-2"></i>
                                    Edit Details
                                </li>
                                <li class="list-group-item mx-2 btn fw-bold" id="delete-event">
                                    <i class="fas fa-trash pe-2"></i>
                                    Delete Event
                                </li>
                            </ul>
                        </div>
                </div>
            </div>

            <p class="text-white mt-5 event-description"></p>

            <div class="d-flex justify-content-center mt-5">
                <div class="w-50">
                    <div id="carouselReview" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-inner">
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselReview" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselReview" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12 col-md-5 ps-4">
            <div class="d-flex align-items-center lighter-gray-2 p-3 rounded row mb-5" id="event-details-user">
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

            <div class="pt-3">
                <h4 class="text-white">Reviews</h4>
                <div class="reviews">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down modal-dialog-scrollable">
        <div class="modal-content lighter-gray">
            <div class="modal-header text-white border-0">
                <h5 class="modal-title" id="reviewLabel">Review the event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <label class="text-white mb-1">Rate</label>
                    <div class="rating">
                        <i class="fas fa-star star-rating shadow text-lighter-gray-2"></i>
                        <i class="fas fa-star star-rating shadow text-lighter-gray-2"></i>
                        <i class="fas fa-star star-rating shadow text-lighter-gray-2"></i>
                        <i class="fas fa-star star-rating shadow text-lighter-gray-2"></i>
                        <i class="fas fa-star star-rating shadow text-lighter-gray-2"></i>
                    </div>
                </div>
                <form action="" method="post" id="review-form" enctype="multipart/form-data">
                    <div class="form-floating form-group mb-5">
                        <textarea class="form-control mt-4" id="reviewComment" name="comment" rows="5" style="height:100%;"></textarea>
                        <label for="reviewComment">Comments</label>
                    </div>
                    <div class="form-group">
                        <label for="reviewImage" class="mb-2">Proof of attendance</label>
                        <input type="file" class="form-control" id="reviewImage" name="image">
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-outline text-white" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="review-form" name="submit" class="btn btn-primary">Review</button>
            </div>
        </div>
    </div>
</div>