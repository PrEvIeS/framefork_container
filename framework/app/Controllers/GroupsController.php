<?php

namespace App\Controllers;

use App\Classes\Controller;
use App\Models\GroupsModel;
use App\Models\UsersModel;

class GroupsController extends Controller
{
    protected $layout = 'main';

    public function addGroup()
    {
        $user = new GroupsModel([
            'name' => $_POST['name'],
        ]);

        if ($user->save()) {
            http_response_code(200);
            $response = ['text' => 'Группа успешно добавлена'];
        } else {
            http_response_code(400);
            $response = ['text' => 'Не удалось добавить группу'];
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
        die();
    }

    public function getList()
    {
        $this->title = 'Группы';

        $testUser['GROUPS'] = (new GroupsModel())->getAll();
        return $this->render('groups', $testUser);
    }

    public function deleteGroup($id)
    {
        $user = new GroupsModel();
        if ($user->deleteRawById($id['id'])) {
            http_response_code(200);
            $response = ['text' => 'Группа успешно удалена'];
        } else {
            http_response_code(400);
            $response = ['text' => 'Не удалось удалить группу'];
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
        die();
    }
}