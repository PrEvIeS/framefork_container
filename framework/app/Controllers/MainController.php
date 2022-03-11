<?php

namespace App\Controllers;

use App\Classes\Controller;
use App\Classes\DateTime;
use App\Models\UsersModel;

class MainController extends Controller
{
    protected $layout = 'main';

    public function userList()
    {
        $this->title = 'Главная';
        $users = new UsersModel();
        $testUser['USERS'] = $users->getUsersAndGroups();

        return $this->render('main', $testUser);
    }

    public function dateGym()
    {
        $this->title = 'Главная';
        $users = new UsersModel();
        $testUser['USERS'] = $users->getUsersAndGroups();

        return $this->render('dategym', $testUser);
    }

    public function date($type)
    {
        $result = [];

        switch ($type['type']){
            case 'start':
                $result['value'] = DateTime::getStartOfDay($_POST['date']);
                break;
            case 'end':
                $result['value'] = DateTime::getEndOfDay($_POST['date']);
                break;
            case 'week':
                $result['value'] = DateTime::dateAfterWeek($_POST['date']);
                break;
            case 'month':
                $result['value'] = DateTime::dateAfterMonth($_POST['date']);
                break;
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
        die();
    }
}