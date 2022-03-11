<?php
/**
 * @var $arResult
 */
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>Демонстрация возможностей класса дат</h2>
    <form id="date" action="/date/start" date="start" method="post">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Начало дня</label>
            <input type="date" class="form-control" name="date">
            <input type="text" class="form-control" name="start">
        </div>
        <button type="submit" class="btn btn-primary">Вычислить</button>
    </form>
    <form id="date" action="/date/end" date="end" method="post">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Конец дня</label>
            <input type="date" class="form-control" name="date">
            <input type="text" class="form-control" name="end">
        </div>
        <button type="submit" class="btn btn-primary">Вычислить</button>
    </form>
    <form id="date" action="/date/week" date="week" method="post">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Через неделю</label>
            <input type="date" class="form-control" name="date">
            <input type="text" class="form-control" name="week">
        </div>
        <button type="submit" class="btn btn-primary">Вычислить</button>
    </form>
    <form id="date" action="/date/month" date="month" method="post">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Через месяц</label>
            <input type="date" class="form-control" name="date">
            <input type="text" class="form-control" name="month">
        </div>
        <button type="submit" class="btn btn-primary">Вычислить</button>
    </form>
</main>