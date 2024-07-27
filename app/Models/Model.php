<?php

namespace App\Models;

use MVC\DB\Database;
use PDO;

class Model extends Database
{
    protected $table;

    public static function all()
    {
        $selfClass = new static();

        $sql = "SELECT * FROM {$selfClass->table}";

        $query = $selfClass->conn->query($sql);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public static function where($column = null, $operator = '=', $value = null)
    {
        $selfClass = new static();
        $sql = "SELECT * FROM {$selfClass->table} WHERE {$column} {$operator} :value";
        $query = $selfClass->conn->prepare($sql);
        $query->bindParam(':value', $value, PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public static function find(int $id)
    {
        $selfClass = new static();

        $sql = "SELECT * FROM {$selfClass->table} WHERE id = :id";

        $query = $selfClass->conn->prepare($sql);

        $query->bindParam(':id', $id, PDO::PARAM_INT);

        $query->execute();

        return $query->fetch(PDO::FETCH_OBJ);
    }
    public static function create(array $data)
    {
        $selfClass = new static();
        $columns = implode(', ', array_keys($data));

        $placeholders = ':' . implode(', :', array_keys($data));
        // dd($columns, $placeholders);
        $sql = "INSERT INTO {$selfClass->table} ({$columns}) VALUES ({$placeholders})";

        $query = $selfClass->conn->prepare($sql);

        $query->execute($data);

        $lastInsertId = $selfClass->conn->lastInsertId();

        $selectSql = "SELECT * FROM {$selfClass->table} WHERE id = :id";

        $selectQuery = $selfClass->conn->prepare($selectSql);

        $selectQuery->bindParam(':id', $lastInsertId, PDO::PARAM_INT);

        $selectQuery->execute();

        return $selectQuery->fetch(PDO::FETCH_OBJ);
    }
    public static function update(array $data)
    {
        $id = $data['id'];
        unset($data['id']);

        $selfClass = new static();

        $setClause = [];
        foreach ($data as $key => $value) {
            $setClause[] = "$key = :$key";
        }
        $setClause = implode(', ', $setClause);

        $sql = "UPDATE {$selfClass->table} SET {$setClause} WHERE id = :id";

        $query = $selfClass->conn->prepare($sql);

        foreach ($data as $key => &$value) {
            $query->bindParam(":$key", $value, PDO::PARAM_STR);
        }

        $query->bindParam(':id', $id, PDO::PARAM_INT);

        $query->execute();

        $selectSql = "SELECT * FROM {$selfClass->table} WHERE id = :id";
        $selectQuery = $selfClass->conn->prepare($selectSql);
        $selectQuery->bindParam(':id', $id, PDO::PARAM_INT);
        $selectQuery->execute();

        return $selectQuery->fetch(PDO::FETCH_OBJ);
    }
    public static function delete($id)
    {
        $selfClass = new static();
        $sql = "DELETE FROM {$selfClass->table} WHERE id = :id";
        $query = $selfClass->conn->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }
}
