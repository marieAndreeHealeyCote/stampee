<?php

namespace App\Models;

use App\Models\CRUD;

class Condition extends CRUD
{
    protected $table = 'conditon';
    protected $primaryKey = 'condition_id';
    protected $fillable = ['name'];
}
