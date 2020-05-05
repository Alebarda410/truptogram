$(document).ready(function () {

    var inProgress = false;
    var startFrom = 10;

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
                            $('[class = cont]').append('<div class="cours">' + '<img width="150px" src="' + data[i].logo + '" alt="logo">' + '<div class="description"><a href="cours.php?id=' + data[i].id + '" class="zag">' + data[i].topic + '</a>' + '<div class="text">' + data[i].overview + '<a href="cours.php?id=' + data[i].id + '">Подробнее...</a></div></div></div>');
                        }
                        inProgress = false;
                        startFrom += 10;
                    }
                }
            });
        }
    });
});