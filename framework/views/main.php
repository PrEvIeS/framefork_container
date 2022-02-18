<?php
/**
 * @var $arResult
 */
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>Список пользователей</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <label for="exampleInputEmail1" class="form-label">Добавление пользователя</label>
                <div class="form-control">
                    <form id="addUser">
                        <div class="mb-6">
                            <label for="exampleInputEmail1" class="form-label">Фамилия</label>
                            <input type="text" class="form-control" name="last_name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Имя</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Отчество</label>
                            <input type="text" class="form-control" name="second_name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Дата рождения</label>
                            <input type="date" class="form-control" name="date_of_birth">
                        </div>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Имя</th>
                <th scope="col">Отчество</th>
                <th scope="col">Дата рождения</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($arResult['USERS'] as $user): ?>
                <tr>
                    <td><?= $user['ID'] ?></td>
                    <td><?= $user['LAST_NAME'] ?></td>
                    <td><?= $user['NAME'] ?></td>
                    <td><?= $user['SECOND_NAME'] ?></td>
                    <td><?= $user['DATE_OF_BIRTH'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>