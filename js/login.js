$(document).ready(() => resize());
$(window).resize(() => resize());

const resize = () => {
    let windowsize = $(window).width();

    if (windowsize < 769) {
        $('#illustration-col').css('display', 'none');
    }
    else {
        $('#illustration-col').css('display', 'block');
    }
}

$('form').submit((e) => { 
    e.preventDefault();
    if (!checkInputs()) 
        console.log("There was an error");
    else {
        $.ajax({
            contentType: 'application/json',
            data: JSON.stringify({
                "type": "login",
                "email": $('#emailInput').val().trim(),
                "password": $('#passwordInput').val().trim()
            }),
            url: 'api.php',
            type: 'POST',
            success: (res) => {
                $(window).attr('location', 'dashboard.php');
            },
            error: () => {
                console.log('An error occurred during the api call');
            },
            processData: false,
        })
    }
});

const checkInputs = () => {
    const emailValue = $('#emailInput').val().trim();
    const passwordValue = $('#passwordInput').val().trim();

    let valid = true;

    let emailerrorMessage = '';

    if(emailValue === '') 
        emailerrorMessage = 'Email cannot be blank';
    else if (!isEmail(emailValue)) 
        emailerrorMessage = 'Email is not valid';

    setValidity($('#emailInput'), emailerrorMessage);

    let passworderrorMessage = '';

    if(passwordValue === '')
        passworderrorMessage = 'Password cannot be blank';
    else if (passwordValue.length < 8) 
        passworderrorMessage = 'Password must be at least 8 characters long';
    else if (!isStrongPassword(passwordValue)) 
        passworderrorMessage = 'Must contain characters, digits and special characters';

    setValidity($('#passwordInput'), passworderrorMessage);

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

const isEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return email.toLowerCase().match(re);
}

const isStrongPassword = password => {
    const re = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
    return password.match(re);
}

const setValidity = (input, message) => {
    if (message) {
        setErrorFor(input, message);
        valid = false;
    }
    else setSuccessFor(input);
}