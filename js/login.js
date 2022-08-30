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

$('form').submit((e) => checkInputs() || e.preventDefault());

const checkInputs = () => {
    const emailValue = $('#emailInput').value.trim();
    const passwordValue = $('#passwordInput').value.trim();
    let valid = true;

    // if(nameValue === '') {
    //     setErrorFor(iName, 'Name cannot be blank');
    //     valid = false;
    // } else if(nameValue.length > 20) {
    //     setErrorFor(iName, 'Cannot be longer than 20 characters');
    //     valid = false;
    // } else if (!isWord(nameValue)) {
    //     setErrorFor(iName, 'Can only contain characters');
    //     valid = false;
    // } else {
    //     setSuccessFor(iName);
    // }

    // if(surnameValue === '') {
    //     setErrorFor(surname, 'Surname cannot be blank');
    //     valid = false;
    // } else if (!isWord(surnameValue)) {
    //     setErrorFor(surname, 'Can only contain characters');
    //     valid = false;
    // } else if (surnameValue.length > 30) {
    //     setErrorFor(surname, 'Cannot be longer than 30 characters');
    //     valid = false;
    // } else {
    //     setSuccessFor(surname);
    // }

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

const isWord = word => {
    return /^[a-zA-Z]+$/.test(word);
}

const setValidity = (input, message) => {
    if (message) {
        setErrorFor(input, message);
        valid = false;
    }
    else setSuccessFor(input);
}