let followingUser = false;

$(document).ready(() => {
    populateUserEvents();
    populateUserLists();
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

const listCard = ({ name, count, images, list_id }) => `
    <div class="p-3 col-12 col-md-6 col-lg-4">
        <div class="card lighter-gray shadow rounded list-card" id="${list_id}">
            <div class="d-flex p-3">
                <div class="text-white">
                    <h5 class="my-0">${name}</h5>
                    <small>${count} events</small>
                </div>
            </div>
            <div class="lighter-gray-2">
            ${
                images ?
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

const listItem = ({list_id, name}) => `
    <li class="list-group-item mx-2 btn fw-bold" id="${list_id}">${name}</li>
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
            else {
                $('.events').html(`
                    <div class="mt-5 col-12 d-flex justify-content-center">
                        <span class="fw-bold text-white fs-1">No events</span>
                    </div>
                `);
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
            console.log(res);

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

$(".events").on('click', '.event-card', function () {
    $("#profile-container").toggleClass('d-none');
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

            let lists = res.data[1];
            if (lists[0] != null) {
                $('#list-options').html(lists.map(listItem).join(''));
            }
            else {
                $('#list-options').html('<p class="text-center mb-0">No lists available</p>');
            }
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

$("#go-back-list-details").on('click', () => {
    $("#profile-container").toggleClass('d-none');
    $("#list-details-container").toggleClass('d-none');
    $("#lists-container").toggleClass('d-none');
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
        let form = $('form')[1];
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

$('#events-toggle').on('click', () => {
    $('#events-container').removeClass('d-none');
    $('#events-toggle').addClass('lighter-gray-2');

    $('#lists-container').addClass('d-none');
    $('#lists-toggle').removeClass('lighter-gray-2');
})

$('#lists-toggle').on('click', () => {
    $('#lists-container').removeClass('d-none');
    $('#lists-toggle').addClass('lighter-gray-2');
    $('#events-container').addClass('d-none');
    $('#events-toggle').removeClass('lighter-gray-2');
})

$('#lists-container').on('click', '.add-list', () => {
    $('#createList').modal('show');
});

$('#list-form').submit((e) => {
    e.preventDefault();

    let form = $('form')[0];
    let formData = new FormData(form);
    formData.append('type', 'add_list');
    formData.append('user_id', user_id);

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
            populateUserLists();
            $('#createList').modal('hide');
        },
        error: () => {
            console.log('An error occurred during the api call');
            $('#createList').modal('show');
        }

    })
});

$('#list-options').on('click', '.list-group-item', function() {
    let event_id = $('.event-details').attr('id');
    let list_id = $(this).attr('id');

    console.log(event_id, list_id);

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

$('.lists').on('click', '.list-card', function() {
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
            console.log(res);

            $('.list-events').html(res.data.map(eventCardLight).join(''));
            $('.list-title').text(res.data[0].name);
            $('.list-description').text(res.data[0].description);
        },
        error: (res) => {
            console.log(res);
        },
        processData: false,
    })
});