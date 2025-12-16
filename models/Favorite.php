<?php

namespace App\Models;

use App\Models\CRUD;

class Favorite extends CRUD
{
    protected $table = 'stampee.favorite';
    protected $primaryKey = 'id';
    protected $fillable = ['auction_id', 'user_id'];
}
