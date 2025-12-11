<?php

namespace App\Models;

use App\Models\CRUD;

class Image extends CRUD
{
    protected $table = 'stampee.image';
    protected $primaryKey = 'id';
    protected $fillable = ['url', 'stamp_id'];
}
