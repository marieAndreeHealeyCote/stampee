<?php

namespace App\Models;

use App\Models\CRUD;

class Auction extends CRUD
{
    protected $table = 'stampee.auction';
    protected $primaryKey = 'id';
    protected $fillable = ['date_start', 'date_end', 'floor_price', 'lord_favorites', 'stamp_id'];
}
