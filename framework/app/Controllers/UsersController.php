<?php

namespace App\Controllers;

use App\Classes\Controller;
use App\Models\UsersModel;

class UsersController extends Controller
{
    public function addUser()
    {
        $user = new UsersModel([
            'last_name' => $_POST['last_name'],
            'name' => $_POST['name'],
            'second_name' => $_POST['second_name'],
            'date_of_birth' => $_POST['date_of_birth'],
        ]);

        if ($user->save()) {
            echo json_encode(['success' => 'Пользователь успешно добавлен']);
        } else {
            echo json_encode(['error' => 'Не удалось добавить пользователя']);
        }
        die();
    }
}