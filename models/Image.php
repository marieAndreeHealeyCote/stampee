<?php

namespace App\Models;

use App\Models\CRUD;

class Image extends CRUD
{
    protected $table = 'stampee.image';
    protected $primaryKey = 'image_id';
    protected $fillable = ['url'];
}
