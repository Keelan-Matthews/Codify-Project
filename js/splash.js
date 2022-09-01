$(document).ready(() => resize());
$(window).resize(() => resize());

const resize = () => {
    let windowsize = $(window).width();

    if (windowsize < 769) {
        $('#code-container').css('display', 'none');
        $('.circle-background').css({'border-radius': '0 0 150px 0','height': '60vh'});
    }
    else {
        $('#code-container').css('display', 'block');
        $('.circle-background').css({'border-radius': '0 0 0 0','height': '100vh'});
    }
}