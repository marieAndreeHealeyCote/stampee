<?php

namespace App\Models;

use App\Models\CRUD;

class Condition extends CRUD
{
    protected $table = 'stampee.condition';
    protected $primaryKey = 'condition_id';
    protected $fillable = ['name'];
}
