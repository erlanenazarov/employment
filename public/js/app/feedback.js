/**
 * Created by erlan on 5/28/17.
 */

$(document).ready(function () {
    var feedbackForm = $('#contact-form');
    $(feedbackForm).on('submit', function (e) {
        e.preventDefault();
        var modal = $('#login-result-modal');
        var modalTitle = $(modal).find('.modal-title');
        var modalBody = $(modal).find('.login-result-modal-body');
        var data = $(this).serialize();
        var url = $(this).attr('action');
        var button = $('#send-feedback');
        $(button).attr('disabled', true);
        $.ajax({
            url: url,
            method: 'POST',
            dataType: 'JSON',
            data: data,
            success: function (response) {
                if(response.success) {
                    $(modalTitle).html('Благодарим за заявку');
                    $(modalBody).html('В скором времени с вами свяжутся!<br>Мы отправили копию письма на важу почту, чтобы вы не забывали что вы написали!');
                    $(modal).modal('show');
                } else {
                    $(modalTitle).html('Ошибка!');
                    $(modalBody).html(response.message);
                    $(modal).modal('show');
                }
                $(button).removeAttr('disabled');
            },
            error: function () {
                $(modalTitle).html('Ошибка!');
                $(modalBody).html('Произошла неизвестная ошибка, попробуйте позже');
                $(modal).modal('show');
                $(button).removeAttr('disabled');
            }
        });
    });
});
