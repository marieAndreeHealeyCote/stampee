<?php

namespace App\Models;

use App\Models\CRUD;

class Stamp extends CRUD
{
    protected $table = 'stampee.stamp';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'year', 'is_certified', 'country_id', 'color_id', 'user_id', 'condition_id'];
}
