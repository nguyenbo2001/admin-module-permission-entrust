<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'preferred_salary',
        'added_by',
        'updated_by',
    ];
}
