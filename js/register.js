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
                "type": "register",
                "email": $('#emailInput').val().trim(),
                "password": $('#passwordInput').val().trim(),
                "username": $('#usernameInput').val()
            }),
            url: 'api.php',
            type: 'POST',
            success: (res) => {
                $(window).attr('location', 'dashboard.php');
            },
            error: (res) => {
                let errMessage = $.parseJSON(res.responseText).data.message;
                if (errMessage == "Email already exists") {
                    setErrorFor($('#emailInput'), errMessage);
                }
            },
            processData: false,
        })
    }
});

const checkInputs = () => {
    const usernameValue = $('#usernameInput').val().trim();
    const emailValue = $('#emailInput').val().trim();
    const passwordValue = $('#passwordInput').val().trim();
    let valid = true;

    let usernameerrorMessage = '';

    if(usernameValue === '') {
        usernameerrorMessage = 'Username is required';
    } else if(usernameValue.length > 20) {
        usernameerrorMessage = 'Username must be less than 20 characters';
    } else if (!isUsername(usernameValue)) {
        usernameerrorMessage = 'Can only contain lowercase characters and numbers';
    }

     if (!setValidity($('#usernameInput'), usernameerrorMessage)) valid = false;

    let emailerrorMessage = '';

    if(emailValue === '') 
        emailerrorMessage = 'Email cannot be blank';
    else if (!isEmail(emailValue)) 
        emailerrorMessage = 'Email is not valid';

    if (!setValidity($('#emailInput'), emailerrorMessage)) valid = false;

    let passworderrorMessage = '';

    if(passwordValue === '')
        passworderrorMessage = 'Password cannot be blank';
    else if (passwordValue.length < 8) 
        passworderrorMessage = 'Password must be at least 8 characters long';
    else if (!isStrongPassword(passwordValue)) 
        passworderrorMessage = 'Must contain characters, digits and special characters';

    if (!setValidity($('#passwordInput'), passworderrorMessage)) valid = false;

    return valid;
}

const isEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return email.toLowerCase().match(re);
}

const isStrongPassword = password => {
    const re = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
    return password.match(re);
}

const isUsername = word => {
    return /^[a-z0-9]+$/.test(word);
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