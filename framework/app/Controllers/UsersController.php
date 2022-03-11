<?php

namespace App\Controllers;

use App\Classes\Controller;
use App\Models\GroupsModel;
use App\Models\UsersModel;

class UsersController extends Controller
{
    protected $layout = 'main';

    public function addUser()
    {
        $user = new UsersModel([
            'last_name' => $_POST['last_name'],
            'name' => $_POST['name'],
            'second_name' => $_POST['second_name'],
            'date_of_birth' => $_POST['date_of_birth'],
        ]);

        if ($id = $user->save()) {
            if (!empty($_POST['group'])){
                $user->addGroup($id,$_POST['group']);
            }
            http_response_code(200);
            $response = ['text' => 'Пользователь успешно добавлен'];
        } else {
            http_response_code(400);
            $response = ['text' => 'Не удалось добавить пользователя'];
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
        die();
    }

    public function getList()
    {
        $this->title = 'Пользователи';

        $testUser['USERS'] = (new UsersModel())->getAll();
        $testUser['GROUPS'] = (new GroupsModel())->getAll();
        return $this->render('users', $testUser);
    }

    public function deleteUser($id)
    {
        $user = new UsersModel();
        if ($user->deleteRawById($id['id'])) {
            http_response_code(200);
            $response = ['text' => 'Пользователь успешно удален'];
        } else {
            http_response_code(400);
            $response = ['text' => 'Не удалось удалить пользователя'];
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
        die();
    }
}