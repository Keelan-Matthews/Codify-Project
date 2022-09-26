let followingUser = false;

$(document).ready(() => {
    populateUserEvents();
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

const eventTag = (tag_name) => `
    <div class="p-2 rounded bg-dark me-2">
        <small><span class="fw-bold"># </span>${tag_name}</small>
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
            console.log(res);
            $('#user-followers').html(res.data[0].followers);

            if (res.data[0].name != null) {
                $('.events').html(res.data.map(eventCard).join(''));
            }

            $('#username').html(res.data[0].username);

            if (res.data[0].profile_photo != "")
                $('#user-profile-photo').attr('src', res.data[0].profile_photo);
            else
                $('#user-profile-photo').attr('src', 'media/profile_photos/default.png');

            if (user_id == profile_id) {
                $('#profile-actions').addClass('d-none');
                $('#edit-actions').removeClass('d-none');
            }
            else {
                $('#edit-actions').addClass('d-none');
                $('#profile-actions').removeClass('d-none');
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
        },
        error: (res) => {
            console.log(res);
        },
        processData: false,
    })
}

$(".events").on('click', '.event-card', function () {
    $("#profile-container").toggleClass('d-none');
    $("#event-details-container").toggleClass('d-none');

    let event_id = $(this).attr('id');

    $.ajax({
        contentType: 'application/json',
        data: JSON.stringify({
            "type": "event-details",
            "event_id": event_id
        }),
        url: 'api.php',
        type: 'POST',
        success: (res) => {
            let data = res.data;

            $('.event-title').text(data.name);
            $('.event-date').text(data.date);
            $('.event-location').text(data.location);
            $('.event-description').text(data.description);
            $('.event-image').attr('src', data.image);
            $('.event-image').attr('class', "rounded w-100");
            $('.event-category').text(data.category);

            let tags = [];
            if (data.tag1 !== null) tags.push(data.tag1);
            if (data.tag2 !== null) tags.push(data.tag2);
            if (data.tag3 !== null) tags.push(data.tag3);

            $('.event-tags').html(tags.map(eventTag).join(''));
        },
        error: (res) => {
            console.log(res);
        },
        processData: false
    })
});

$("#go-back-event-details").on('click', () => {
    $("#profile-container").toggleClass('d-none');
    $("#event-details-container").toggleClass('d-none');
});

// Remember to update followingUser and update friendship !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$("#follow-button").on('click', function () {
    $(this).toggleClass('btn-primary');
    $(this).toggleClass('bg-white');
    $(this).toggleClass('text-black');
    $("#follow-icon").toggleClass('fa-user-plus');
    $("#follow-icon").toggleClass('fa-check');
    $("#follow-icon").toggleClass('text-black');

    if ($(this).hasClass('btn-primary')) {
        $(this).children('span').text('Follow');
    }
    else {
        $(this).children('span').text('Following');
    }

    const profile_id = getUrlParameter('user_id');

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
});

$('form').submit((e) => {
    e.preventDefault();
    if (!checkInputs()) {
        console.log('invalid inputs');
        $('#createEvent').modal('show');
    }
    else {
        let form = $('form')[0];
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