<?php

namespace App\Models;

use App\Models\CRUD;

class Bid extends CRUD
{
    protected $table = 'stampee.bid';
    protected $primaryKey = 'id';
    protected $fillable = ['bid', 'date', 'user_id', 'auction_id'];
}
