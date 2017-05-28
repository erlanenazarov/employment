<div class="vacancy-single" style="margin-top: 40px;">
    <div class="row">
        <div class="container">
            <div class="title" style="text-align: center;"><h1><?php echo($data['job']['title']); ?></h1></div>
            <div class="row">
                <ul class="bread-crumbs">
                    <li><a href="/">Главная</a><span><i class="fa fa-angle-right"></i></span></li>
                    <li><a href="/vacancy/search/?category=<?php echo($data['job']['category']); ?>"><?php $ent = new Category();  echo($ent->getObjects('title', array('id' => $data['job']['category']))[0]['title']); ?></a><span><i class="fa fa-angle-right"></i></span></li>
                    <li class="active"><?php echo($data['job']['title']); ?></li>
                </ul>
            </div>
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
                            <td><?php echo($data['job']['price']); ?></td>
                        </tr>
                        <tr>
                            <td>График работы</td>
                            <td><?php echo($data['job']['work_time']); ?></td>
                        </tr>
                        <tr>
                            <td>Количество свободных мест</td>
                            <td><?php echo($data['job']['work_place_count']); ?></td>
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
                    <div class="vacancy-description">
                        <h3>Требования</h3>
                        <p><?php echo(htmlspecialchars_decode(stripslashes($data['job']['requirements']))); ?></p>
                    </div>
                    <div class="vacancy-description">
                        <h3>Описание</h3>
                        <p><?php echo(htmlspecialchars_decode(stripslashes($data['job']['description']))); ?></p>
                    </div>
                    <a href="#" class="btn btn-secondary">Подать резюме</a>
                    <?php if(Security::getInstance()->isAuth() && Security::getInstance()->getUser()['id'] == $data['employer']['id']): ?>
                        <a href="/vacancy/edit/?id=<?php echo($data['job']['id']); ?>" class="btn btn-primary" style="margin: 0;">Редактировать</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>