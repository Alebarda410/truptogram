$('form').submit(function (event) {
    event.preventDefault();
    $.post('links/add_rem_cours_to_user.php', $('form').serialize(),
        function (data) {
            if (data == 'zap') {
                $('#bt').html('Отписаться');
                $('input[value="zap"]').attr('value', 'otp');
            }
            if (data == 'otp') {
                $('#bt').html('Записаться');
                $('input[value="otp"]').attr('value', 'zap');
            }
        }
    );
});