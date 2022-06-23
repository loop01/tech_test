<?php

namespace App\DatabaseJson\Models;

use DatabaseJson\Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'email',
    ];
}
