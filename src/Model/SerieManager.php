<?php

namespace App\Model;

class SerieManager extends AbstractManager
{
    public const TABLE = 'serie';

    /**
     * Insert new item in database
     */
    public function insert(array $serie): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE .
        " (`category`, `title`, `synopsis`, `image`) 
        VALUES (:category, :title, :synopsis, :image)");
        $statement->bindValue('category', $serie['category'], \PDO::PARAM_INT);
        $statement->bindValue('title', $serie['title'], \PDO::PARAM_STR);
        $statement->bindValue('synopsis', $serie['synopsis'], \PDO::PARAM_STR);
        $statement->bindValue('image', $serie['image'], \PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    /**
     * Update item in database
     */
    public function update(array $serie): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `title` = :title WHERE id=:id");
        $statement->bindValue('id', $serie['id'], \PDO::PARAM_INT);
        $statement->bindValue('title', $serie['title'], \PDO::PARAM_STR);

        return $statement->execute();
    }
}
