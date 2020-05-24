$(document).ready(function () {

    var btn = $('#back');

    btn.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, '300');
    });

    $(window).scroll(function () {
        if ($(window).scrollTop() > 150) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });
});