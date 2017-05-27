/**
 * Created by erlan on 5/27/17.
 */

function registerAsEmployer(registerModal) {
    var registerEmployerModal = $('#register-employer-modal');
    var employerForm = $('#register-employer-form');
    if (registerModal != null) {
        $(registerModal).modal('hide');
    }
    $(registerEmployerModal).modal('show');
    $(employerForm).on('submit', function (e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var data = $(this).serialize();
        $.ajax({
            url: url,
            method: 'POST',
            dataType: 'JSON',
            data: data,
            success: function (response) {
                console.log(response);
                var resultModal = $('#login-result-modal');
                var modalTitle = $(resultModal).find('.modal-title');
                var modalBody = $(resultModal).find('.login-result-modal-body');
                if (response.success) {
                    $(registerEmployerModal).modal('hide');
                    $(modalTitle).html('Доюро пожаловать на сайт');
                    $(modalBody).html('Теперь вы можете разместить свою вакансию!<br> Внимание! Эта страница перезагрузится через 5 секунды!');
                    $(resultModal).modal('show');
                    setTimeout(function () {
                        document.location.reload();
                    }, 5000);
                } else {
                    $(registerEmployerModal).modal('hide');
                    $(modalTitle).html('Ошибка');
                    $(modalBody).html(response.message);
                    $(resultModal).modal('show');
                }
            },
            error: function () {
                $(registerEmployerModal).modal('hide');
                var modal = $('#login-result-modal');
                var modalTitle = $(modal).find('.modal-title');
                var modalBody = $(modal).find('.login-result-modal-body');
                $(modalTitle).html('Ошибка!');
                $(modalBody).html('Произошла неизвестная ошибка, попробуйте позже');
                $(modal).modal('show');
            }
        });
    });
}

var counter = 0;
function getSphereBySpeciality(id, selector) {
    counter++;
    if (counter > 5) {
        return;
    }
    $.ajax({
        url: '/index/get_sphere_by_speciality',
        method: 'POST',
        dataType: 'JSON',
        data: {'speciality': id},
        success: function (response) {
            if (response.success) {
                $(selector).html(response.items);
            } else {
                getSphereBySpeciality(id, selector);
            }
        },
        error: function () {
            getSphereBySpeciality(id, selector);
        }
    });
}

function registerAsEmployee(registerModal) {
    var registerEmployeeModal = $('#register-employee-modal');
    var employeeForm = $('#register-employee-form');
    if (registerModal != null) {
        $(registerModal).modal('hide');
    }
    $(registerEmployeeModal).modal('show');
    var sphereSelector = $(registerEmployeeModal).find('#register-sphere');
    var specialitySelector = $(registerEmployeeModal).find('#register-speciality');

    $(specialitySelector).on('change', function (e) {
        if ($(this).val() != '') {
            getSphereBySpeciality($(this).val(), sphereSelector);
        }
    });
    $(employeeForm).on('submit', function (e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var data = $(this).serialize();
        $.ajax({
            url: url,
            method: 'POST',
            dataType: 'JSON',
            data: data,
            success: function (response) {
                console.log(response);
                var resultModal = $('#login-result-modal');
                var modalTitle = $(resultModal).find('.modal-title');
                var modalBody = $(resultModal).find('.login-result-modal-body');
                if (response.success) {
                    $(registerEmployeeModal).modal('hide');
                    $(modalTitle).html('Доюро пожаловать на сайт');
                    $(modalBody).html('Теперь вы можете подать своё резюме на свободные вакансии<br> Внимание! Эта страница перезагрузится через 2 секунды!');
                    $(resultModal).modal('show');
                    setTimeout(function () {
                        document.location.reload();
                    }, 2000);
                } else {
                    $(registerEmployeeModal).modal('hide');
                    $(modalTitle).html('Ошибка!');
                    $(modalBody).html(response.message);
                    $(resultModal).modal('show');
                }
            },
            error: function () {
                $(registerEmployeeModal).modal('hide');
                var modal = $('#login-result-modal');
                var modalTitle = $(modal).find('.modal-title');
                var modalBody = $(modal).find('.login-result-modal-body');
                $(modalTitle).html('Ошибка!');
                $(modalBody).html('Произошла неизвестная ошибка, попробуйте позже');
                $(modal).modal('show');
            }
        });
    });
}

$(document).ready(function () {
    var registerModal = $('#register-modal');
    var registerForm = $('#register-form');

    $(registerForm).on('submit', function (event) {
        event.preventDefault();
        var url = $(this).attr('action');
        var formData = $(this).serialize();
        $.ajax({
            url: url,
            method: 'POST',
            dataType: 'JSON',
            data: formData,
            success: function (response) {
                console.log(response);
                if (response.success) {
                    var role = response.role;
                    switch (role) {
                        case 'employer':
                            registerAsEmployer(registerModal);
                            break;
                        case 'employee':
                            registerAsEmployee(registerModal);
                            break;
                    }
                } else {
                    $(registerModal).modal('hide');
                    var modal = $('#login-result-modal');
                    var modalTitle = $(modal).find('.modal-title');
                    var modalBody = $(modal).find('.login-result-modal-body');
                    $(modalTitle).html('Ошибка!');
                    $(modalBody).html(response.message);
                    $(modal).modal('show');
                }
            },
            error: function () {
                $(registerModal).modal('hide');
                var modal = $('#login-result-modal');
                var modalTitle = $(modal).find('.modal-title');
                var modalBody = $(modal).find('.login-result-modal-body');
                $(modalTitle).html('Ошибка!');
                $(modalBody).html('Произошла неизвестная ошибка, попробуйте позже');
                $(modal).modal('show');
            }
        });
    });
});