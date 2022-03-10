<?php

namespace App\Classes;

class Model
{
    private bool $exists;

    protected $table;
    private $connection;
    private $attributes;

    public function __construct(array $attributes = [])
    {
        $this->fill($attributes);
    }

    public function fill(array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $this->attributes[$key] = $value;
        }
    }

    public function save()
    {
        $query = $this->newBuilder($this->getConnection())->setModel($this);
        $saved = $this->performInsert($query);
        return $saved;
    }

    public function getAll()
    {
        $query = $this->newBuilder($this->getConnection())->setModel($this);
        $items = $this->performSelectAll($query);
        return $items;
    }

    public function deleteRawById($id)
    {
        $query = $this->newBuilder($this->getConnection())->setModel($this);
        $items = $query->where('id', '=' , $id)->delete();
        return $items;
    }

    public function getConnection()
    {
        return new Connection(['HOST' => DB_HOST, 'DB' => DB_NAME, 'USER' => DB_USER, 'PASSWORD' => DB_PASS]);
    }

    public function newBuilder($query)
    {
        return new Builder($query);
    }

    protected function performInsert(Builder $query)
    {
        $attributes = $this->attributes;

        if (empty($attributes)) {
            return true;
        }

        $query->insert($attributes);


        $this->exists = true;

        return true;
    }

    protected function performSelectAll(Builder $query)
    {
        return $query->selectAll();
    }

    public function getTable()
    {
        return $this->table;
    }
}