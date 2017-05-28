<div class="search">
    <div class="row">
        <div class="container">
            <div class="wrapper" style="height: 50px; margin-top: 40px;">
                <form action="/vacancy/search/" class="form-inline" style="display: flex; justify-content: space-between; flex-direction: row; align-items: center; align-content: stretch;">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="exampleInputName2" placeholder="Название вакансии" name="title" style="width: 100%; height: 100%;" value="<?php echo(isset($_GET['title']) ? $_GET['title'] : ''); ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <input type="number" class="form-control" id="exampleInputEmail2" placeholder="Зарплата от" name="price" style="width: 100%; height: 100%;" value="<?php echo(isset($_GET['price']) ? $_GET['price'] : ''); ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label>
                            <select class="form-control" name="category" style="width: 160px;">
                                <option value>Категория</option>
                                <?php echo($data['vacancy_categories']); ?>
                            </select>
                        </label>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-secondary">Найти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row table-row">
        <div class="container">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Наименование</th>
                    <th>Зарплата</th>
                    <th>Категория</th>
                    <th>Дата</th>
                </tr>
                </thead>
                <tbody>
                <?php if(sizeof($data['jobs']) > 0): ?>
                    <?php foreach($data['jobs'] as $item): ?>
                        <tr>
                            <td><?php echo($item['id']); ?></td>
                            <td><a href="/vacancy/single/?id=<?php echo($item['id']); ?>"><?php echo($item['title']); ?></a></td>
                            <td><?php echo($item['price']); ?></td>
                            <td><?php echo($item['category']); ?></td>
                            <td><?php echo($item['created_at']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Нет ещё не одной свободной вокансии...<?php if(Security::getInstance()->isAuth()) { if(Security::getInstance()->getUser()['role'] == 'employer') echo('<a href="#" data-toggle="modal" data-target="#create-vacancy-modal">Почему бы вам не разместить свою?</a>'); } ?></td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
            <ul class="pagination">
                <?php foreach($data['num_pages'] as $page): ?>
                    <li <?php if($page == $_GET['page']): ?>class="active"<?php endif; ?>><a href="?page=<?php echo($page); ?>"><?php echo($page); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>