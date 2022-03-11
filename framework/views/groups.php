<?php
/**
 * @var $arResult
 */
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>Список групп</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <label for="exampleInputEmail1" class="form-label">Добавление группы</label>
                <div class="form-control">
                    <form id="add" action="/groups/add">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Название</label>
                            <input type="text" class="form-control" name="name">
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
                <th scope="col">Название</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($arResult['GROUPS'] as $group): ?>
                <tr>
                    <td><?= $group['id'] ?></td>
                    <td><?= $group['name'] ?></td>
                    <td>
                        <a id="deleteUser" href="/groups/delete/<?= $group['id'] ?>">
                            <span data-feather="x-circle"></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>