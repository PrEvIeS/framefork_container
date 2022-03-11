<?php

namespace App\Classes;

use Closure;
use PDO;
use PDOStatement;

class Connection
{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = new PDO("mysql:host={$pdo['HOST']};dbname={$pdo['DB']}", $pdo['USER'], $pdo['PASSWORD']);
        return $this->pdo;
    }

    /**
     * Get a new query builder instance.
     *
     * @return \App\Classes\Builder
     */
    public function query()
    {
        return new Builder($this);
    }

    public function insert($query, $bindings = [])
    {
        return $this->statement($query, $bindings);
    }

    public function select($query)
    {
        return $this->getPdo()->query("$query")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($query, $bindings = [])
    {
        return $this->affectingStatement($query, $bindings);
    }

    public function affectingStatement($query, $bindings = [])
    {
        return $this->run($query, $bindings, function ($query, $bindings) {

            $statement = $this->getPdo()->prepare($query);

            $statement->execute();

            return $statement->rowCount();
        });
    }

    /**
     * @param $query
     * @param array $bindings
     * @return mixed
     */
    public function statement($query, array $bindings = [])
    {
        return $this->run($query, $bindings, function ($query, $bindings) {

            $statement = $this->getPdo()->prepare($query);

            $this->bindValues($statement, $bindings);
            $statement->execute();
            return $this->pdo->lastInsertId();
        });
    }

    /**
     * @param Builder $query
     * @param array $values
     * @return string
     */
    public function compileInsert(Builder $query, array $values): string
    {
        $table = $query->from;

        $columns = implode(',', array_keys(reset($values)));

        $keys = array_map(function ($key) {
            return ':' . $key;
        }, array_keys($values[0]));

        $parameters = '(' . implode(',', $keys) . ')';
        return "INSERT INTO $table ($columns) VALUES $parameters";
    }

    /**
     * @param Builder $query
     * @param array $values
     * @return string
     */
    public function compileSelect(Builder $query, array $values): string
    {
        $table = $query->from;
        return "SELECT * FROM $table";
    }

    /**
     * @param Builder $query
     * @return string
     */
    public function compileSelectUsersAndGroups(Builder $query): string
    {
        $table = $query->from;
        return "SELECT $table.id, users.last_name, users.name, users.second_name,user_groups.name as group_name
                FROM $table
                JOIN users ON users.id = $table.user_id
                JOIN user_groups ON user_groups.id = $table.group_id";
    }

    public function compileDelete(Builder $query)
    {
        $table = $query->from;

        $where = $this->compileWheres($query);

        return trim("DELETE FROM $table $where");
    }

    protected function run($query, $bindings, Closure $callback)
    {
        return $this->runQueryCallback($query, $bindings, $callback);
    }

    protected function runQueryCallback($query, $bindings, Closure $callback)
    {
        return $callback($query, $bindings);
    }

    /**
     * @param PDOStatement $statement
     * @param $bindings
     * @return void
     */
    private function bindValues(PDOStatement $statement, $bindings)
    {
        foreach ($bindings as $key => $value) {
            $statement->bindValue(
                is_string($key) ? $key : $key + 1,
                $value,
                is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR
            );
        }
    }

    public function getPdo()
    {
        if ($this->pdo instanceof Closure) {
            return $this->pdo = call_user_func($this->pdo);
        }

        return $this->pdo;
    }

    private function compileWheres(Builder $query)
    {
        return "where" . ' ' . implode(' ', $query->wheres);
    }
}