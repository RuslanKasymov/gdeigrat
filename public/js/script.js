$(function () {
    $('#follow-form').submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: '/follow',
            type: 'post',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (_response) {
                $('#follow-button').html(_response['follow_message']);
                $("#success-alert").find('.success-message').html(_response['message']);
                $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
                    $("#success-alert").slideUp(500);
                });
            },
            error: function (_response) {
                $("#danger-alert").find('.danger-message').html("Непредвиденная ошибка, попробуйте позже.");
                $("#danger-alert").fadeTo(2000, 500).slideUp(500, function(){
                    $("#danger-alert").slideUp(500);
                });
            }
        });
    });
});