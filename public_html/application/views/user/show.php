<div class="container d-flex justify-content-center mt-5">
    <row>
        <div>
            <h2>Данные о сотрудники под id: <?=$data['id']?></h2>
            <p>Имя: <?=$data['name']?></p>
            <p>Фамилия: <?=$data['surname']?></p>
            <p>login: <?=$data['login']?></p>
            <p>Password: <?=$data['password']?></p>
            <p>Пол: <?=$data['gender']?></p>
            <p>Дата рождения: <?=$data['date']?></p>
        </div>
        <div class="mt-5">
            <button type="submit" class="btn btn-warning"><a class="badge text-dark" href="/user/edit/<?=$data['id']?>">Изменить</a></button>
            <button type="submit" class="btn btn-danger"><a class="badge text-dark" href="/user/destroy/<?=$data['id']?>">Удалить</a></button>
        </div>
    </row>
</div>