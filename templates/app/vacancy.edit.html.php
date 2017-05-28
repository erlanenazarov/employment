<div class="vacancy-single" style="margin-top: 40px;">
    <div class="row">
        <form method="POST" id="edit-vacancy-form">
            <div class="container">
                <div class="title" style="text-align: center;"><h1><input type="text" placeholder="Название" class="form-control" name="title" value="<?php echo($data['job']['title']); ?>"></h1></div>
                <div class="row">
                    <div class="col-md-3">
                        <table>
                            <tbody>
                            <tr>
                                <td>Название организации</td>
                                <td><?php echo($data['employer']['organization']); ?></td>
                            </tr>
                            <tr>
                                <td>Зароботная плата</td>
                                <td><input type="text" placeholder="Зар. плата" value="<?php echo($data['job']['price']); ?>" class="form-control" name="price"></td>
                            </tr>
                            <tr>
                                <td>График работы</td>
                                <td><input type="text" placeholder="График работы" value="<?php echo($data['job']['work_time']); ?>" class="form-control" name="work_time"></td>
                            </tr>
                            <tr>
                                <td>Количество свободных мест</td>
                                <td><input type="text" placeholder="Количество свободных мест" value="<?php echo($data['job']['work_place_count']); ?>" class="form-control" name="work_place_count"></td>
                            </tr>
                            <tr>
                                <td>Адрес</td>
                                <td><?php echo($data['employer']['address']); ?></td>
                            </tr>
                            <tr>
                                <td>Почта</td>
                                <td><?php echo($data['employer']['email']); ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-9">
                        <?php if(isset($data['message'])): ?>
                            <div class="alert alert-success">
                                <?php echo($data['message']); ?>
                            </div>
                        <?php endif; ?>
                        <p class="help-block">Вы можете использовать HTML теги для того что бы добиться красоты в вашем описании. Сайт использует Bootstrap, не стесняйтесь пользуйтесь нашими классами)</p>
                        <div class="vacancy-description">
                            <h3>Требования</h3>
                            <p><textarea placeholder="Требования" name="requirements" class="form-control" rows="15"><?php echo($data['job']['requirements']); ?></textarea></p>
                        </div>
                        <div class="vacancy-description">
                            <h3>Описание</h3>
                            <p><textarea placeholder="Описание" name="description" class="form-control" rows="15"><?php echo($data['job']['description']); ?></textarea></p>
                        </div>
                        <button type="submit" class="btn btn-secondary">Сохранить</button>&nbsp;&nbsp;<a href="/vacancy/single/?id=<?php echo($data['job']['id']) ?>" class="btn btn-secondary">Перейти на страницу вакансии</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>