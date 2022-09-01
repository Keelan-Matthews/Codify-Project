const eventCard = ({ name, date, location, image, profile_photo }) => `
    <div class="p-3 col-12 col-md-6 col-lg-4">
        <div class="card lighter-gray shadow rounded event-card">
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

            res.map(event => {
                if (event.profile_photo === "") {
                    event.profile_photo = 'media/profile_photos/default.jpg';
                }
            })
            $('.events').html(res.map(eventCard).join(''));
        },
        error: () => {
            console.log('An error has occurred whilst loading events');
        },
        processData: false,
    })
}

$(document).ready(() => {
    populateHomeEvents();
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
    
        $.ajax({
            url: 'api.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: () => {
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

    console.log(eventName, eventDate, eventLocation, eventImg, eventCategory, eventDescription);

    let valid = true;

    let nameErrorMessage = '';

    if(eventName === '') {
        nameErrorMessage = 'Event name is required';
    } else if(eventName.length > 30) 
        nameErrorMessage = 'Event name must be less than 30 characters';

    if (!setValidity($('#eventName'), nameErrorMessage)) valid = false;

    let dateErrorMessage = '';
    if(eventDate === undefined) {
        dateErrorMessage = 'Event date is required';
    }

    if (!setValidity($('#eventDate'), dateErrorMessage)) valid = false;

    let locationErrorMessage = '';
    if(eventLocation === '') {
        locationErrorMessage = 'Event location is required';
    }
    else if(eventLocation.length > 20) {
        locationErrorMessage = 'Event location must be less than 20 characters';
    }

    if (!setValidity($('#eventLocation'), locationErrorMessage)) valid = false;

    let imgErrorMessage = '';
    if(eventImg === 0) {
        imgErrorMessage = 'Event image is required';
    }

    if (!setValidity($('#eventImage'), imgErrorMessage)) valid = false;

    let categoryErrorMessage = '';
    if(eventCategory === 'Select Category') {
        categoryErrorMessage = 'Event category is required';
    }

    if (!setValidity($('#eventCategory'), categoryErrorMessage)) valid = false;

    let descriptionErrorMessage = '';
    if(eventDescription === '') {
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
    else 
    {
        setSuccessFor(input);
        return true;
    }
}