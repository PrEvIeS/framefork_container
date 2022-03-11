<?php

use App\Classes\Route;

return [
    new Route('/', 'main', 'userList'),
    new Route('/users/add', 'users', 'addUser'),
    new Route('/users/addGroup/:id', 'users', 'addGroup'),
    new Route('/users/delete/:id', 'users', 'deleteUser'),
    new Route('/persons', 'users', 'getList'),
    new Route('/groups/add', 'groups', 'addGroup'),
    new Route('/groups/delete/:id', 'groups', 'deleteGroup'),
    new Route('/teams', 'groups', 'getList'),
    new Route('/dategym', 'main', 'dateGym'),
    new Route('/date/:type', 'main', 'date'),
];