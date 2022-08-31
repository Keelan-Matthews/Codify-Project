const eventCard = ({ name, date, location, image, profile }) => `
    <div class="p-3 col-12 col-md-6 col-lg-4">
        <div class="card lighter-gray shadow rounded event-card">
            <div class="d-flex p-3">
                <img src="${profile}" class="rounded-circle me-3" width="50" height="50">
                <div class="text-white">
                    <h5 class="my-0">${name}</h5>
                    <small>${location}</small>
                </div>
            </div>
            <img src="${image}" alt="${name}" class="my-2 w-100">
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
            $('.events').html(res.map(eventCard).join(''));
        },
        error: () => {
            console.log('error');
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
    if (!checkInputs()) {
        e.preventDefault()
        $('#createEvent').modal('show');
    }
});

const checkInputs = () => {
    const eventName = $('#eventName').value.trim();
    const eventDate = $('#eventDate').value.trim();
    const eventLocation = $('#eventLocation').value.trim();
    const eventImg = $('#eventImg').value.trim();
    const eventCategory = $('#eventCategory').value.trim();
    const eventDescription = $('#eventDescription').value.trim();

    let valid = true;

    let nameErrorMessage = '';

    if(eventName === '') {
        nameErrorMessage = 'Event name is required';
    } else if(nameValue.length > 30) 
        nameErrorMessage = 'Event name must be less than 30 characters';

    setValidity($('#eventName'), nameErrorMessage);

    let dateErrorMessage = '';
    if(eventDate === '') {
        dateErrorMessage = 'Event date is required';
    }
    setValidity($('#eventDate'), dateErrorMessage);

    let locationErrorMessage = '';
    if(eventLocation === '') {
        locationErrorMessage = 'Event location is required';
    }
    else if(eventLocation.length > 20) {
        locationErrorMessage = 'Event location must be less than 20 characters';
    }
    setValidity($('#eventLocation'), locationErrorMessage);

    let imgErrorMessage = '';
    if(eventImg === '') {
        imgErrorMessage = 'Event image is required';
    }
    setValidity($('#eventImg'), imgErrorMessage);

    let categoryErrorMessage = '';
    if(eventCategory === '') {
        categoryErrorMessage = 'Event category is required';
    }
    setValidity($('#eventCategory'), categoryErrorMessage);

    let descriptionErrorMessage = '';
    if(eventDescription === '') {
        descriptionErrorMessage = 'Event description is required';
    }

    setValidity($('#eventDescription'), descriptionErrorMessage);

    return valid;
}

const setErrorFor = (input, message) => {
    const small = $(input).siblings('small');

    small.innerText = message;
    $(input).className = 'form-control is-invalid';
}

const setSuccessFor = input => {
    $(input).className = 'form-control is-valid';
}

const setValidity = (input, message) => {
    if (message) {
        setErrorFor(input, message);
        valid = false;
    }
    else setSuccessFor(input);
}