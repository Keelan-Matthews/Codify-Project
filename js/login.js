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

$('form').submit((e) => { if (!checkInputs()) e.preventDefault()});

const checkInputs = () => {
    const usernameValue = $('#usernameInput').value.trim();
    const emailValue = $('#emailInput').value.trim();
    const passwordValue = $('#passwordInput').value.trim();
    let valid = true;

    let usernameerrorMessage = '';

    if(usernameValue === '') {
        usernameerrorMessage = 'Username is required';
    } else if(nameValue.length > 20) {
        usernameerrorMessage = 'Username must be less than 20 characters';
    } else if (!isUsername(nameValue)) {
        usernameerrorMessage = 'Can only contain lowercase characters and numbers';
    }

    setValidity($('#usernameInput'), usernameerrorMessage);

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
    $(input).parent().className = 'form-group w-100 position-relative pb-4 error';
}

const setSuccessFor = input => {
    $(input).parent().className = 'form-group w-100 position-relative pb-4 success';
}

const isEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return email.toLowerCase().match(re);
}

const isStrongPassword = password => {
    const re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;
    return password.match(re);
}

const isUsername = word => {
    return /^[a-z0-9]+$/.test(word);
}

const setValidity = (input, message) => {
    if (message) {
        setErrorFor(input, message);
        valid = false;
    }
    else setSuccessFor(input);
}