<div class="modal fade" tabindex="-1" role="dialog" id="login-result-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p class="login-result-modal-body"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="register">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="/authentication/register" id="register-form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Регистрация</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="register-login">Логин</label>
                        <input type="text" class="form-control" id="register-login" placeholder="Логин" name="login" required>
                    </div>
                    <div class="form-group">
                        <label for="password1">Пароль</label>
                        <input type="password" class="form-control" id="password1" placeholder="Пароль" name="password1" required>
                    </div>
                    <div class="form-group">
                        <label for="password2">Повторите пароль</label>
                        <input type="password" class="form-control" id="password2" placeholder="Повторите пароль" name="password2" required>
                    </div>
                    <div class="form-group">
                        <label for="register-role">Зарегистрироваться как</label>
                        <select name="role" class="form-control" id="register-role" required>
                            <option value>Выберите из списка</option>
                            <option value="employer">Работодатель</option>
                            <option value="employee">Соискатель</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="register-employer-modal" tabindex="-1" role="dialog" aria-labelledby="register">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="/authentication/register_employer" id="register-employer-form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Давайте продолжим регистрацию</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="register-organization">Название организации</label>
                        <input type="text" class="form-control" id="register-organization" placeholder="Название оргонизации" name="organization" required>
                    </div>
                    <div class="form-group">
                        <label for="register-address">Адрес офиса</label>
                        <input type="text" class="form-control" id="register-address" placeholder="Адрес офиса" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="register-phone">Телефон</label>
                        <input type="text" class="form-control" id="register-phone" placeholder="+7 9** *** ** **" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="register-email">Email</label>
                        <input type="email" class="form-control" id="register-email" placeholder="mail@example.com" name="email" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="register-employee-modal" tabindex="-1" role="dialog" aria-labelledby="register">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="/authentication/register_employee" id="register-employee-form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Давайте продолжим регистрацию</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="register-name">ФИО</label>
                        <input type="text" class="form-control" id="register-name" placeholder="Фио" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="register-birthday">Дата рождения</label>
                        <input type="text" class="form-control" id="register-birthday" placeholder="Дата рождения" name="birthday" required>
                    </div>
                    <div class="form-group">
                        <label for="register-phone">Телефон</label>
                        <input type="text" class="form-control" id="register-phone" placeholder="+7 9** *** ** **" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="register-education">Образование</label>
                        <input type="text" class="form-control" id="register-education" placeholder="Образование" name="education" required>
                    </div>
                    <div class="form-group">
                        <label for="register-experience">Опыт работы</label>
                        <input type="text" class="form-control" id="register-experience" placeholder="Опыт" name="experience" required>
                    </div>
                    <div class="form-group">
                        <label for="register-speciality">Специальность</label>
                        <select id="register-speciality" name="speciality" class="form-control" required>
                            <option value>Выберите из списка</option>
                            <?php foreach($data['specialities'] as $sp): ?>
                                <option value="<?php echo($sp['id']); ?>"><?php echo($sp['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="register-sphere">Сфера деятельности</label>
                        <select id="register-sphere" name="sphere" class="form-control" required>
                            <option value>Выберите из списка</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if(Security::getInstance()->isAuth() && Security::getInstance()->getUser()['role'] == 'employer'): ?>
    <div class="modal fade" id="create-vacancy-modal" tabindex="-1" role="dialog" aria-labelledby="createVacancy">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="/vacancy/create" id="create-vacancy-form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Добавьте свою вакансию</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="vacancy-title">Название</label>
                            <input type="text" class="form-control" id="vacancy-title" placeholder="Например: Требуется PHP программист" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="vacancy-work-time">График работы</label>
                            <input type="text" class="form-control" id="vacancy-work-time" placeholder="Например: Полный, частичный" name="work_time" required>
                        </div>
                        <div class="form-group">
                            <label for="vacancy-price">Зар. плата</label>
                            <input type="number" class="form-control" id="vacancy-price" placeholder="Например: 90 000" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="vacancy-count">Количество свободных мест</label>
                            <input type="number" class="form-control" id="vacancy-count" placeholder="Например: 2" name="work_place_count" required>
                        </div>
                        <div class="form-group">
                            <label for="vacancy-category">Категория</label>
                            <select class="form-control" id="vacancy-category" name="category" required="">
                                <option value>Выберите из списка</option>
                                <?php echo($data['vacancy_categories']); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="vacancy-requirements">Требования к соискателю</label>
                            <textarea rows="7" class="form-control" id="vacancy-requirements" placeholder="Например: Высшее образование" name="requirements" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="vacancy-description">Описание вакансии</label>
                            <textarea rows="10" id="vacancy-description" name="description" class="form-control" placeholder="Опишите всё что вы хотите от соискателя" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>

