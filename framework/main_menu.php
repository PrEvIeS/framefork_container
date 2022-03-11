<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?= $_SERVER['REQUEST_URI'] == '/' ? 'active' : ''?>" aria-current="page" href="/">
                    <span data-feather="home"></span>
                    Главная
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $_SERVER['REQUEST_URI'] == '/persons' ? 'active' : ''?>" href="/persons">
                    <span data-feather="tool"></span>
                    Редактирование пользователей
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $_SERVER['REQUEST_URI'] == '/teams' ? 'active' : ''?>" href="/teams">
                    <span data-feather="users"></span>
                    Редактирование групп
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $_SERVER['REQUEST_URI'] == '/dategym' ? 'active' : ''?>" href="/dategym">
                    <span data-feather="calendar"></span>
                    Date Gym
                </a>
            </li>
        </ul>
    </div>
</nav>
