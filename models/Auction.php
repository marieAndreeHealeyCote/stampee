<?php

namespace App\Models;

use App\Models\CRUD;

class Auction extends CRUD
{
    protected $table = 'stampee.auction';
    protected $primaryKey = 'id';
    protected $fillable = ['date_start', 'date_end', 'floor_price', 'lord_favorites', 'stamp_id'];

    public function selectMostPopular($limit = 4)
    {
        $sql  = "SELECT COUNT(b.auction_id) as total, ";
        $sql .= "b.auction_id AS id, a.date_end, a.date_start, a.floor_price, a.lord_favorite, a.stamp_id ";
        $sql .= "FROM stampee.bid AS b JOIN stampee.auction AS a ON a.id = b.auction_id ";
        $sql .= "GROUP BY b.auction_id ORDER BY total DESC LIMIT $limit ";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    public function getHighestBid($value)
    {
        $sql  = "SELECT * FROM stampee.bid WHERE auction_id = $value ORDER BY bid DESC";
        $stmt = $this->query($sql);
        return $stmt->fetch();
    }
}
