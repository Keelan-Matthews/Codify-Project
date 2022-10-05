let exploreEvents;

const eventCard = ({ name, date, location, image, profile_photo, event_id, user_id }) => `
    <div class="p-3 col-12 col-md-6 col-lg-4">
        <div class="card lighter-gray shadow rounded event-card" id="${event_id}" data-user-id="${user_id}">
            <div class="d-flex p-3">
                <img src="${profile_photo}" class="rounded-circle me-3" width="50" height="50">
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
const userCard = ({ user_id, profile_photo, username }) => `
    <div class="user-card mb-5 position-relative" id="${user_id}" title="${username}">
        <img src="${profile_photo}" class="rounded-circle me-3 " width="70" height="70" id="user-card-image">
    </div>
`;

const eventTag = (tag_name) => `
    <div class="p-2 rounded bg-dark me-2">
        <small><span class="fw-bold"># </span>${tag_name}</small>
    </div>
`;

const listItem = ({ list_id, title }) => `
    <li class="list-group-item mx-2 btn fw-bold" id="${list_id}">${title.length > 14 ? title.substring(0, 13) + "..." : title}</li>
`;

const populateHomeEvents = () => {

    $.ajax({
        contentType: 'application/json',
        data: JSON.stringify({
            "type": "home",
            "user_id": user_id
        }),
        url: 'api.php',
        type: 'POST',
        success: (res) => {
            console.log(res);

            $('.events').html(res.data.map(eventCard).join(''));
        },
        error: (res) => {
            console.log(res);
        },
        processData: false,
    })
}

const populateHomeUsers = () => {
    $.ajax({
        contentType: 'application/json',
        data: JSON.stringify({
            "type": "home_users",
            "user_id": user_id
        }),
        url: 'api.php',
        type: 'POST',
        success: (res) => {
            console.log(res);

            $('.followed-users').html(res.data.map(userCard).join(''));
        },
        error: (res) => {
            console.log(res);
        },
        processData: false,
    })
}

$(document).ready(() => {
    if (window.location.pathname.includes('dashboard.php')) {
        populateHomeEvents();
        populateHomeUsers();
    } else {
        populateExploreEvents();
    }
    resize();
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

$('#event-form').on('submit', (e) => {
    e.preventDefault();
    if (!checkInputs()) {
        console.log('invalid inputs');
        $('#createEvent').modal('show');
    }
    else {
        let form = $('form#event-form')[0];
        let formData = new FormData(form);
        formData.append('type', 'add_event');
        formData.append('user_id', user_id);

        let tagCounter = 1;
        $('input[type=checkbox]:checked').each(function () {
            formData.append(`tag${tagCounter++}`, $(this).val());
        });

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
                console.log(res);
                populateHomeEvents();
                $('#createEvent').modal('hide');
            },
            error: () => {
                console.log('An error occurred during the api call');
                $('#createEvent').modal('show');
            }

        })
    }
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
    if (eventImg === 0) {
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

$(".events").on('click', '.event-card', function () {
    $("#events-container").toggleClass('d-none');
    $("#event-details-container").toggleClass('d-none');

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
            console.log(res);
            let data = res.data[0];

            if ($('#event-image').children().length > 0) {
                $('#event-image').children().remove();
            }

            $('.event-title').text(data.name);
            $('.event-date').text(data.date);
            $('.event-location').text(data.location);
            $('.event-description').text(data.description);
            $('<img/>')
                .attr('src', data.image)
                .attr('alt', data.name)
                .attr('class', 'rounded w-100')
                .appendTo('#event-image');
            $('.event-category').text(data.category);
            $('#event-user').text(data.username);
            $('#event-user-photo').attr('src', data.profile_photo);
            $('#view-profile').attr('href', 'profile.php?user_id=' + data.user_id);
            $('.event-details').attr('id', event_id);

            if ($('#event-details-user').hasClass('d-none')) {
                $('#event-details-user').removeClass('d-none');
            }

            if (!$('#edit-event').hasClass('d-none')) {
                $('#edit-event').addClass('d-none');
            }

            let tags = [];
            if (data.tag1 !== null) tags.push(data.tag1);
            if (data.tag2 !== null) tags.push(data.tag2);
            if (data.tag3 !== null) tags.push(data.tag3);

            let lists = res.data[1][0];
            if (lists != null && lists[0] != null) {
                $('#list-options').html(lists.map(listItem).join(''));
            }
            else {
                $('#list-options').html('<p class="text-center mb-0">No lists available</p>');
            }

            $('.event-tags').html(tags.map(eventTag).join(''));

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

        },
        error: (res) => {
            console.log(res);
        },
        processData: false
    })
});

$("#go-back-event-details").on('click', () => {
    $("#events-container").toggleClass('d-none');
    $("#event-details-container").toggleClass('d-none');
});

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

$('.followed-users').on('click', '.user-card', function () {
    let user_id = $(this).attr('id');
    window.location.href = 'profile.php?user_id=' + user_id;
});

$('#attend-event').on('click', () => {
    $('#reviewModal').modal('show');
});

$('#review-form').on('submit', (e) => {
    e.preventDefault();
    let form = $('form#review-form')[0];
    let formData = new FormData(form);
    let event_id = $('.event-details').attr('id');
    let rating = $('.rating').attr('id');
    formData.append('type', 'add_review');
    formData.append('user_id', user_id);
    formData.append('event_id', event_id);
    formData.append('rating', rating);
    formData.append('review_date', new Date().toISOString().slice(0, 19).replace('T', ' '));

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
            console.log(res);

            $('#reviewModal').modal('hide');
        },
        error: () => {
            console.log('An error occurred during the api call');
            $('#reviewModal').modal('show');
        }

    })
});

$('.star-rating').on('click', function () {
    const starClassActive = "fas fa-star star-rating shadow text-warning";
    const starClassInactive = "fas fa-star star-rating shadow text-lighter-gray-2";

    let i = $(this).index();
    $('.rating').attr('id', i + 1);

    let allStars = $('.star-rating');
    let activeStars = $('.star-rating').slice(0, i + 1);

    if ($(this).hasClass(starClassInactive)) {
        for (i; i >= 0; --i)
            activeStars[i].className = starClassActive;
    } else {
        for (i; i < 5; ++i)
            allStars[i].className = starClassInactive;
    }
});

const reviewCard = ({ user_id, username, profile_photo, rating, comment, review_date }) => `
    <a href="profile.php?user_id=${user_id}">
        <div class="d-flex align-items-center lighter-gray-2 p-3 rounded row mt-4">
            <div class="col-2">
                <img src="${profile_photo}" alt="" class="rounded-circle w-100">
            </div>
            <div class="col-10">
                <div class="d-flex justify-content-between">
                    <p class="text-white fw-bold mb-0">${username}</p>
                    <small class="text-white">
                        ${showReviewDate(review_date)}
                    </small>
                </div>
                
                <p class="rating">
                    ${showStarsReview(rating)}
                </p>
            </div>
            <p class="text-white mt-2">${comment}</p>
        </div>
    </a>
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

const showReviewDate = (date) => {
    let dateObj = new Date(date);
    let ratingDate = dateObj.toISOString().slice(0, 9);
    let currDate = new Date().toISOString().slice(0, 9);
    let day = dateObj.getDate();
    let month = dateObj.getMonth() + 1;
    let year = dateObj.getFullYear();

    if (ratingDate === currDate)
        return "Today";
    else if (year === new Date().getFullYear()) {
        let monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        return day + " " + monthNames[month - 1];
    }
    else {
        return day + "/" + month + "/" + year;
    }
}


$('#create-event-button').on('click', () => {
    $('#createEventLabel').text('Create Event');
    $('#createEventButton').text('Create');
});

const populateExploreEvents = () => {
    $.ajax({
        contentType: 'application/json',
        data: JSON.stringify({
            "type": "explore"
        }),
        url: 'api.php',
        type: 'POST',
        success: (res) => {
            console.log(res);

            exploreEvents = res.data;

            $('.events').html(res.data.map(eventCard).join(''));
        },
        error: (res) => {
            console.log(res);
        },
        processData: false,
    })
}

$('.search-input').on('keyup', () => {
    let search = $('.search-input').val();
    
    if (search === '') {
        $('.search-text').html("AHHHH");
    }

    if (search[0] === '#') {
        $('.search-text').html(
            "<span class='color-char'>" + search[0] +"</span>"
        );
        search = search.slice(1);
        let taggedEvents = exploreEvents.map(event => {
            return [event.tag1, event.tag2, event.tag3];
        })

        let filteredEvents = exploreEvents.map((event, index) => {
            let found = false;

            taggedEvents[index].forEach(tag => {
                if (tag == null) return;
                if (tag.toLowerCase().includes(search.toLowerCase())) {
                    found = true;
                }
            });

            if (found) {
                return event;
            }
        })
        
        filteredEvents = filteredEvents.filter(event => event != null);
        $('.events').html(filteredEvents.map(eventCard).join(''));
    }
    else if (search[0] === '@') {
        $('.search-text').html(
            "<span class='color-char'>" + search[0] +"</span>"
        );
        search = search.slice(1);
        // display users
    }
    else {
        $('.search-text').html("");
        let filteredEvents = exploreEvents.filter(event => event.name.toLowerCase().includes(search.toLowerCase()));
        $('.events').html(filteredEvents.map(eventCard).join(''));
    }
});