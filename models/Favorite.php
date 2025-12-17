<?php

namespace App\Models;

use App\Models\CRUD;

class Favorite extends CRUD
{
    protected $table = 'stampee.favorite';
    protected $primaryKey = 'id';
    protected $fillable = ['auction_id', 'user_id'];

    public function exists(int $userId, int $auctionId): bool
    {
        $sql = "SELECT id FROM stampee.favorite WHERE user_id = :user AND auction_id = :auction LIMIT 1";
        $stmt = $this->query($sql);
        $stmt->execute([
            'user' => $userId,
            'auction' => $auctionId
        ]);

        return (bool) $stmt->fetch();
    }

    public function deleteWhere(array $conditions)
    {
        $where = [];
        $params = [];

        foreach ($conditions as $column => $value) {
            $where[] = "{$column} = :{$column}";
            $params[$column] = $value;
        }

        $whereClause = implode(' AND ', $where);
        $sql = "DELETE FROM {$this->table} WHERE {$whereClause}";
        $stmt = $this->query($sql);
        return $stmt->execute($params);
    }
}
