<?php

namespace App\Models;

use App\Models\CRUD;

class Color extends CRUD
{
    protected $table = 'color';
    protected $primaryKey = 'color_id';
    protected $fillable = ['name'];
}
