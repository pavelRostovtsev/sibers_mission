<div class="container mt-3 mb-3">
    <div class="row justify-content-md-center">
       <h3>Список всех пользователей</h3>
    </div>
    <div class="d-flex justify-content-md-center mt-3 mb-3">
        <div>
            <button class="btn btn-info">
                <a class="badge badge-warning" href="user/create">Добавить сотрудника </a>
            </button>
        </div>
    </div>
    <div class="list_user">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Фамилия</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <?php foreach ($users as $user): ?>
            <tbody>
            <tr>
                <th scope="row"><?=$user['id']?></th>
                <td><?=$user['name']?></td>
                <td><?=$user['surname']?></td>
                <td>
                    <button type="button" class="btn btn-info"><a class="badge text-dark" href="user/show/<?=$user['id']?>">Смотреть</a></button>
                    <button type="button" class="btn btn-warning"><a class="badge text-dark" href="user/edit/<?=$user['id']?>">Изменить</a></button>
                    <button type="button" class="btn btn-danger"><a class="badge text-dark" href="user/destroy/<?=$user['id']?>">Удалить</a></button>
                </td>
            </tr>
            </tbody>
            <?php endforeach; ?>
        </table>

        <div class="clearfix">
            <?=$pagination;?>
        </div>
    </div>
</div>