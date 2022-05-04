<?php

namespace App\Model;

class SerieManager extends AbstractManager
{
    public const TABLE = 'serie';

    public function selectAll(string $orderBy = '', string $direction = 'ASC'): array
    {
        $query = 'SELECT *, s.id, s.title AS serieTitle FROM ' . static::TABLE
        . ' AS s JOIN ' . CategoryManager::TABLE . ' AS c ON s.category_id=c.id ';
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll();
    }

    /**
     * Insert new item in database
     */
    public function insert(array $serie): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE .
        " (`title`, `description`, `image`, `category_id`) 
        VALUES (:title, :description, :image, :category_id)");
        //$statement->bindValue('category', $serie['category'], \PDO::PARAM_INT);
        $statement->bindValue('title', $serie['title'], \PDO::PARAM_STR);
        $statement->bindValue('description', $serie['description'], \PDO::PARAM_STR);
        $statement->bindValue('image', $serie['image'], \PDO::PARAM_STR);
        $statement->bindValue('category_id', $serie['category'], \PDO::PARAM_INT);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    /**
     * Update item in database
     */
    // public function update(array $serie): bool
    // {
    //     $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `title` = :title WHERE id=:id");
    //     $statement->bindValue('id', $serie['id'], \PDO::PARAM_INT);
    //     $statement->bindValue('title', $serie['title'], \PDO::PARAM_STR);

    //     return $statement->execute();
    // }
}
