/**
 * Created by erlan on 5/27/17.
 */

$(document).ready(function () {
    var loginForm = $('#login-form');

    $(loginForm).on('submit', function (event) {
        event.preventDefault();
        var that = this;
        var url = $(that).attr('action');
        var modal = $('#login-result-modal');
        var modalTitle = $(modal).find('.modal-title');
        var modalBody = $(modal).find('.login-result-modal-body');
        $.ajax({
            url: url,
            dataType: 'JSON',
            method: 'POST',
            data: $(that).serialize(),
            success: function (response) {
                console.log(response);
                if (response.result) {
                    document.location.reload();
                } else {
                    $(modalTitle).html('Ошибка!');
                    $(modalBody).html(response.reason);
                    $(modal).modal('show');
                }
            },
            error: function () {
                $(modalTitle).html('Ошибка!');
                $(modalBody).html('Произошла неизвестная ошибка!');
                $(modal).modal('show');
            }
        });
    });
});
