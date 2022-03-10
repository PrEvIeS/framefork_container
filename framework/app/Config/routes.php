<?php

use App\Classes\Route;

return [
    new Route('/', 'main', 'userList'),
    new Route('/users/add', 'users', 'addUser'),
    new Route('/users/addGroup', 'users', 'addGroup'),
    new Route('/users/delete/:id', 'users', 'deleteUser'),
    new Route('/users/update/:id', 'users', 'updateUser'),
    new Route('/persons', 'users', 'getList'),
    new Route('/groups/add', 'groups', 'addGroup'),
    new Route('/groups/delete/:id', 'groups', 'deleteGroup'),
    new Route('/groups/update/:id', 'groups', 'updateGroup'),
    new Route('/groups/', 'groups', 'groupList'),
];