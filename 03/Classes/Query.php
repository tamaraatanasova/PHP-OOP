<?php

namespace Template\Calsses;

use PDO;

class Query
{
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAll(string $table)
    {
        $statement = $this->db->prepare("SELECT * FROM {$table}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function find(string $table, $value, string $column = 'id', $single = false)
    {
        $value = (int)$value;

        if ($single) {
            $statement = $this->db->prepare("SELECT * FROM {$table} WHERE {$column} = :value LIMIT 1");
            $statement->bindValue(':value', $value, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_OBJ); // Return a single object
        } else {
            $statement = $this->db->prepare("SELECT * FROM {$table} WHERE {$column} = :value");
            $statement->bindValue(':value', $value, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_OBJ); // Return all matching rows as objects
        }
    }

    public function insert(string $table, array $parameters)
    {
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        $this->executePreparedSql($sql, $parameters);
    }

    public function update(string $table, int $id, array $parameters)
    {
        $columns = [];
        foreach (array_keys($parameters) as $column) {
            $columns[] = "$column = :$column";
        }

        $sql = sprintf(
            'UPDATE %s SET %s WHERE id = :id',
            $table,
            implode(', ', $columns)
        );

        $parameters['id'] = $id;
        $this->executePreparedSql($sql, $parameters);
    }

    public function delete(string $table, int $id)
    {
        $sql = sprintf(
            'DELETE FROM %s WHERE id = :id',
            $table
        );

        $this->executePreparedSql($sql, ['id' => $id]);
    }

    protected function executePreparedSql(string $sql, array $parameters)
    {
        try {
            $statement = $this->db->prepare($sql);
            $statement->execute($parameters);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}

