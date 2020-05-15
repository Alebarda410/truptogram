ymaps.ready(init);
var myMap, myPlacemark, coords;
function rabotai_padla() {
    document.getElementsByName('location')[0].value = coords;

}

function clear_map() {
    myMap.geoObjects.removeAll();
}

function init() {
    myMap = new ymaps.Map('map', {
        center: [55.753994, 37.622093],
        zoom: 9
    }, {
        searchControlProvider: 'yandex#search'
    });

    // Слушаем клик на карте.
    myMap.events.add('click', function (e) {
        coords = e.get('coords');

        // Если метка уже создана – просто передвигаем ее.
        if (myPlacemark) {
            myPlacemark.geometry.setCoordinates(coords);
        }
        // Если нет – создаем.
        else {
            myPlacemark = createPlacemark(coords);
            myMap.geoObjects.add(myPlacemark);
            // Слушаем событие окончания перетаскивания на метке.
            myPlacemark.events.add('dragend', function () {
                getAddress(myPlacemark.geometry.getCoordinates());
            });
        }
        document.getElementsByName('location')[0].value = coords;
        getAddress(coords);
    });

    // Создание метки.
    function createPlacemark(coords) {
        return new ymaps.Placemark(coords, {
            iconCaption: 'поиск...'
        }, {
            preset: 'islands#violetDotIconWithCaption',
            draggable: true
        });
    }

    // Определяем адрес по координатам (обратное геокодирование).
    function getAddress(coords) {
        myPlacemark.properties.set('iconCaption', 'поиск...');
        ymaps.geocode(coords).then(function (res) {
            var firstGeoObject = res.geoObjects.get(0);

            myPlacemark.properties
                .set({
                    // Формируем строку с данными об объекте.
                    iconCaption: [
                        // Название населенного пункта или вышестоящее административно-территориальное образование.
                        firstGeoObject.getLocalities().length ? firstGeoObject.getLocalities() : firstGeoObject.getAdministrativeAreas(),
                        // Получаем путь до топонима, если метод вернул null, запрашиваем наименование здания.
                        firstGeoObject.getThoroughfare() || firstGeoObject.getPremise()
                    ].filter(Boolean).join(', '),
                    // В качестве контента балуна задаем строку с адресом объекта.
                    balloonContent: firstGeoObject.getAddressLine()
                });
        });
    }
}
function mes(){
    if (document.getElementsByName('location')[0].value.length == 0) {
        $('.msg').html("Выберите место!");
        $('form').css('padding-bottom', '33px');
    }
}
$('form').submit(function (event) {
    event.preventDefault();
    var formNm = $('form')[0];
    var formData = new FormData(formNm);
    $.ajax({
        type: 'POST',
        url: 'links/added_cours.php',
        enctype: 'multipart/form-data',
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data) {
            $('.msg').html(data);
            $('form').css('padding-bottom', '33px');
        }
    });
});
$('[value = 1]').click(function () {
    $('.wrap_map').hide(100);
    document.getElementsByName('location')[0].value = null;
    $('.wrap_text').show(100);
});

$('[value = 0]').click(function () {
    $('.wrap_text').hide(100);
    document.getElementsByName('location')[0].value = null;
    $('.wrap_map').show(100);
});