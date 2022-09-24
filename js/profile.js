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

const eventCard = ({ name, date, location, image, profile_photo, event_id }) => `
    <div class="p-3 col-12 col-md-6 col-lg-4">
        <div class="card lighter-gray shadow rounded event-card" id="${event_id}">
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

const eventTag = (tag_name) => `
    <div class="p-2 rounded bg-dark me-2">
        <small><span class="fw-bold"># </span>${tag_name}</small>
    </div>
`;

const populateUserEvents = () => {

    $.ajax({
        contentType: 'application/json',
        data: JSON.stringify({
            "type": "user-events",
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