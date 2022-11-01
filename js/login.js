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
                if (res.status === 'failed')
                    $(window).attr('location', `login.php?error=${res.data.message}`);
                else
                    $(window).attr('location', 'dashboard.php');
            },
            error: () => {
                console.log('An error occurred');
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

    if (emailValue === '')
        emailerrorMessage = 'Email cannot be blank';
    else if (!isEmail(emailValue))
        emailerrorMessage = 'Email is not valid';

    if (!setValidity($('#emailInput'), emailerrorMessage)) valid = false;

    let passworderrorMessage = '';

    if (passwordValue === '')
        passworderrorMessage = 'Password cannot be blank';

    if (!setValidity($('#passwordInput'), passworderrorMessage)) valid = false;

    return valid;
}

const isEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return email.toLowerCase().match(re);
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