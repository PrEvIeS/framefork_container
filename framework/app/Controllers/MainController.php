<?php

namespace App\Controllers;

use App\Classes\Controller;

class MainController extends Controller
{
    protected $layout = 'main';

    public function userList()
    {
        $this->title = 'Главная';

        $testUser['USERS'][] = [
            'ID' => '1',
            'LAST_NAME' => 'test',
            'NAME' => 'test',
            'SECOND_NAME' => 'test',
            'DATE_OF_BIRTH' => 'test',
        ];

        return $this->render('main', $testUser);
    }
}