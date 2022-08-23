let windowsize = $(window).width();
if (windowsize < 769) {
    $('#illustration-col').css('display', 'none');
}
else {
    $('.illustration-col').css('display', 'block');
}