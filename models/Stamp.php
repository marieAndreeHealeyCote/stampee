<?php

namespace App\Models;

use App\Models\CRUD;

class Stamp extends CRUD
{
    protected $table = 'stampee.stamp';
    protected $primaryKey = 'stamp_id';
    protected $fillable = ['name', 'year', 'is_certified', 'country_country_id', 'color_color_id', 'user_user_id', 'condition_condition_id'];
}
