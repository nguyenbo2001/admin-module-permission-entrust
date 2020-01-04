<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'description',
        'salary',
        'added_by',
        'updated_by',
    ];
}
