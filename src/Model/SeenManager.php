<?php

namespace App\Model;

class SeenManager extends AbstractManager
{
    public const TABLE = 'seen';

    public function selectDistinctAll(string $orderBy = '', string $direction = 'ASC'): array
    {
        $query = 'SELECT DISTINCT s.id, s.is_completed FROM ' . static::TABLE
        . ' AS s JOIN ' . SerieManager::TABLE . ' AS s ON s.seen_id=s.id ';
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll();
    }
}