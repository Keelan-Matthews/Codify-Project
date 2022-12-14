let followingUser = false;
let createOrEdit = 'create';
let myProfile = false;
$(document).ready(() => {
    populateUserEvents();
    populateUserLists();
    populateUserAttendedEvents();
    getUnreadMessages();
    getCategories();
    resize();

    if (is_admin == 1) {
        $('#admin_add').removeClass('d-none');
    }
    else {
        $('#admin_add').addClass('d-none');
    }
});

$(window).resize(() => {
    resize();
})

const resize = () => {
    let windowsize = $(window).width();

    if (windowsize < 1200) {
        $('.navtext-hide').css('display', 'none');
    }
    else {
        $('.navtext-hide').css('display', 'block');
    }

    if (windowsize < 769) {
        $('.mobile-hide').css('display', 'none');
        $('.mobile-show').css('display', 'block');
    }
    else {
        $('.mobile-hide').css('display', 'block');
        $('.mobile-show').css('display', 'none');
    }
}

const eventCard = ({ name, date, location, image, event_id }) => `
    <div class="p-3 col-12 col-md-6 col-lg-4">
        <div class="card lighter-gray shadow rounded event-card" id="${event_id}">
            <div class="d-flex p-3">
                <div class="text-white">
                    <h5 class="my-0">${name}</h5>
                    <small>${location}</small>
                </div>
            </div>
            <img src="${image}" alt="${name}" class="my-2 w-100" height="200">
            <small class="text-white text-end my-3 me-3"><i class="fas fa-clock me-2"></i>${date}</small>
        </div>
    </div>
`;

const eventCardLight = ({ name, date, location, image, event_id }) => `
    <div class="p-3 col-12 col-md-6 col-lg-4">
        <div class="card lighter-gray-2 shadow rounded event-card" id="${event_id}">
            <div class="d-flex p-3">
                <div class="text-white">
                    <h5 class="my-0">${name}</h5>
                    <small>${location}</small>
                </div>
            </div>
            <img src="${image}" alt="${name}" class="my-2 w-100" height="200">
            <small class="text-white text-end my-3 me-3"><i class="fas fa-clock me-2"></i>${date}</small>
        </div>
    </div>
`;

const listCard = ({ title, count, images, list_id }) => `
    <div class="p-3 col-12 col-md-6 col-lg-4">
        <div class="card lighter-gray shadow rounded list-card" id="${list_id}">
            <div class="d-flex p-3">
                <div class="text-white">
                    <h5 class="my-0">${title}</h5>
                    <small>${count} events</small>
                </div>
            </div>
            <div class="lighter-gray-2">
            ${images ?
        listGallery(images) :
        `<div class="d-flex justify-content-center align-items-center" style="height: 270px;">
                        <h5 class="text-white fw-bold">No events</h5>
                    </div>`
    }
            </div>
        </div>
    </div>
`;

const listGallery = (images) => {
    let gallery = '';

    for (let i = 0; i < 4; i++) {
        if (images[i]) {
            gallery += `
                <img src="${images[i]}" alt="event" class="col-6 rounded-3 mb-3" style="height: 101px">
            `;
        }
        else {
            gallery += `
                <div class="col-6 mb-3" style="height: 101px"></div>
            `;
        }
    }

    return `<div class="row p-3">${gallery}</div>`;
}

const listItem = ({ list_id, title }) => `
    <li class="list-group-item mx-2 btn fw-bold" id="${list_id}">${title.length > 14 ? title.substring(0, 13) + "..." : title}</li>
`

const addList = () => `
    <div class="p-3 col-12 col-md-6 col-lg-4">
        <div class="card lighter-gray shadow rounded add-list d-flex flex-column align-items-center justify-content-center text-white">
            <i class="fas fa-plus me-2 fs-1 fw-bold"></i>
            <span class="fw-bold">New list</span>
        </div>
    </div>
`;

const eventTag = (tag_name) => `
    <div class="p-2 rounded bg-dark me-2 tag-click" id="${tag_name}">
        <small><span class="fw-bold"># </span><span>${tag_name}</span></small>
    </div>
`;

const followerCard = ({ username, profile_photo, user_id }) => `
<div class="row">
    <a href="profile.php?user_id=${user_id}" class="col-11">
        <div class="d-flex align-items-center lighter-gray-2 p-3 rounded row mt-2">
            <div class="col-2">
                <img src="${profile_photo}" alt="" class="rounded-circle w-100">
            </div>
            <div class="col-8">
                <p class="text-white fw-bold mb-0">${username}</p>
            </div>
        </div>
    </a>
    ${
        myProfile ?
        `
        <div class="remove_follower col-1 d-flex justify-content-center align-items-center" id="${user_id}">
            <i class="fas fa-times text-white" id="${user_id}"></i>
        </div>
        `
        : ''
    }
</div>
`;

const getUrlParameter = (sParam) => {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    return false;
};

const populateUserEvents = () => {

    const profile_id = getUrlParameter('user_id');

    $.ajax({
        contentType: 'application/json',
        data: JSON.stringify({
            "type": "user-events",
            "user_id": user_id,
            "profile_id": profile_id
        }),
        url: 'api.php',
        type: 'POST',
        success: (res) => {
            $('#user-followers').html(res.data[0].followers);

            if (res.data[0].name != null) {
                $('.events').html(res.data.map(eventCard).join(''));
            }
            else {
                $('.events').html(`
                    <div class="mt-5 col-12 d-flex justify-content-center">
                        <span class="fw-bold text-white fs-1">No events</span>
                    </div>
                `);
            }

            $('#username').html(res.data[0].username);
            $('#username_list').html(res.data[0].username);
            $('#username_event').html(res.data[0].username);

            if (res.data[0].profile_photo != "")
                $('#user-profile-photo').attr('src', res.data[0].profile_photo + "?t=" + new Date().getTime());
            else
                $('#user-profile-photo').attr('src', 'media/profile_photos/default.png');

            if (user_id == profile_id) {
                $('#profile-actions').addClass('d-none');
                $('#edit-actions').removeClass('d-none');
                myProfile = true;
            }
            else if (is_admin == "") {
                $('#edit-actions').addClass('d-none');
                $('#profile-actions').removeClass('d-none');

                if (res.data[0].mutual) {
                    $('#message-button').removeClass('d-none');
                } else {
                    $('#message-button').addClass('d-none');
                }
            } else {
                $('#edit-actions').removeClass('d-none');
                $('#profile-actions').removeClass('d-none');

                if (res.data[0].mutual) {
                    $('#message-button').removeClass('d-none');
                } else {
                    $('#message-button').addClass('d-none');
                }
            }

            followingUser = res.data[0].following;

            if (followingUser) {
                $('#follow-button').removeClass('btn-primary');
                $('#follow-button').addClass('bg-white');
                $('#follow-button').addClass('text-black');
                $("#follow-icon").removeClass('fa-user-plus');
                $("#follow-icon").addClass('fa-check');
                $("#follow-icon").addClass('text-black');
                $('#follow-button').children('span').text('Following');
            }

            if (res.data[0].verified == 1) {
                $('#username-verified').append('<img src="./media/svg/verified.svg" alt="Verified" width="20" height="20">');
            }
        },
        error: (res) => {
            console.log(res);
        },
        processData: false,
    })
}

const populateUserLists = () => {
    const profile_id = getUrlParameter('user_id');

    $.ajax({
        contentType: 'application/json',
        data: JSON.stringify({
            "type": "user_lists",
            "profile_id": profile_id
        }),
        url: 'api.php',
        type: 'POST',
        success: (res) => {

            if (!res.data.message) {
                $('.lists').html(res.data.map(listCard).join(''));
            }

            if (user_id == profile_id)
                $('#lists-container').append(addList);

            if (res.data.message && user_id != profile_id) {
                $('.lists').html(`
                    <div class="mt-5 col-12 d-flex justify-content-center align-items-center">
                        <span class="fw-bold text-white fs-1">No lists</span>
                    </div>
                `);
            }
        },
        error: (res) => {
            console.log(res);
        },
        processData: false,
    })
}

const populateUserAttendedEvents = () => {
    const profile_id = getUrlParameter('user_id');

    $.ajax({
        contentType: 'application/json',
        data: JSON.stringify({
            "type": "attended_events",
            "user_id": profile_id
        }),
        url: 'api.php',
        type: 'POST',
        success: (res) => {

            if (!res.data.message) {
                $('.attended').html(res.data.map(eventCard).join(''));
            }
            else {
                $('.attended').html(`
                    <div class="mt-5 col-12 d-flex justify-content-center">
                        <span class="fw-bold text-white fs-1">No events</span>
                    </div>
                `);
            }
        },
        error: (res) => {
            console.log(res);
        },
        processData: false,
    })
}

$(".events, .list-events, .attended").on('click', '.event-card', function () {
    $("#profile-container").addClass('d-none');
    $("#event-details-container").removeClass('d-none');

    let event_id = $(this).attr('id');

    $.ajax({
        contentType: 'application/json',
        data: JSON.stringify({
            "type": "event-details",
            "event_id": event_id,
            "user_id": user_id
        }),
        url: 'api.php',
        type: 'POST',
        success: (res) => {
            let data = res.data[0];

            if ($('#event-image').children().length > 0) {
                $('#event-image').children().remove();
            }

            $('.event-title').text(data.name);
            $('.event-date').text(data.date);
            $('.event-location').text(data.location);
            $('.event-description').text(data.description);
            $('.event-details').attr('id', event_id);

            $('<img/>')
                .attr('src', data.image)
                .attr('alt', data.name)
                .attr('class', 'rounded w-100')
                .appendTo('#event-image');
            $('.event-category').text(data.category);
            $('#event-details-user').addClass('d-none');
            $('#edit-event').removeClass('d-none');

            let tags = [];
            if (data.tag1 !== null) tags.push(data.tag1);
            if (data.tag2 !== null) tags.push(data.tag2);
            if (data.tag3 !== null) tags.push(data.tag3);

            $('.event-tags').html(tags.map(eventTag).join(''));

            $('#attend-event').addClass('d-none');

            if (is_admin == 1 || user_id == data.user_id) {
                $('#edit-event').removeClass('d-none');
            }
            else {
                $('#edit-event').addClass('d-none');
            }

            let lists = res.data[1][0];
            if (lists != null && lists[0] != null) {
                $('#list-options').html(lists.map(listItem).join(''));
            }
            else {
                $('#list-options').html('<p class="text-center mb-0">No lists available</p>');
            }

            let reviews = res.data[2][0];
            if (reviews != null && reviews[0] != null) {
                $('.reviews').html(reviews.map(reviewCard).join(''));
                $('.carousel-inner').html(reviews.map(carouselCard).join(''));
                $('.carousel-item').first().addClass('active');

                let total = 0;
                reviews.forEach(r => total += parseInt(r.rating));
                let avg = total / reviews.length;
                $('.average-rating').text(avg.toFixed(1));
            }
            else {
                $('.reviews').html('<p class="text-center mb-0 text-white">No reviews available</p>');
                $('.carousel-inner').html('<p class="text-center mb-0 text-white">No images available</p>');
            }

            if (data.user_id == user_id || is_admin == 1) {
                $(".delete-review").removeClass('d-none')
            }
            else {
                $(".delete-review").addClass('d-none')
            }
        },
        error: (res) => {
            console.log(res);
        },
        processData: false
    })
});

$("#go-back-event-details").on('click', () => {
    $("#profile-container").removeClass('d-none');
    $("#event-details-container").addClass('d-none');

    if (!$("#list-details-container").hasClass('d-none')) {
        $("#list-details-container").addClass('d-none');
        $("#lists-container").removeClass('d-none');
    }
});

$("#go-back-list-details").on('click', () => {
    $("#profile-container").removeClass('d-none');
    $("#list-details-container").addClass('d-none');
    $("#lists-container").removeClass('d-none');
});

$("#follow-button").on('click', function () {
    $(this).toggleClass('btn-primary');
    $(this).toggleClass('bg-white');
    $(this).toggleClass('text-black');
    $("#follow-icon").toggleClass('fa-user-plus');
    $("#follow-icon").toggleClass('fa-check');
    $("#follow-icon").toggleClass('text-black');

    const profile_id = getUrlParameter('user_id');

    if ($(this).hasClass('btn-primary')) {
        $(this).children('span').text('Follow');
        followingUser = false;

        $.ajax({
            contentType: 'application/json',
            data: JSON.stringify({
                "type": "unfollow",
                "user_id": user_id,
                "profile_id": profile_id
            }),
            url: 'api.php',
            type: 'POST',
            success: (res) => {
                console.log(res);
            },
            error: (res) => {
                console.log(res);
            },
            processData: false
        })
    }
    else {
        $(this).children('span').text('Following');
        followingUser = true;

        $.ajax({
            contentType: 'application/json',
            data: JSON.stringify({
                "type": "follow",
                "user_id": user_id,
                "profile_id": profile_id
            }),
            url: 'api.php',
            type: 'POST',
            success: (res) => {
                console.log(res);
            },
            error: (res) => {
                console.log(res);
            },
            processData: false
        })
    }
});

$('#event-form').submit((e) => {
    e.preventDefault();
    if (!checkInputs()) {
        console.log('invalid inputs');
        $('#createEvent').modal('show');
    }
    else {
        if (createOrEdit == 'create') {
            let form = $('form#event-form')[0];
            let formData = new FormData(form);
            formData.append('type', 'add_event');
            formData.append('user_id', user_id);

            let tagCounter = 1;
            $('input[type=checkbox]:checked').each(function () {
                formData.append(`tag${tagCounter++}`, $(this).val());
            });

            // console log formData
            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }

            $.ajax({
                url: 'api.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: (res) => {
                    $('#createEvent').modal('hide');
                },
                error: () => {
                    console.log('An error occurred during the api call');
                    $('#createEvent').modal('show');
                }

            })
        }
        else {
            let form = $('form#event-form')[0];
            let formData = new FormData(form);
            formData.append('type', 'edit_event');
            formData.append('user_id', user_id);
            let event_id = $('.event-details').attr('id');
            formData.append('event_id', event_id);

            let tagCounter = 1;
            $('input[type=checkbox]:checked').each(function () {
                formData.append(`tag${tagCounter++}`, $(this).val());
            });

            $.ajax({
                url: 'api.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: (res) => {
                    $('#createEvent').modal('hide');
                },
                error: () => {
                    console.log('An error occurred during the api call');
                    $('#createEvent').modal('show');
                }

            })
        }
    }
});

$('#message-button').on('click', () => {
    const profile_id = getUrlParameter('user_id');
    window.location.href = `messages.php?friend_id=${profile_id}`;
});

const checkInputs = () => {
    const eventName = $('#eventName').val();
    const eventDate = $('#eventDate').val();
    const eventLocation = $('#eventLocation').val();
    const eventImg = $('#eventImage').get(0).files.length;
    const eventCategory = $('#eventCategory').val();
    const eventDescription = $('#eventDescription').val();

    let valid = true;

    let nameErrorMessage = '';

    if (eventName === '') {
        nameErrorMessage = 'Event name is required';
    } else if (eventName.length > 30)
        nameErrorMessage = 'Event name must be less than 30 characters';

    if (!setValidity($('#eventName'), nameErrorMessage)) valid = false;

    let dateErrorMessage = '';
    if (eventDate === undefined) {
        dateErrorMessage = 'Event date is required';
    }

    if (!setValidity($('#eventDate'), dateErrorMessage)) valid = false;

    let locationErrorMessage = '';
    if (eventLocation === '') {
        locationErrorMessage = 'Event location is required';
    }
    else if (eventLocation.length > 20) {
        locationErrorMessage = 'Event location must be less than 20 characters';
    }

    if (!setValidity($('#eventLocation'), locationErrorMessage)) valid = false;

    let imgErrorMessage = '';
    if (eventImg === 0 && createOrEdit === 'create') {
        imgErrorMessage = 'Event image is required';
    }

    if (!setValidity($('#eventImage'), imgErrorMessage)) valid = false;

    let categoryErrorMessage = '';
    if (eventCategory === 'Select Category') {
        categoryErrorMessage = 'Event category is required';
    }

    if (!setValidity($('#eventCategory'), categoryErrorMessage)) valid = false;

    let descriptionErrorMessage = '';
    if (eventDescription === '') {
        descriptionErrorMessage = 'Event description is required';
    }

    if (!setValidity($('#eventDescription'), descriptionErrorMessage)) valid = false;

    return valid;
}

const setErrorFor = (input, message) => {
    const small = input.siblings('small');

    small.text(message);
    input.addClass('is-invalid');
}

const setSuccessFor = input => {
    input.addClass('is-valid');
    input.removeClass('is-invalid');
}

const setValidity = (input, message) => {
    if (message) {
        setErrorFor(input, message);
        return false;
    }
    else {
        setSuccessFor(input);
        return true;
    }
}

let numTags = 0;
$('.form-check-input').on('change', function () {

    if (this.checked) {
        numTags++;
        if (numTags > 3) {
            this.checked = false;
            numTags--;
            return;
        }
    }
    else {
        numTags--;
    }

    if (numTags === 3) {
        $('.form-check-input').each(function () {
            if (!this.checked) {
                $(this).prop('disabled', true);
                $('.tags').addClass('disabled-tags');
            }
        })
    }
    else {
        $('.form-check-input').each(function () {
            if (!this.checked) {
                $(this).prop('disabled', false);
                $('.tags').removeClass('disabled-tags');
            }
        })
    }
});

$('#lists-container').on('click', '.add-list', () => {
    $('#createList').modal('show');
});

$('#list-form').submit((e) => {
    e.preventDefault();

    let form = $('form#list-form')[0];
    let formData = new FormData(form);
    formData.append('type', 'add_list');
    formData.append('user_id', user_id);

    $.ajax({
        url: 'api.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: (res) => {
            populateUserLists();
            $('#createList').modal('hide');
        },
        error: () => {
            console.log('An error occurred during the api call');
            $('#createList').modal('show');
        }

    })
});

$('#list-options').on('click', '.list-group-item', function () {
    let event_id = $('.event-details').attr('id');
    let list_id = $(this).attr('id');

    $.ajax({
        contentType: 'application/json',
        data: JSON.stringify({
            "type": "add_to_list",
            "event_id": event_id,
            "list_id": list_id
        }),
        url: 'api.php',
        type: 'POST',
        processData: false,
        success: (res) => {
            console.log(res);
        },
        error: () => {
            console.log('An error occurred during the api call');
        }
    })
});

$('.lists').on('click', '.list-card', function () {
    let list_id = $(this).attr('id');
    $('#list-details-container').toggleClass('d-none');
    $('#lists-container').toggleClass('d-none');
    $('#profile-container').toggleClass('d-none');

    $.ajax({
        contentType: 'application/json',
        data: JSON.stringify({
            "type": "list_events",
            "list_id": list_id
        }),
        url: 'api.php',
        type: 'POST',
        success: (res) => {
            $('.list-events').html(res.data.map(eventCardLight).join(''));
            $('.list-title').text(res.data[0].title);
            $('.list-description').text(res.data[0].description);
        },
        error: (res) => {
            $('.list-events').html(`
                <div class="mb-5 col-12 d-flex justify-content-center align-items-center">
                    <span class="fw-bold text-white fs-1">No events in list</span>
                </div>
            `);
        },
        processData: false,
    })
});

const reviewCard = ({ review_id, user_id, username, profile_photo, rating, comment, review_date }) => `
    <div class="d-flex align-items-center lighter-gray-2 p-3 rounded row mt-4">
        <div class="col-2">
            <a href="profile.php?user_id=${user_id}">
                <img src="${profile_photo}" alt="" class="rounded-circle w-100 crop-image aspect-ratio">
            </a>
        </div>
        <div class="col-10">
            <div class="d-flex justify-content-between">
                <p class="text-white fw-bold mb-0">${username}</p>
                <small class="text-white">
                    ${showReviewDate(review_date)}
                    <span class="ms-2 delete-review" id=${review_id}>
                        <i class="fas fa-trash-can"></i>
                    </span>
                </small>
            </div>
            
            <p class="rating">
                ${showStarsReview(rating)}
            </p>
        </div>
        <p class="text-white mt-2">${comment}</p>
    </div>
    
`;

const carouselCard = ({ image }) => `
    <div class="carousel-item">
        <img src="${image}" class="d-block w-100 rounded-2" alt="">
    </div>
`;

const showStars = (rating) => {
    let stars = '';
    for (let i = 0; i < rating; i++) {
        stars += '<i class="fas fa-star text-warning"></i>';
    }

    for (let i = 0; i < 5 - rating; i++) {
        stars += '<i class="fas fa-star text-lighter-gray-2"></i>';
    }
    return stars;
}

const showStarsReview = (rating) => {
    let stars = '';
    for (let i = 0; i < rating; i++) {
        stars += '<i class="fas fa-star text-warning"></i>';
    }

    for (let i = 0; i < 5 - rating; i++) {
        stars += '<i class="fas fa-star text-lighter-gray"></i>';
    }
    return stars;
}

$('#edit-details').on('click', () => {
    $('#createEvent').modal('show');
    $('#createEventLabel').text('Edit Event');
    $('#createEventButton').text('Save Changes');
    createOrEdit = 'edit';

    $('#eventName').val($('h3.event-title').text());
    $('#eventLocation').val($('.event-location').text());
    $('#eventDescription').val($('.event-description').text());
    $('#eventDate').val($('.event-date').text());

    $('#eventCategory').val($('.event-category').text());

    $('.event-tags').children().each(function () {
        let tag = $(this).attr('id');
        $(`input[value="${tag}"]`).prop('checked', true);
    })

    numTags = $('.event-tags').children().length;

    if (numTags === 3) {
        $('.form-check-input').each(function () {
            if (!this.checked) {
                $(this).prop('disabled', true);
                $('.tags').addClass('disabled-tags');
            }
        })
    }
    else {
        $('.form-check-input').each(function () {
            if (!this.checked) {
                $(this).prop('disabled', false);
                $('.tags').removeClass('disabled-tags');
            }
        })
    }

});

$('#create-event-button').on('click', () => {
    $('#createEventLabel').text('Create Event');
    $('#createEventButton').text('Create');
    createOrEdit = 'create';
});

$('#edit-profile').on('click', () => {
    $('#editProfileModal').modal('show');
    let currPhoto = $('#user-profile-photo').attr('src');
    $('.currentProfilePhoto').attr('src',currPhoto);
});

$('#profile-form').submit((e) => {
    e.preventDefault();

    let form = $('form#profile-form')[0];
    let formData = new FormData(form);
    formData.append('type', 'edit_profile');
    formData.append('user_id', getUrlParameter('user_id'));

    $.ajax({
        url: 'api.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: (res) => {
            $('#editProfileModal').modal('hide');
        },
        error: () => {
            console.log('An error occurred during the api call');
            $('#editProfileModal').modal('show');
        }

    })
});

$('.followers-label').on('click', () => {
    $('#showFollowers').modal('show');

    $.ajax({
        url: 'api.php',
        type: 'POST',
        data: JSON.stringify({
            "type": "followers",
            "profile_id": getUrlParameter('user_id')
        }),
        contentType: false,
        processData: false,
        success: (res) => {
            $('#followers-body').html(res.data.map(followerCard).join(''));
        },
        error: () => {
            console.log('An error occurred during the api call');
        }

    })
});

const showReviewDate = (date) => {
    let dateObj = new Date(date);
    let day = dateObj.getDate();
    let month = dateObj.getMonth() + 1;
    let year = dateObj.getFullYear();

    if (dateObj === new Date())
        return "Today";
    else if (year === new Date().getFullYear()) {
        let monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        return day + " " + monthNames[month - 1];
    }
    else {
        return day + "/" + month + "/" + year;
    }
}

const getUnreadMessages = () => {
    $.ajax({
        contentType: 'application/json',
        data: JSON.stringify({
            "type": "unread_messages",
            "user_id": user_id
        }),
        url: 'api.php',
        type: 'POST',
        success: (res) => {
            if (res.data.length > 0) {
                $('.unread').addClass('unread-active');
            }
            else {
                $('.unread').removeClass('unread-active');
            }
        },
        error: (res) => {
            console.log(res);
        },
        processData: false,
    })
}

$('.event-details').on('click', '.tag-click', function () {
    let tag = $(this).attr('id');
    window.location.href = "explore.php?tag=" + tag;
});

$('#delete-profile').on('click', () => {
    $.ajax({
        url: 'api.php',
        type: 'POST',
        data: JSON.stringify({
            "type": "delete_profile",
            "user_id": getUrlParameter('user_id')
        }),
        contentType: false,
        processData: false,
        success: (res) => {
            window.location.href = "backend/logout.php";
        },
        error: () => {
            console.log('Profile could not be deleted');
        }

    })
});

$('#delete-event').on('click', () => {
    const event_id = $('.event-details').attr('id');

    $.ajax({
        url: 'api.php',
        type: 'POST',
        data: JSON.stringify({
            "type": "delete_event",
            "event_id": event_id
        }),
        contentType: false,
        processData: false,
        success: (res) => {
            window.location.href = "profile.php?user_id=" + user_id;
        },
        error: () => {
            console.log('Event could not be deleted');
        }

    })
});

$('.reviews').on('click', '.delete-review', function () {
    const review_id = $(this).attr('id');

    $.ajax({
        url: 'api.php',
        type: 'POST',
        data: JSON.stringify({
            "type": "delete_review",
            "review_id": review_id
        }),
        contentType: false,
        processData: false,
        success: (res) => {
            console.log(res);
        },
        error: () => {
            console.log('Review could not be deleted');
        }

    })
});

$('#attended-toggle').on('click', () => {
    $('#attended-container').removeClass('d-none');
    $('#attended-toggle').addClass('lighter-gray-2');
    
    $('#lists-container').addClass('d-none');
    $('#lists-toggle').removeClass('lighter-gray-2');

    $('#events-container').addClass('d-none');
    $('#events-toggle').removeClass('lighter-gray-2');
});

$('#events-toggle').on('click', () => {
    $('#events-container').removeClass('d-none');
    $('#events-toggle').addClass('lighter-gray-2');

    $('#lists-container').addClass('d-none');
    $('#lists-toggle').removeClass('lighter-gray-2');

    $('#attended-container').addClass('d-none');
    $('#attended-toggle').removeClass('lighter-gray-2');
})

$('#lists-toggle').on('click', () => {
    $('#lists-container').removeClass('d-none');
    $('#lists-toggle').addClass('lighter-gray-2');

    $('#events-container').addClass('d-none');
    $('#events-toggle').removeClass('lighter-gray-2');

    $('#attended-container').addClass('d-none');
    $('#attended-toggle').removeClass('lighter-gray-2');
})

$('#add-category-button').on('click', () => {

    let category = $('#addCategory').val();

    if (category === "") {
        $('#addCategory').addClass('is-invalid');
        $('#addCategoryError').text('Please enter a category');
        return;
    }

    $.ajax({
        contentType: 'application/json',
        data: JSON.stringify({
            "type": "add_category",
            "category": category
        }),
        url: 'api.php',
        type: 'POST',
        success: (res) => {
            $('#addCategoryError').text('');
            $('#addCategory').val('');
            $('#addCategory').removeClass('is-invalid');

            getCategories();
        },
        error: (res) => {
            console.log(res);
        },
        processData: false,
    })
});

const getCategories = () => {
    // clear categories after first option
    $('#eventCategory').html($('#eventCategory').children().slice(0, 1));

    $.ajax({
        contentType: 'application/json',
        data: JSON.stringify({
            "type": "categories"
        }),
        url: 'api.php',
        type: 'POST',
        success: (res) => {
            $('#eventCategory').append(res.data.map(category => `<option value="${category.category}">${category.category}</option>`).join(''));
        },
        error: (res) => {
            console.log(res);
        },
        processData: false,
    })
}

$('#followers-body').on('click', '.remove_follower', (e) => {
    let follower_id = $(e.target).attr('id');
    
    $.ajax({
        contentType: 'application/json',
        data: JSON.stringify({
            "type": "unfollow",
            "profile_id": user_id,
            "user_id": follower_id
        }),
        url: 'api.php',
        type: 'POST',
        success: (res) => {
            console.log(res);
        }
    })

    window.location.href = "profile.php?user_id=" + user_id;
});

// implement drag and drop for #profilePhoto file input
$('#profile-form').on('dragover', (e) => {
    e.preventDefault();
    e.stopPropagation();
    $('#profile-form').addClass('dragover');
});

$('#profile-form').on('dragleave', (e) => {
    e.preventDefault();
    e.stopPropagation();
    $('#profile-form').removeClass('dragover');
});

$('#profile-form').on('drop', (e) => {
    e.preventDefault();
    e.stopPropagation();
    $('#profile-form').removeClass('dragover');

    let files = e.originalEvent.dataTransfer.files;
    $('#profilePhoto').prop('files', files);
    $('.currentProfilePhoto').attr('src', URL.createObjectURL(files[0]));
});

$('#event-form').on('dragover', (e) => {
    e.preventDefault();
    e.stopPropagation();
    $('#event-form').addClass('dragover');
});

$('#event-form').on('dragleave', (e) => {
    e.preventDefault();
    e.stopPropagation();
    $('#event-form').removeClass('dragover');
});

$('#event-form').on('drop', (e) => {
    e.preventDefault();
    e.stopPropagation();
    $('#event-form').removeClass('dragover');

    let files = e.originalEvent.dataTransfer.files;
    $('#eventImage').prop('files', files);
    $('.currentEventPhoto').attr('src', URL.createObjectURL(files[0]));
});

$('#profileDropContainer').on('click', () => {
    $('#profilePhoto').click();

    $('#profilePhoto').on('change', (e) => {
        $('.currentProfilePhoto').attr('src', URL.createObjectURL(e.target.files[0]));
    });
});