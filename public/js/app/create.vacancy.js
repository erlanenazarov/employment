/**
 * Created by erlan on 5/28/17.
 */

$(document).ready(function () {
    var v_modal = $('#create-vacancy-modal');
    var v_form = $('#create-vacancy-form');

    $(v_form).on('submit', function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var url = $(this).attr('action');

        var modal = $('#login-result-modal');
        var modalTitle = $(modal).find('.modal-title');
        var modalBody = $(modal).find('.login-result-modal-body');
        $.ajax({
            url: url,
            method: 'POST',
            dataType: 'JSON',
            data: formData,
            success: function(response) {
                if(response.success) {
                    $(v_modal).modal('hide');
                    $(modalTitle).html('Успех!');
                    $(modalBody).html('Поздравляем вакансия добавлена!<br>Внимание вы будете перенаправлены на страницу вакансии через 6 секунд!');
                    $(modal).modal('show');
                    setTimeout(function () {
                        document.location.href = response.url;
                    }, 6000);
                } else {
                    $(v_modal).modal('hide');
                    $(modalTitle).html('Ошибка!');
                    $(modalBody).html(response.message);
                    $(modal).modal('show');
                }
            },
            error: function () {
                $(v_modal).modal('hide');
                $(modalTitle).html('Ошибка!');
                $(modalBody).html('Произошла неизвестная ошибка, попробуйте позже');
                $(modal).modal('show');
            }
        });
    });
});