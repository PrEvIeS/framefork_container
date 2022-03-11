<?php
/**
 * @var $arResult
 */
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>Список пользователей</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">ФИО пользователя</th>
                <th scope="col">Группа</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($arResult['USERS'] as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= "{$user['last_name']} {$user['name']} {$user['second_name']}" ?></td>
                    <td><?= $user['group_name'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>