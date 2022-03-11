<?php

namespace App\Classes;

class Builder
{
    public $bindings = [
        'select' => [],
        'from' => [],
        'join' => [],
        'where' => [],
    ];
    public $from;

    public $columns;

    public $joins;

    public $wheres = [];

    /**
     * @var Connection
     */
    public $connection;

    public $operators = [
        '=',
        '<',
        '>',
        '<=',
        '>=',
        '<>',
        '!=',
        '<=>',
        '&',
        '|',
    ];
    protected $model;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param Model $model
     * @return $this
     */
    public function setModel(Model $model)
    {
        $this->model = $model;

        $this->from($model->getTable());
        return $this;
    }

    public function from($table, $as = null)
    {
        $this->from = $as ? "{$table} as {$as}" : $table;

        return $this;
    }

    public function where($column, $operator = null, $value = null)
    {
        $this->wheres = [
            'column' => $column,
            'operator' => $operator,
            'value' => $value,
        ];

        return $this;
    }

    public function insert(array $values)
    {
        if (empty($values)) {
            return true;
        }

        if (!is_array(reset($values))) {
            $values = [$values];
        } else {
            foreach ($values as $key => $value) {
                ksort($value);

                $values[$key] = $value;
            }
        }
        return $this->connection->insert($this->connection->compileInsert($this, $values), $values[0]);
    }

    public function delete($id = null)
    {
        if (!is_null($id)) {
            $this->where($this->from.'.id', '=', $id);
        }

        return $this->connection->delete($this->connection->compileDelete($this), $this->bindings);
    }

    public function selectAll($columns = ['*'])
    {
        $this->columns = [];
        $this->bindings['select'] = [];

        $columns = is_array($columns) ? $columns : func_get_args();

        foreach ($columns as $as => $column) {
            $this->columns[] = $column;
        }

        return $this->connection->select($this->connection->compileSelect($this, $columns));
    }

    public function selectUserAndGroups($columns = ['*'])
    {
        $this->columns = [];
        $this->bindings['select'] = [];

        $columns = is_array($columns) ? $columns : func_get_args();

        foreach ($columns as $as => $column) {
            $this->columns[] = $column;
        }

        return $this->connection->select($this->connection->compileSelectUsersAndGroups($this, $columns));
    }
}