<?php

namespace App\Models;

use App\Models\CRUD;

class Country extends CRUD
{
    protected $table = 'stampee.country';
    protected $primaryKey = 'country_id';
    protected $fillable = ['name'];
}
