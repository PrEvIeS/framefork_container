<?php

namespace App\Models;

use App\Classes\Model;

class UsersModel extends Model
{
    protected $table = 'users';

    public function addGroup($userId, $groupId)
    {
        $this->table = 'group_of_users';
        $this->attributes = [];
        $this->fill(['user_id' => $userId, 'group_id' => $groupId]);
        $query = $this->newBuilder($this->getConnection())->setModel($this);
        $saved = $this->performInsert($query);
        return $saved;
    }
    public function getUsersAndGroups()
    {
        $this->table = 'group_of_users';
        $query = $this->newBuilder($this->getConnection())->setModel($this);
        $items = $this->performSelectUserAndGroups($query);
        return $items;
    }
}