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
            <button class="btn btn-warning mr-3 mt-3"><a class="badge text-dark" href="user/edit/<?=$data['id']?>">Изменить</a></button>
            <button class="btn btn-danger ml-3 mt-3"><a class="badge text-dark" href="user/delete/<?=$data['id']?>">Удалить</a></button>
        </div>
    </row>
</div>