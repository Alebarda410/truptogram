$(document).ready(function () {

    var inProgress = false;
    var startFrom = 10;
    var btn = $('#back');

    btn.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, '300');
    });

    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 200 && !inProgress) {
            $.ajax({
                url: 'links/ajax.items.php',
                type: 'POST',
                data: {
                    'start': startFrom
                },
                beforeSend: function () {
                    inProgress = true;
                },
                success: function (data) {
                    data = jQuery.parseJSON(data);
                    if (data.length > 0) {
                        for (let i = data.length - 1; i >= 0; i--) {
                            $('[class = cont]').append('<div class="cours">' + '<a href="cours.php?id=' + data[i].id + '">'+'<img width="150px" src="' + data[i].logo + '" alt="logo">'+ '</a>' + '<div class="description"><a href="cours.php?id=' + data[i].id + '" class="zag">' + data[i].topic + '</a>' + '<div class="text">' + data[i].overview + '<a href="cours.php?id=' + data[i].id + '">Подробнее...</a></div></div></div>');
                        }
                        inProgress = false;
                        startFrom += 10;
                    }
                }
            });
        }
        if ($(window).scrollTop() > 150) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });
});