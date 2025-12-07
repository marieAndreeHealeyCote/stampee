<?php

namespace App\Models;

use App\Models\CRUD;

class Stamp extends CRUD
{
    protected $table = 'stamp';
    protected $primaryKey = 'stamp_id';
    protected $fillable = ['name', 'is_certified', 'country_country_id', 'color_color_id', 'color_color_id', 'user_user_id', 'condition_condition_id'];
}
